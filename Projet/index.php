<?php require("./header.php");
require("./session.php");
?>
<h1>Artiste</h1>

<div class="d-flex flex-wrap">
    <?php
    $artistes = $artisteController->getAll(8);
    $i = 0;

    foreach ($artistes as $artiste) { ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $artiste->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $artiste->getNomArtiste() ?></h5>
                <p class="card-text"><?= substr($artiste->getContent(), 0, 150) ?> <?= strlen($artiste->getContent()) > 150 ? "..." : ""; ?></p>
                <a href="./publication.php?id=<?= $artiste->getId() ?>">Voir plus</a> <br>
                <a href="./creationArtiste.php?id=<?= $artiste->getId() ?>" class="btn btn-warning">Modifier</a>
                <a href="javascript:;" onclick="verifSup(<?= $artiste->getId() ?>)" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    <?php

        $i++;
    }  ?>
</div>




<?php require("./footer.php") ?>