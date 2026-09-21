<?php

/**
 * Simple SMTP mailer for Blooms Open Hand AFH.
 *
 * Uses implicit TLS (SSL) on SMTP port 465 by default.
 * Falls back to STARTTLS on port 587 if 465 fails.
 * No Composer dependency required.
 */

define('BLOOMS_SMTP_HOST', 'mail.bloomsopenhandafh.com');
define('BLOOMS_SMTP_PORT', 465);

define('BLOOMS_SMTP_USERNAME', 'noreply@bloomsopenhandafh.com');

/*
 * IMPORTANT:
 * Put the REAL password for noreply@bloomsopenhandafh.com here.
 * This is the cPanel / email account password, NOT the placeholder.
 */
define('BLOOMS_SMTP_PASSWORD', '@op10928725');

define(
    'BLOOMS_SMTP_FROM_NAME',
    'Blooms Open Hand Adult Family Home'
);

define('BLOOMS_SMTP_TIMEOUT', 20);

/*
 * Set to true only while debugging. Set back to false in production.
 * When true, detailed SMTP errors are written to the PHP error log.
 */
define('BLOOMS_SMTP_DEBUG', true);


/**
 * Read an SMTP server response.
 */
function blooms_smtp_read($socket): string
{
    $response = '';

    while (($line = fgets($socket, 515)) !== false) {

        $response .= $line;

        /*
         * SMTP multiline response:
         *
         * 250-example.com
         * 250-AUTH LOGIN
         * 250 OK
         *
         * The final line has a space after the status code.
         */
        if (strlen($line) >= 4 && $line[3] === ' ') {
            break;
        }
    }

    return $response;
}


/**
 * Check whether SMTP response contains an expected code.
 */
function blooms_smtp_expect($socket, array $codes): void
{
    $response = blooms_smtp_read($socket);

    if ($response === '') {
        throw new RuntimeException(
            'SMTP server returned an empty response.'
        );
    }

    $code = (int) substr(trim($response), 0, 3);

    if (!in_array($code, $codes, true)) {

        throw new RuntimeException(
            'SMTP server error [' .
            $code .
            ']: ' .
            trim($response)
        );
    }
}


/**
 * Send an SMTP command and verify the response.
 */
function blooms_smtp_command(
    $socket,
    string $command,
    array $codes
): void {

    $written = fwrite(
        $socket,
        $command . "\r\n"
    );

    if ($written === false) {

        throw new RuntimeException(
            'Failed to write SMTP command.'
        );
    }

    blooms_smtp_expect(
        $socket,
        $codes
    );
}


/**
 * Open a socket to the SMTP server.
 *
 * @param string $scheme  'ssl' or 'tls'
 * @param int    $port
 * @return resource
 */
function blooms_smtp_open_socket(string $scheme, int $port)
{
    $host = BLOOMS_SMTP_HOST;

    $errno = 0;
    $errstr = '';

    /*
     * Build SSL context.
     *
     * We keep certificate verification ON in production.
     * If your host has a broken CA bundle, temporarily set
     * verify_peer / verify_peer_name to false to confirm.
     */
    $context = stream_context_create([
        'ssl' => [

            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => false,

            'peer_name' => $host,

            'SNI_enabled' => true,

            /*
             * Allow TLS 1.2 and above.
             */
            'crypto_method' =>
                STREAM_CRYPTO_METHOD_TLS_CLIENT
                | STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT
                | STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT,
        ]
    ]);

    /*
     * Port 465 uses implicit SSL.
     * Port 587 uses STARTTLS (plain connect, then crypto).
     */
    $remote = ($scheme === 'ssl')
        ? 'ssl://' . $host . ':' . $port
        : 'tcp://'  . $host . ':' . $port;

    /*
     * NOTE: we do NOT use @ here, so real errors surface.
     * We still capture $errstr / $errno for our own reporting.
     */
    $socket = stream_socket_client(
        $remote,
        $errno,
        $errstr,
        BLOOMS_SMTP_TIMEOUT,
        STREAM_CLIENT_CONNECT,
        $context
    );

    if (!$socket) {

        throw new RuntimeException(
            'Could not connect to SMTP server ' .
            $host . ':' . $port .
            ' — ' .
            ($errstr ?: 'connection failed') .
            ' (' . $errno . ')'
        );
    }

    stream_set_timeout(
        $socket,
        BLOOMS_SMTP_TIMEOUT
    );

    return $socket;
}


/**
 * Send an HTML email using Blooms Open Hand SMTP.
 *
 * Tries port 465 (implicit SSL) first. If that fails,
 * tries port 587 with STARTTLS.
 *
 * @param string      $to       Recipient email
 * @param string      $subject  Email subject
 * @param string      $htmlBody HTML email body
 * @param string|null $replyTo  Reply-To email address
 *
 * @return bool
 */
function blooms_smtp_mail(
    string $to,
    string $subject,
    string $htmlBody,
    ?string $replyTo = null
): bool {

    /*
     * Validate recipient.
     */
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {

        throw new InvalidArgumentException(
            'Invalid recipient email address.'
        );
    }


    /*
     * Validate Reply-To if provided.
     */
    if (
        $replyTo !== null &&
        !filter_var($replyTo, FILTER_VALIDATE_EMAIL)
    ) {
        $replyTo = null;
    }


    /*
     * Make sure password has actually been set.
     */
    if (
        BLOOMS_SMTP_PASSWORD === '' ||
        BLOOMS_SMTP_PASSWORD === 'PUT_THE_REAL_PASSWORD_HERE' ||
        BLOOMS_SMTP_PASSWORD === 'YOUR_NEW_SMTP_PASSWORD'
    ) {

        throw new RuntimeException(
            'SMTP password has not been set in smtp_mail.php.'
        );
    }


    /*
     * Make sure OpenSSL is available.
     */
    if (
        !extension_loaded('openssl') ||
        !in_array('ssl', stream_get_wrappers(), true)
    ) {

        throw new RuntimeException(
            'PHP OpenSSL extension / ssl:// wrapper is not available on this server.'
        );
    }


    /*
     * ------------------------------------------------------------
     * Try implicit SSL on 465 first, then STARTTLS on 587.
     * ------------------------------------------------------------
     */

    $attempts = [
        ['scheme' => 'ssl',  'port' => 465, 'starttls' => false],
        ['scheme' => 'tls',  'port' => 587, 'starttls' => true],
    ];

    $lastException = null;

    foreach ($attempts as $attempt) {

        try {

            return blooms_smtp_send_via(
                $to,
                $subject,
                $htmlBody,
                $replyTo,
                $attempt['scheme'],
                $attempt['port'],
                $attempt['starttls']
            );

        } catch (Throwable $e) {

            $lastException = $e;

            if (BLOOMS_SMTP_DEBUG) {
                error_log(
                    'Blooms SMTP attempt failed on ' .
                    $attempt['scheme'] . ':' . $attempt['port'] .
                    ' — ' . $e->getMessage()
                );
            }

            /* Try next attempt. */
        }
    }

    /*
     * All attempts failed.
     */
    if ($lastException) {
        throw $lastException;
    }

    throw new RuntimeException(
        'SMTP send failed for an unknown reason.'
    );
}


/**
 * Actually send the email over an open SMTP connection.
 */
function blooms_smtp_send_via(
    string $to,
    string $subject,
    string $htmlBody,
    ?string $replyTo,
    string $scheme,
    int $port,
    bool $useStartTls
): bool {

    $socket = blooms_smtp_open_socket($scheme, $port);

    try {

        /* ----------------------------------------------------
         * 1. GREETING
         * ---------------------------------------------------- */
        blooms_smtp_expect($socket, [220]);


        /* ----------------------------------------------------
         * 2. EHLO
         * ---------------------------------------------------- */
        $hostname =
            $_SERVER['SERVER_NAME']
            ?? 'bloomsopenhandafh.com';

        $hostname = preg_replace(
            '/[^A-Za-z0-9.\-]/',
            '',
            $hostname
        );

        if (!$hostname) {
            $hostname = 'bloomsopenhandafh.com';
        }

        blooms_smtp_command(
            $socket,
            'EHLO ' . $hostname,
            [250]
        );


        /* ----------------------------------------------------
         * 3. STARTTLS (only on port 587)
         * ---------------------------------------------------- */
        if ($useStartTls) {

            blooms_smtp_command(
                $socket,
                'STARTTLS',
                [220]
            );

            $crypto = STREAM_CRYPTO_METHOD_TLS_CLIENT
                | STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT
                | STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT;

            $ok = stream_socket_enable_crypto(
                $socket,
                true,
                $crypto
            );

            if ($ok !== true) {

                throw new RuntimeException(
                    'Failed to enable TLS via STARTTLS.'
                );
            }

            /*
             * After STARTTLS we must EHLO again.
             */
            blooms_smtp_command(
                $socket,
                'EHLO ' . $hostname,
                [250]
            );
        }


        /* ----------------------------------------------------
         * 4. AUTH LOGIN
         * ---------------------------------------------------- */
        blooms_smtp_command(
            $socket,
            'AUTH LOGIN',
            [334]
        );

        blooms_smtp_command(
            $socket,
            base64_encode(BLOOMS_SMTP_USERNAME),
            [334]
        );

        blooms_smtp_command(
            $socket,
            base64_encode(BLOOMS_SMTP_PASSWORD),
            [235]
        );


        /* ----------------------------------------------------
         * 5. CLEAN SUBJECT / FROM NAME
         * ---------------------------------------------------- */
        $subject = str_replace(
            ["\r", "\n"],
            '',
            $subject
        );

        $fromName = str_replace(
            ["\r", "\n"],
            '',
            BLOOMS_SMTP_FROM_NAME
        );


        /* ----------------------------------------------------
         * 6. HEADERS
         * ---------------------------------------------------- */
        $headers = [

            'Date: ' . date('r'),

            'From: ' .
                $fromName .
                ' <' .
                BLOOMS_SMTP_USERNAME .
                '>',

            'To: ' . $to,

            'Subject: ' . $subject,

            'MIME-Version: 1.0',

            'Content-Type: text/html; charset=UTF-8',

            'Content-Transfer-Encoding: 8bit',
        ];

        if ($replyTo) {

            $headers[] =
                'Reply-To: ' . $replyTo;
        }


        /* ----------------------------------------------------
         * 7. MAIL FROM
         * ---------------------------------------------------- */
        blooms_smtp_command(
            $socket,
            'MAIL FROM:<' . BLOOMS_SMTP_USERNAME . '>',
            [250]
        );


        /* ----------------------------------------------------
         * 8. RCPT TO
         * ---------------------------------------------------- */
        blooms_smtp_command(
            $socket,
            'RCPT TO:<' . $to . '>',
            [250, 251]
        );


        /* ----------------------------------------------------
         * 9. DATA
         * ---------------------------------------------------- */
        blooms_smtp_command(
            $socket,
            'DATA',
            [354]
        );


        /* ----------------------------------------------------
         * 10. NORMALIZE BODY LINE ENDINGS
         * ---------------------------------------------------- */
        $body = str_replace(
            ["\r\n", "\r"],
            "\n",
            $htmlBody
        );

        $body = str_replace(
            "\n",
            "\r\n",
            $body
        );


        /* ----------------------------------------------------
         * 11. SMTP DOT-STUFFING
         * ---------------------------------------------------- */
        $body = preg_replace(
            '/^\./m',
            '..',
            $body
        );

        if ($body === null) {

            throw new RuntimeException(
                'Failed to prepare email body.'
            );
        }


        /* ----------------------------------------------------
         * 12. BUILD MESSAGE
         * ---------------------------------------------------- */
        $message =
            implode("\r\n", $headers) .
            "\r\n\r\n" .
            $body .
            "\r\n.\r\n";


        /* ----------------------------------------------------
         * 13. SEND
         * ---------------------------------------------------- */
        $written = fwrite($socket, $message);

        if ($written === false) {

            throw new RuntimeException(
                'Failed to send email data to SMTP server.'
            );
        }


        /* ----------------------------------------------------
         * 14. CONFIRM ACCEPTED
         * ---------------------------------------------------- */
        blooms_smtp_expect($socket, [250]);


        /* ----------------------------------------------------
         * 15. QUIT
         * ---------------------------------------------------- */
        blooms_smtp_command(
            $socket,
            'QUIT',
            [221, 250]
        );

        return true;

    } finally {

        if (is_resource($socket)) {
            fclose($socket);
        }
    }
}