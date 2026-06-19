<?php


//PARTIE CONNEXION / CHECK CONNEXION
$servername = "webmmi-peda.iut-tarbes.fr";
$username_db = "725cobont";
$password_db = "HNTJqr88TmVH";
$dbname = "725cobont_groupe_2_sae_203";

$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

if (!$conn) {
    die("Erreur connexion : " . mysqli_connect_error());
}


//PARTIE CHOIX NOM SOIREE
$nom_soirée = $_POST['nom_soiree'] ?? '';


//PARTIE CHOIX DATE
$date = $_POST['date'] ?? '';


//PARTIE CHOIX THEME
$theme = $_POST['theme'] ?? '';



//PARTIE CHOIX FILMS
$films = $_POST['films'] ?? [];

//PARTIE CHOIX LIEUX
$lieux = $_POST['lieux'] ?? [];



// PARTIE INSERT SOIRÉE
$sql = "INSERT INTO soirée (nom_soirée, date_soirée, thème) VALUES ('$nom_soirée', '$date', '$theme')";

if (!mysqli_query($conn, $sql)) {
    die("Erreur soirée : " . mysqli_error($conn));
}

$id_soiree = mysqli_insert_id($conn);


// PARTIE LIAISON FILMS
foreach ($films as $id_film) {
    $id_film = (int)$id_film;
    $sql_film = "INSERT INTO soiree_film (id_soiree, id_film) VALUES ($id_soiree, $id_film)";
    mysqli_query($conn, $sql_film);
}


// PARTIE LIAISON LIEUX
foreach ($lieux as $id_lieu) {
    $id_lieu = (int)$id_lieu;
    $sql_lieu = "INSERT INTO soirée_lieu (id_soirée, id_lieu) VALUES ($id_soiree, $id_lieu)";
    mysqli_query($conn, $sql_lieu);
}


mysqli_close($conn);
header("Location: index.html");
exit;

?>
