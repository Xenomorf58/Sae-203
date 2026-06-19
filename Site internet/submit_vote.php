<?php

$servername = "webmmi-peda.iut-tarbes.fr";
$username_db = "725cobont";
$password_db = "HNTJqr88TmVH";
$dbname = "725cobont_groupe_2_sae_203";

$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

if (!$conn) {
    die("Erreur connexion : " . mysqli_connect_error());
}


$id_user = 1;

$id_soiree = (int)($_POST['id_soiree'] ?? 0);
$vote_film = isset($_POST['vote_film']) ? (int)$_POST['vote_film'] : null;
$vote_lieu = isset($_POST['vote_lieu']) ? (int)$_POST['vote_lieu'] : null;

if ($id_soiree <= 0) {
    die("Soirée invalide");
}

$sql = "INSERT INTO vote (id_user, id_soirée, vote_film, vote_lieu) VALUES ($id_user, $id_soiree," . ($vote_film !== null ? $vote_film : "NULL") . "," . ($vote_lieu !== null ? $vote_lieu : "NULL") . ")";

if (!mysqli_query($conn, $sql)) {
    die("Erreur vote : " . mysqli_error($conn));
}

header("Location: resultats.php?id_soiree=$id_soiree");
exit;
?>
