<?php require("./header.php");
require("./session.php") ?>
<h1>Ajouter un artiste</h1>

<?php

$currentArtiste = NULL;

if ($_GET) {
    $currentArtiste = $artisteController->get($_GET["id"]);
}

if ($_POST) {
    $newArtiste = new Artiste($_POST);

    echo "<pre>";
    var_dump($newArtiste);
    echo "</pre>";
    if ($_GET) {
        $newArtiste->setId($_GET["id"]);
        $artisteController->update($newArtiste);
    } else {
        $artisteController->add($newArtiste);
    }

    echo "<script>window.location.href='./index.php'</script>";
}

?>

<form class="mx-5" method="POST">
    <label for="artiste" class="form-label">Artiste</label>
    <input type="text" value="<?= $currentArtiste ? $currentArtiste->getNomArtiste() : "" ?>" name="nomArtiste" id="artiste" placeholder="Le nom de l'artiste" minlength="2" maxlength="120" class="form-control">
    <label for="style" class="form-label">Style de musique</label>
    <input type="text" value="<?= $currentArtiste ? $currentArtiste->getStyle() : "" ?>" name="style" id="style" placeholder="Le style de l'artistee" minlength="2" maxlength="120" class="form-control">
    <label for="image" class="form-label">Image</label>
    <input type="url" value="<?= $currentArtiste ? $currentArtiste->getImage() : "" ?>" name="image" id="image" placeholder="L'URL d'image de l'artiste" minlength="5" maxlength="150" class="form-control">
    <label for="music" class="form-label">Musique</label>
    <input type="url" value="<?= $currentArtiste ? $currentArtiste->getMusic() : "" ?>" name="music" id="music" placeholder="L'URL de la musique trouver sur Spotify" minlength="5" maxlength="150" class="form-control">
    <label for="content" class="form-label">Contenu</label>
    <textarea name="content" id="content" placeholder="Le contenu de l'artiste" minlength="10" maxlength="1200" class="form-control"><?= $currentArtiste ? $currentArtiste->getContent() : "" ?></textarea>
    <input type="submit" value="Publier" class="btn btn-primary mt-2">
</form>

<?php require("./footer.php") ?>

<!--<iframe style="border-radius:12px" src="" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>-->