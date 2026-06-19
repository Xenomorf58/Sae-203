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


//PARTIE RECUPERATION FILMS
$sql_films = "SELECT * FROM film";
$res_films = mysqli_query($conn, $sql_films);


//PARTIE RECUPERATION LIEUX
$sql_lieux = "SELECT * FROM lieu";
$res_lieux = mysqli_query($conn, $sql_lieux);

?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Groupe 2">
    <title>SAE 203 - Choix de film : Création de soirée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Lien pour le fichier css bootstrap de base-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<!--https://icons.getbootstrap.com = Icones Bootstrap-->

<body>
    <header>
        <nav class="navbar p-4 navbar-expand-lg" data-bs-theme="navbar-light">
            <div class="container-fluid bg-dark fixed-top justify-content-evenly pt-2 pb-2">
                <a class="navbar-brand link text-white" href="./index.html"
                    title="Lien vers la page d'Accueil">Accueil</a>

                <form class="d-flex" role="search">

                    <input class="form-control me-2 h-auto w-100" type="search" placeholder="Rechercher"
                        aria-label="Search" />
                    <button class="btn border border-1 border-dark Search" type="submit rounded-2">Search</button>
                </form>


                <div class="" id="togglerMenu">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="btn border border-1 border-dark active me-5" href="./index.html">
                                    <i class="bi bi-house me-1"></i>Accueil
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="btn border border-1 border-dark active me-5"
                                    href="./Creation_de_soiree.php">
                                    <i class="bi bi-info-square me-1"></i>Créer une soirée
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="btn border border-1 border-dark active me-5" href="./login.html">
                                    <i class="bi bi-door-open me-1"></i>
                                    Se Connecter

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>



    <form action="crea_soiree.php" method="post" id="soirée">
        <div class="css">
            <br>
            <h3><strong>Formulaire de création de soirée</strong></h3>

            <label for="username">Nom de la soirée :</label>
            <input id="inputsoirée" type="text" name="nom_soiree">
            <br>

            <hr class="mb-4">

            <label for="theme">Choisissez le thème de votre soirée :</label>
            <input type="radio" name="theme" value="Action">Action<br>
            <input type="radio" name="theme" value="Fantastique">Fantastique<br>
            <input type="radio" name="theme" value="Romantique">Romantique<br><br>


            <hr class="mt-2 mb-4">


            <!--PARTIE CHOIX FILMS-->
            <label for="film">Choisissez des films à soumettre au vote :</label>
            <?php while ($f = mysqli_fetch_assoc($res_films)) { ?>
                <br>
                <input type="checkbox" name="films[]" value="<?= $f['id_film'] ?>">
                <?= $f['titre'] ?>
            <?php } ?>


            <br><br>

            <hr class="mt-4 mb-4">


            <!--PARTIE CHOIX LIEUX-->
            <label for="lieu">Choisissez des lieux à soumettre au vote :</label>
            <?php while ($l = mysqli_fetch_assoc($res_lieux)) { ?>
                <br>
                <input type="checkbox" name="lieux[]" value="<?= $l['id_lieu'] ?>">
                <?= $l['nom_lieu'] ?>
            <?php } ?>


            <hr class="mt-4 mb-4">


            <label for="choix-nombre">
                Choisissez le nombre de personnes invitées à votre soirée :
            </label>
            <input id="choix-nombre" type="number" name="choix-nombre" min="1" max="25" value="1">


            <hr class="mt-4 mb-4">


            <label for="date">
                Choisissez la date de votre soirée :
            </label>
            <input id="inputsoirée" type="datetime-local" name="date">
            <br class="mb-3">
            <button type="submit" value="Submit">Envoyer</button>
        </div>

    </form>



    <!--Restriction à 10 films max choisis-->
    <!--<script>
        const checkbox = document.querySelectorAll('input[type='checkbox']');
    </script>-->




    <footer class="container-fluid bg-dark text-white fixed-bottom footer">
        <div class="d-flex justify-content-evenly align-items-center">
            <a class="btn border border-1 border-dark p-1" href="index.html">
                <img src="./img/Logo.png"
                    alt="Logo de notre site"
                    class="img-fluid">
            </a>

            <a class="btn border border-1 border-dark active pt-2 me-4" href="./Mention_Legale.html">
                Mentions légales
            </a>

            <div class="p-1">
                <a class="btn p-2 me-2 text-white" href="https://discord.gg/BwSvDdaqD"
                    title="Lien vers notre Discord"
                    target="_blank">
                    <i class="bi bi-discord"></i>
                </a>

                <a class="btn p-2 text-white"
                    href="https://www.instagram.com/vie.etudiante.tarbes/?hl=fr"
                    title="Lien vers Instagram"
                    target="_blank">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
