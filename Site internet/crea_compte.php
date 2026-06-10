<?php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "test";

// Partie connexion
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

// Partie vérif
if (!$conn) {
    die("C'est la mierda : " . mysqli_connect_error());
}

// Récup données formulaire
$username = $_POST['new_username'];
$password = $_POST['new_password'];
$password2 = sha1($password);

// Requête SQL
$sql = "INSERT INTO comptes (username, password)
        VALUES ('$username', '$password2')";

// Exécution SQL
if (mysqli_query($conn, $sql)) {
    echo "Le compte a été créé avec succès.";
    echo "Vous allez être redirigé vers la page de connexion, veuillez patienter.";

    sleep(3);

    header("Location: index.html");
    exit;
} else {
    echo "Il y a eu un problème, veuillez réessayer.";
}

// Fin
mysqli_close($conn);

?>
