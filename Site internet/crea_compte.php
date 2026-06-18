<?php

$servername = "webmmi-peda.iut-tarbes.fr";
$username_db = "725cobont";
$password_db = "HNTJqr88TmVH";
$dbname = "725cobont_groupe_2_sae_203";

// Partie connexion
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

// Partie vérif
if (!$conn) {
    die("C'est la mierda : " . mysqli_connect_error());
}

// Récup données formulaire
$username = $_POST['new_username'];
$password = $_POST['new_password'];
$check = $_POST['check_password'];
$password2 = sha1($password);

if ($password != $check) {
    die("Les mots de passe ne correspondent pas, veuillez réessayer.");
}

// Requête SQL
$sql = "INSERT INTO user (username, mdp) VALUES ('$username', '$password2')";

// Exécution SQL
if (mysqli_query($conn, $sql)) {
    sleep(3);
    header("Location: index.html");
    exit;
} else {
    echo "Il y a eu un problème, veuillez réessayer.";
}

// Fin
mysqli_close($conn);

?>
