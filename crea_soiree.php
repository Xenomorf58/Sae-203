<?php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "test";

// Connexion
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

// Vérification
if (!$conn) {
    die("C'est la mierda : " . mysqli_connect_error());
}


// Récupération des données du formulaire


//PARTIE CHOIX NOM SOIREE
$nom_soirée = $_POST['nom_soiree'];


//PARTIE CHOIX DES FILMS
$films = [];

if (isset($_POST['film1'])) {
    $films[] = $_POST['film1'];
}

if (isset($_POST['film2'])) {
    $films[] = $_POST['film2'];
}

if (isset($_POST['film3'])) {
    $films[] = $_POST['film3'];
}

$liste_films = implode(", ", $films);


//PARTIE CHOIX LIEUX

$lieux = [];

if (isset($_POST['lieu1'])) {
    $lieux[] = $_POST['lieu1'];
}

if (isset($_POST['lieu2'])) {
    $lieux[] = $_POST['lieu2'];
}

if (isset($_POST['lieu3'])) {
    $lieux[] = $_POST['lieu3'];
}

$liste_lieux = implode(", ", $lieux);

//PARTIE CHOIX DATE

$date = $_POST['date'];


//PARTIE CHOIX THEME

$theme = $_POST['theme'];


// Requête SQL
$sql = "INSERT INTO soirée(nom_soirée, Liste_film, Liste_lieu, date, thème) VALUES ('$nom_soirée', '$liste_films', '$liste_lieux','$date', '$theme')"; 

// Exécution
if (mysqli_query($conn, $sql)) {
    echo "$liste_films";
    sleep(3);
    header("Location: index.html");
    exit;

} else {
    echo "Il y a eu un problème, veuillez réessayer.";
}

// Fermeture de la connexion
mysqli_close($conn);

?>
