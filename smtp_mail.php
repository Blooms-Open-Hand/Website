<?php
/**
 * Simple SMTP mailer for Blooms Open Hand AFH.
 * Uses implicit TLS (SSL) on SMTP port 465 and requires no Composer dependency.
 */

define('BLOOMS_SMTP_HOST', 'mail.bloomsopenhandafh.com');
define('BLOOMS_SMTP_PORT', 465);
define('BLOOMS_SMTP_USERNAME', 'noreply@bloomsopenhandafh.com');
define('BLOOMS_SMTP_PASSWORD', '@op10928725');
define('BLOOMS_SMTP_FROM_NAME', 'Blooms Open Hand Adult Family Home');
define('BLOOMS_SMTP_TIMEOUT', 20);

function blooms_smtp_read($socket): string
{
    $response = '';
    while (($line = fgets($socket, 515)) !== false) {
        $response .= $line;
        if (strlen($line) >= 4 && $line[3] === ' ') {
            break;
        }
    }
    return $response;
}

function blooms_smtp_expect($socket, array $codes): void
{
    $response = blooms_smtp_read($socket);
    $code = (int)substr(trim($response), 0, 3);

    if (!in_array($code, $codes, true)) {
        throw new RuntimeException('SMTP server error: ' . trim($response));
    }
}

function blooms_smtp_command($socket, string $command, array $codes): void
{
    fwrite($socket, $command . "\r\n");
    blooms_smtp_expect($socket, $codes);
}

function blooms_smtp_mail(
    string $to,
    string $subject,
    string $htmlBody,
    ?string $replyTo = null
): bool {
    $host = BLOOMS_SMTP_HOST;
    $port = BLOOMS_SMTP_PORT;
    $errno = 0;
    $errstr = '';

    $socket = @stream_socket_client(
        'ssl://' . $host . ':' . $port,
        $errno,
        $errstr,
        BLOOMS_SMTP_TIMEOUT,
        STREAM_CLIENT_CONNECT
    );

    if (!$socket) {
        throw new RuntimeException(
            'Could not connect to SMTP server: ' . ($errstr ?: 'connection failed')
        );
    }

    stream_set_timeout($socket, BLOOMS_SMTP_TIMEOUT);

    try {
        blooms_smtp_expect($socket, [220]);

        $hostname = $_SERVER['SERVER_NAME'] ?? 'bloomsopenhandafh.com';
        $hostname = preg_replace('/[^A-Za-z0-9.\-]/', '', $hostname) ?: 'bloomsopenhandafh.com';

        blooms_smtp_command($socket, 'EHLO ' . $hostname, [250]);
        blooms_smtp_command($socket, 'AUTH LOGIN', [334]);
        blooms_smtp_command($socket, base64_encode(BLOOMS_SMTP_USERNAME), [334]);
        blooms_smtp_command($socket, base64_encode(BLOOMS_SMTP_PASSWORD), [235]);

        $headers = [
            'From: ' . BLOOMS_SMTP_FROM_NAME . ' <' . BLOOMS_SMTP_USERNAME . '>',
            'To: ' . $to,
            'Subject: ' . $subject,
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];

        if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $headers[] = 'Reply-To: ' . $replyTo;
        }

        blooms_smtp_command($socket, 'MAIL FROM:<' . BLOOMS_SMTP_USERNAME . '>', [250]);
        blooms_smtp_command($socket, 'RCPT TO:<' . $to . '>', [250, 251]);
        blooms_smtp_command($socket, 'DATA', [354]);

        // SMTP dot-stuffing prevents a body line beginning with "." from
        // being interpreted as the end of the message.
        $body = preg_replace('/(?m)^\./', '..', $htmlBody);
        $message = implode("\r\n", $headers) . "\r\n\r\n" . $body;

        fwrite($socket, $message . "\r\n.\r\n");
        blooms_smtp_expect($socket, [250]);

        blooms_smtp_command($socket, 'QUIT', [221, 250]);

        return true;
    } finally {
        fclose($socket);
    }
}
