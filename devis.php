<?php
// Destinataire du devis
$destinataire = "emaildestinataire@domaine.com";

// Sujet de l'e-mail
$sujet = "Devis pour votre projet";

// Message du corps de l'e-mail
$message = "Bonjour,\n\nVeuillez trouver ci-joint notre devis pour votre projet.\n\nCordialement,\n\nL'équipe de notre entreprise";

// Nom du fichier du devis
$nom_fichier = "devis.pdf";

// Chemin complet du fichier du devis
$chemin_fichier = "/chemin/vers/devis.pdf";

// Type de contenu de la pièce jointe
$type_contenu = "application/pdf";

// Lecture du contenu du fichier du devis
$contenu_fichier = file_get_contents($chemin_fichier);

// Encodage base64 du contenu du fichier du devis
$contenu_fichier_encode = base64_encode($contenu_fichier);

// Entête de l'e-mail avec la pièce jointe
$entete = "From: email@domaine.com\r\n";
$entete .= "MIME-Version: 1.0\r\n";
$entete .= "Content-Type: multipart/mixed; boundary=\"frontiere\"\r\n";

// Message de l'e-mail avec la pièce jointe
$message_email = "--frontiere\r\n";
$message_email .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
$message_email .= "Content-Transfer-Encoding: 8bit\r\n";
$message_email .= "\r\n" . $message . "\r\n";
$message_email .= "--frontiere\r\n";
$message_email .= "Content-Type: " . $type_contenu . "; name=\"" . $nom_fichier . "\"\r\n";
$message_email .= "Content-Transfer-Encoding: base64\r\n";
$message_email .= "Content-Disposition: attachment; filename=\"" . $nom_fichier . "\"\r\n";
$message_email .= "\r\n" . $contenu_fichier_encode . "\r\n";
$message_email .= "--frontiere--";

// Envoi de l'e-mail avec la pièce jointe
mail($destinataire, $sujet, $message_email, $entete);
?>
