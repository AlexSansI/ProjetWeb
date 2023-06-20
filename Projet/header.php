<!DOCTYPE html>
<html lang="fr-FR">
<?php 
require ("./favicon.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?= $chosenFav ?>" type="image/x-icon">
    <title>ArtistArium</title>
    <?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    ?>
</head>

<body>
    <?php
    function loadClass(string $class): void
    {
        if (str_contains($class, "Controller")) {
            require "./Controller/$class.php";
        } else {
            require "./Entity/$class.php";
        }
    }

    spl_autoload_register("loadClass");

    $artisteController = new ArtisteController();
    $userController = new UserController();

    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">ArtistArium</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./creationArtiste.php">Ajouter un artiste</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="./listArtiste.php">Liste des artistes</a>
                    </li>-->

                    <?php
                    if ($_SESSION && $_SESSION["nomUser"] && $_SESSION["userId"]) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./disconnect.php">Se déconnecter</a>
                        </li>
                        <li>
                            <a class="nav-link" href="./modificationCompte.php">Modifier mon compte</a>
                        </li>
                        <li>
                            <a class="nav-link" href="./suppressionCompte.php">Supprimer mon compte</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./creationCompte.php">Créer un compte</a>
                        </li>
                    <?php endif ?>
                </ul>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand"></a>
                        <form method="POST" class="d-flex" role="search">
                            <input class="form-control me-2" name="search" type="search" placeholder="Rechercher" aria-label="Rechercher">
                            <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
                        </form>
                    </div>
                </nav>

            </div>
        </div>
    </nav>


    <div class="container">
        <!--
        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DZ06evO1G9baM?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>

        -->