<?php

/**
 * Blooms Open Hand - Website Mailer
 *
 * This version uses PHP's native mail() function.
 *
 * It does NOT require:
 * - OpenSSL
 * - PHPMailer
 * - Composer
 * - SMTP socket connections
 *
 * IMPORTANT:
 * Your hosting provider must allow PHP mail().
 */

define(
    'BLOOMS_MAIL_TO',
    'yosefsahle48@gmail.com'
);

define(
    'BLOOMS_MAIL_FROM',
    'noreply@bloomsopenhandafh.com'
);

define(
    'BLOOMS_MAIL_FROM_NAME',
    'Blooms Open Hand Adult Family Home'
);


/**
 * Send an HTML email.
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
    if (
        !filter_var(
            $to,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        throw new InvalidArgumentException(
            'Invalid recipient email address.'
        );
    }


    /*
     * Clean subject.
     */
    $subject = str_replace(
        ["\r", "\n"],
        '',
        $subject
    );


    /*
     * Build headers.
     */
    $headers = [];


    $headers[] =
        'MIME-Version: 1.0';


    $headers[] =
        'Content-Type: text/html; charset=UTF-8';


    $headers[] =
        'Content-Transfer-Encoding: 8bit';


    $headers[] =
        'From: ' .
        BLOOMS_MAIL_FROM_NAME .
        ' <' .
        BLOOMS_MAIL_FROM .
        '>';


    /*
     * Use the visitor's email as Reply-To.
     */
    if (
        $replyTo &&
        filter_var(
            $replyTo,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        $headers[] =
            'Reply-To: ' .
            $replyTo;
    }


    /*
     * Build final header string.
     */
    $headerString =
        implode(
            "\r\n",
            $headers
        );


    /*
     * Send email.
     */
    $result = mail(
        $to,
        $subject,
        $htmlBody,
        $headerString
    );


    /*
     * PHP mail() returns FALSE when the local mail
     * system could not accept the message.
     */
    if (!$result) {

        error_log(
            'Blooms Open Hand: PHP mail() failed while sending to ' .
            $to
        );


        throw new RuntimeException(
            'The server could not send the email using PHP mail().'
        );
    }


    /*
     * Email accepted by the server.
     */
    error_log(
        'Blooms Open Hand: PHP mail() accepted message for ' .
        $to
    );


    return true;
}