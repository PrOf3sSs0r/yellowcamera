<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    try {

        $mail ->isSMTP();
        $mail ->CharSet = 'UTF-8';
        $mail ->Host = 'smtp.gmail.com';
        $mail ->Port = '465';
        $mail ->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail ->SMTPAuth = true;
        $mail ->Username = 'kamil.jarmolinski.kontakt@gmail.com';
        $mail ->Password = 'zpebqvulboyalvdl';
        $mail ->setFrom('kamil.jarmolinski.kontakt@gmail.com');
        $mail ->addAddress('kamil.jarmolinski.kontakt@gmail.com');
        $mail ->isHTML(true);
        $mail ->Subject = $subject;
        $mail ->Body = "Imię: $name <br> E-mail: $email <br> Wiadomość: $msg";

        $mail ->send();
        $alert = "<span class='form-sent'>Wiadomość została wysłana!</span>";


    } catch (Exception $e) {
        $alert = "<span class='form-error'>Niestety coś poszło nie tak..</span>";
    }
}

?>
