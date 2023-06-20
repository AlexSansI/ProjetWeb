<?php require("./header.php");
require("./session.php");
?>
<h1>Artiste</h1>

<div class="d-flex flex-wrap">
    <?php
    $i = 0;
    $artistes = $artisteController->getAll(100);

    if ($_POST && $_POST["search"]) {
        if ($artistes = $artisteController->getByName($_POST["search"]) or $artistes = $artisteController->getByStyle($_POST["search"])) {
        } else {
            echo "Il n'existe pas d'artiste qui correspond à votre recherche";
        }
        if ($_POST["search"] === "EasterEgg" or $_POST["search"] === "Easteregg" or $_POST["search"] === "easterEgg" or $_POST["search"] === "easteregg" or $_POST["search"] === "Easter Egg" or $_POST["search"] === "Easter egg" or $_POST["search"] === "easter Egg" or $_POST["search"] === "easter egg") {
            echo "<script>window.location.href='./EasterEgg.php'</script>";
        }
    }
    foreach ($artistes as $artiste) { ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $artiste->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title"><?= $artiste->getNomArtiste() ?></h4>
                <h6 class="card-title"><?= $artiste->getStyle() ?></h6>
                <p class="card-text"><?= substr($artiste->getContent(), 0, 150) ?> <?= strlen($artiste->getContent()) > 150 ? "..." : ""; ?></p>
                <a href="./publication.php?id=<?= $artiste->getId() ?>">Voir l'artiste</a> <br>
                <a href="javascript:;" class="btn btn-primary see-more">Prolonger</a><br>


                <?php
                /*var_dump($_SESSION['userId']);
                echo "<br>";
                var_dump($artiste->getUser_id());*/
                if ($_SESSION['userId'] == $artiste->getUser_id()) { ?>
                    <a href="./creationArtiste.php?id=<?= $artiste->getId() ?>" class="btn btn-info">Modifier</a>
                    <a href="javascript:;" onclick="verifSupArtiste(<?= $artiste->getId() ?>)" class="btn btn-danger">Supprimer</a>
                <?php } else {
                } ?>

            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php require("./footer.php") ?>

<!-- easterEgg
https://www.youtube.com/watch?v=dQw4w9WgXcQ&t
-->

<div class="d-flex flex-column justify-content-end" style="height: 100px;">
    <div class="text-end p-3">
        <a class="btn btn-primary" href="./index.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
            </svg></a>
    </div>
</div>