<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/stylePubli.css">
    <title>Qui chante ?</title>
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
            <a class="navbar-brand" href="./index.php">Qui chante ?</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
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
                        <li>
                            <a class="nav-link" href="./disconnect.php">Se déconnecter</a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a class="nav-link" href="./creationCompte.php">Créer un compte</a>
                        </li>
                    <?php endif?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <!--
        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DZ06evO1G9baM?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>

        -->