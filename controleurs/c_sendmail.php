<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$pdo = PdoHtAuto::getPdoHtAuto();

if (!isset($_REQUEST['action'])) {
    $action = 'accueil';
} else {
    $action = $_REQUEST['action'];
}

switch ($action) {
    case 'sendmail':
        {
            $_SESSION['login'] = $login;
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $importmail = $pdo->addEmail($email, $login);
            
            $nom = $login;
            $message = 'Bonjour Monsieur/Madame ' . $nom . '<br><br>Veuillez prendre connaissance du lieu et des horaires disponibles pour les visites.<br>Voici les horaires :<br>Lundi : 09h à 20h<br>Mardi : 09h à 20h<br>Mercredi : 09h à 20h<br>Jeudi : 09h à 20h<br>Vendredi : 09h à 20h<br><br> Lieu de rendez-vous : Les Abymes, Route Nationale 5, 97139 Les Abymes, siege central HTauto.<br><br> Merci et a bientot !';
            $from_email = 'Htauto@example.com';
            $from_name = 'Htauto';
            $subject = 'Réservation';
            $subject = "=?UTF-8?B?".base64_encode($subject)."?=";


            header('Location: index.php?uc=merci&action=responce');

            if (envoie_mail($from_name, $from_email, $subject, $message, $email)) {
                echo 'Email envoyé avec succès.';

            } else {
                echo 'Erreur lors de l\'envoi de l\'email.';
            }
            
            break;

        }


        break;
}
function envoie_mail($from_name, $from_email, $subject, $message,$email)
{
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'asmtp576@gmail.com';
    $mail->Password = 'dnjhbxlomyuvqnyv';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom($from_email, $from_name);
    $mail->addAddress($email, 'User');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
