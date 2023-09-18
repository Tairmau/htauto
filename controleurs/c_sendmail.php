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
            $id_voiture = isset($_GET['id']) ? $_GET['id'] : '';
            $date = isset($_POST['date']) ? $_POST['date'] : '';
            $heure = isset($_POST['heure']) ? $_POST['heure'] : '';

            $targetDomain = '@gmail.com';
            if(strpos($email, $targetDomain) !== false){

                $req="select * from produits where id = $id_voiture";
                $lavoiture = $pdo->getLesProduits($req);
    
                $modele = $lavoiture[0]['modele'];
                $type = $lavoiture[0]['type'];
                $annee = $lavoiture[0]['annee'];
    
                $importmail = $pdo->addEmail($email,$login,$date,$heure,$modele,$type,$annee,$id_voiture);
                
                $nom = $login;
                $message = 'Bonjour Monsieur/Madame ' . $nom . '<br><br>Veuillez prendre connaissance du lieu et horaires choisis pour la visite.<br>Voici les horaires :<br>Jour : ' .$date. '<br>heure : '.$heure. '<br> Voiture selectionner : ' .$modele .' - '.$type.' - '.$annee;
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
            }else{
                $errormessage = 'Veuillez nous donner votre email';
                header('Location: index.php?uc=reservation&id=101&error=' . urlencode($errormessage));
                exit;
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
