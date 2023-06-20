<?php
require("./header.php") ?>
<h1>Créer un compte</h1>

<?php

$currentUser = NULL;

if ($_GET) {
    $currentUser = $userController->get($_GET["id"]);
}

if ($_POST && $_POST["mail"] && $_POST["password"] && $_POST["nomUser"]) {
    $newUser = new User($_POST);
    if ($_GET) {
        $newUser->setId($_GET["id"]);
        $_SESSION["nomUser"] = $_POST["nomUser"];
        $userController->updateUser($newUser);
    } else {
        $userId = $userController->add($newUser);
        $_SESSION["nomUser"] = $newUser->getNomUser();
        $_SESSION["userId"] = $userId;
    }

    echo "<script>window.location.href='./index.php'</script>";
}

?>

<form class="mx-5" method="POST">
    <label for="nomUser" class="form-label">Nom</label>
    <input type="text" value="<?= $currentUser ? $currentUser->getNomUser() : "" ?>" name="nomUser" id="nomUser" placeholder="Votre nom (speudo)" minlength="2" maxlength="120" class="form-control">
    <label for="mail" class="form-label">Adresse mail</label>
    <input type="mail" value="<?= $currentUser ? $currentUser->getMail() : "" ?>" name="mail" id="mail" placeholder="exemple@exemple.com" minlength="10" maxlength="120" class="form-control">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" value="<?= $currentUser ? $currentUser->getPassword() : "" ?>" name="password" id="password" placeholder="MotDePasse1234!" minlength="8" maxlength="70" class="form-control">
    <input type="submit" value="Valider" class="btn btn-primary mt-2">
</form>

<?php require("./footer.php") ?>

<!--<iframe style="border-radius:12px" src="" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>-->
<!--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 / cle api chat gpt-->