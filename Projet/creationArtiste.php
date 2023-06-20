<?php require("./header.php");
require("./session.php") ?>
<h1>Ajouter un artiste</h1>

<?php

$currentArtiste = NULL;

if ($_GET) {
    $currentArtiste = $artisteController->get($_GET["id"]);
}

if ($_POST && $_POST["nomArtiste"] && $_POST["style"] && $_POST["image"] && $_POST["music"] && $_POST["content"]) {
    $newArtiste = new Artiste($_POST);

    $doublonsArtiste = $artisteController->getByName($_POST["nomArtiste"]);
    $doublonsId = $artisteController -> getById($_POST["id"]);
    if (count($doublonsArtiste) > 0 && count($doublonsId) != 0) {
    
    //if ($currentArtiste->getNomArtiste() === $doublonsArtiste){
        echo "Cet artiste existe déjà !";
    } else {
        if ($_GET) {
            $newArtiste->setId($_GET["id"]);
            $artisteController->updateArtiste($newArtiste);
        } else {
            $artisteController->add($newArtiste);
        }
        echo "<script>window.location.href='./index.php'</script>";
    }
}
?>

<form class="mx-5" method="POST">
    <label for="artiste" class="form-label">Artiste</label>
    <input type="text" value="<?= $currentArtiste ? $currentArtiste->getNomArtiste() : "" ?>" name="nomArtiste" id="artiste" placeholder="Le nom de l'artiste" minlength="2" maxlength="120" class="form-control">
    <label for="style" class="form-label">Style de musique</label>
    <input type="text" value="<?= $currentArtiste ? $currentArtiste->getStyle() : "" ?>" name="style" id="style" placeholder="Le style de l'artiste (uniquement le premier)" minlength="2" maxlength="120" class="form-control">
    <label for="image" class="form-label">Image</label>
    <input type="url" value="<?= $currentArtiste ? $currentArtiste->getImage() : "" ?>" name="image" id="image" placeholder="L'URL d'une photo de l'artiste" minlength="5" maxlength="150" class="form-control">
    <label for="music" class="form-label">Musique</label>
    <input type="url" value="<?= $currentArtiste ? $currentArtiste->getMusic() : "" ?>" name="music" id="music" placeholder="L'URL de la musique trouvé sur Spotify" minlength="5" maxlength="150" class="form-control">
    <label for="content" class="form-label">Contenu</label>
    <textarea name="content" id="content" placeholder="Un rapide (ou non) descriptif de l'artiste" minlength="10" maxlength="1200" class="form-control"><?= $currentArtiste ? $currentArtiste->getContent() : "" ?></textarea>
    <input type="submit" value="Publier" class="btn btn-success mt-2">
</form>

<?php require("./footer.php") ?>

<!--<iframe style="border-radius:12px" src="" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>-->