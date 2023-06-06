<html>
    <!--<link rel="stylesheet" href="./Style/stylePubli.css">-->
</html>
<?php
require "header.php";
if ($_GET && $_GET["id"]) {
    $artiste = $artisteController->get($_GET["id"]);
}
?>
<div class="blockPubli">
    <img src="<?= $artiste->getImage() ?>" alt="..." class="ppArtiste">
    <div class="publi">
        <br>
        <h2><?= $artiste->getNomArtiste() ?></h2>
        <br>
        <iframe style="border-radius:12px" src="<?= $artiste->getMusic() ?>" class="publi" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        <br>
        <br>
        <p class="publi"><?= $artiste->getContent() ?></p>
    </div>
</div>