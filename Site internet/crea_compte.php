<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("C'est la mierda: " . $conn->connect_error);
}

//recupération du mdp et username
$username = $_POST['new_username'];
$password = $_POST['new_password'];

$sql = "INSERT INTO comptes (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Le compte a été crée avec succès.";
    echo "Vous allez être redirigé vers la page de connexion, veuillez patienter.";
    sleep(3);
    header("Location: index.html");
    exit;
} else {
    echo "Il y a eu un problème, veuillez réessayer.";
}

?>