<?php

namespace Proyek1\Service;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class Mailer
{
    public function setMail()
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();

        $mail->SMTPAuth = true;
        $mail->Host = "smtp.proyek-1.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = "hasan@proyek-1.com";
        $mail->Password = "12345";

        $mail->isHtml(true);

        return $mail;
    }
}