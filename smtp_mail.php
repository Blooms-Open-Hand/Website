<?php

/**
 * Simple SMTP mailer for Blooms Open Hand AFH.
 *
 * Uses implicit TLS (SSL) on SMTP port 465.
 * No Composer dependency required.
 */

define('BLOOMS_SMTP_HOST', 'mail.bloomsopenhandafh.com');
define('BLOOMS_SMTP_PORT', 465);

define('BLOOMS_SMTP_USERNAME', 'noreply@bloomsopenhandafh.com');

/*
 * IMPORTANT:
 * Change the SMTP mailbox password because the previous password
 * was exposed. Put the NEW password here.
 */
define('BLOOMS_SMTP_PASSWORD', '@op10928725');

define(
    'BLOOMS_SMTP_FROM_NAME',
    'Blooms Open Hand Adult Family Home'
);

define('BLOOMS_SMTP_TIMEOUT', 20);


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
 * Send an HTML email using Blooms Open Hand SMTP.
 *
 * @param string      $to       Recipient email
 * @param string      $subject Email subject
 * @param string      $htmlBody HTML email body
 * @param string|null $replyTo Reply-To email address
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


    $host = BLOOMS_SMTP_HOST;
    $port = BLOOMS_SMTP_PORT;

    $errno = 0;
    $errstr = '';


    /*
     * Port 465 uses implicit SSL/TLS.
     */
    $context = stream_context_create([
        'ssl' => [

            /*
             * Verify the SMTP server SSL certificate.
             */
            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => false,

            /*
             * Make sure the certificate is checked against
             * the SMTP hostname.
             */
            'peer_name' => $host,

            /*
             * Enable SNI.
             */
            'SNI_enabled' => true,
        ]
    ]);


    /*
     * Open SSL SMTP connection.
     */
    $socket = @stream_socket_client(
        'ssl://' . $host . ':' . $port,
        $errno,
        $errstr,
        BLOOMS_SMTP_TIMEOUT,
        STREAM_CLIENT_CONNECT,
        $context
    );


    if (!$socket) {

        throw new RuntimeException(
            'Could not connect to SMTP server: ' .
            ($errstr ?: 'connection failed') .
            ' (' .
            $errno .
            ')'
        );
    }


    /*
     * Set socket timeout.
     */
    stream_set_timeout(
        $socket,
        BLOOMS_SMTP_TIMEOUT
    );


    try {

        /*
         * ----------------------------------------------------
         * 1. SMTP SERVER GREETING
         * ----------------------------------------------------
         */
        blooms_smtp_expect(
            $socket,
            [220]
        );


        /*
         * ----------------------------------------------------
         * 2. EHLO
         * ----------------------------------------------------
         */
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


        /*
         * ----------------------------------------------------
         * 3. SMTP AUTH LOGIN
         * ----------------------------------------------------
         */
        blooms_smtp_command(
            $socket,
            'AUTH LOGIN',
            [334]
        );


        /*
         * Username
         */
        blooms_smtp_command(
            $socket,
            base64_encode(
                BLOOMS_SMTP_USERNAME
            ),
            [334]
        );


        /*
         * Password
         */
        blooms_smtp_command(
            $socket,
            base64_encode(
                BLOOMS_SMTP_PASSWORD
            ),
            [235]
        );


        /*
         * ----------------------------------------------------
         * 4. CLEAN SUBJECT / FROM NAME
         * ----------------------------------------------------
         *
         * Prevent CRLF header injection.
         */
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


        /*
         * ----------------------------------------------------
         * 5. EMAIL HEADERS
         * ----------------------------------------------------
         */
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


        /*
         * Add Reply-To when supplied.
         */
        if ($replyTo) {

            $headers[] =
                'Reply-To: ' .
                $replyTo;
        }


        /*
         * ----------------------------------------------------
         * 6. MAIL FROM
         * ----------------------------------------------------
         */
        blooms_smtp_command(
            $socket,
            'MAIL FROM:<' .
            BLOOMS_SMTP_USERNAME .
            '>',
            [250]
        );


        /*
         * ----------------------------------------------------
         * 7. RECIPIENT
         * ----------------------------------------------------
         */
        blooms_smtp_command(
            $socket,
            'RCPT TO:<' .
            $to .
            '>',
            [250, 251]
        );


        /*
         * ----------------------------------------------------
         * 8. DATA
         * ----------------------------------------------------
         */
        blooms_smtp_command(
            $socket,
            'DATA',
            [354]
        );


        /*
         * ----------------------------------------------------
         * 9. NORMALIZE BODY LINE ENDINGS
         * ----------------------------------------------------
         */
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


        /*
         * ----------------------------------------------------
         * 10. SMTP DOT-STUFFING
         * ----------------------------------------------------
         *
         * Correct pattern:
         *
         * /^./m
         *
         * Every body line beginning with "." becomes "..".
         *
         * This fixes the invalid regex that was in your
         * original smtp_mail.php.
         */
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


        /*
         * ----------------------------------------------------
         * 11. BUILD COMPLETE EMAIL
         * ----------------------------------------------------
         */
        $message =
            implode(
                "\r\n",
                $headers
            ) .
            "\r\n\r\n" .
            $body .
            "\r\n.\r\n";


        /*
         * ----------------------------------------------------
         * 12. SEND EMAIL
         * ----------------------------------------------------
         */
        $written = fwrite(
            $socket,
            $message
        );


        if ($written === false) {

            throw new RuntimeException(
                'Failed to send email data to SMTP server.'
            );
        }


        /*
         * ----------------------------------------------------
         * 13. CHECK SMTP ACCEPTED MESSAGE
         * ----------------------------------------------------
         */
        blooms_smtp_expect(
            $socket,
            [250]
        );


        /*
         * ----------------------------------------------------
         * 14. CLOSE SMTP SESSION
         * ----------------------------------------------------
         */
        blooms_smtp_command(
            $socket,
            'QUIT',
            [221, 250]
        );


        return true;


    } finally {

        fclose($socket);
    }
}