<?php
use PHPMailer\PHPMailer\PHPMailer; // On importe la classe tout en haut
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // On charge l'autoloader de composer
$mail = new PHPMailer(true); // Instantiation
// Paramètres du serveur
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
// Informations envoyeur/réceptionneur
$mail->Username = 'hamzajabre6@gmail.com';
$mail->Password = 'wclgiqdpurppvkgx';
$mail->From = 'test@debian.fr';
$mail->FromName = 'server';
$email_user = $_POST['email_user'];

$mail->addAddress($email_user);
// Contenu
$mail->isHTML(true); // Permet l'interprétation de l'HTML dans le mail
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->Subject = 'test';
$body = '<p>'Bonjour '.$name_user.' '.$first_name_user.' votre compte a été crée avec succès</p>';
$mail->Body = $body;
try {
    $mail->send();
} catch(Exception $e) {
    echo "Erreur: ". $e->getMessage();
}
exit;
