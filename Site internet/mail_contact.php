<?php
// partie du message
$msg = htmlspecialchars($_GET['message']);
$headers = "From: contact@localhost.com\r\n";

// partie si jamais le message fait plus de 70 caractères
$msg = wordwrap($msg,70);

// partie envoi de l'email
mail("botanniterra@gmail.com","Requête utilisateur",$msg, $headers);
header("Location: index.html");
?>