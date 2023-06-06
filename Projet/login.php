<!DOCTYPE html>
<html lang="fr-FR">
<?php
require("./header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
if ($_POST && $_POST["mail"] && $_POST["password"]) {
    $user = $userController->getByMail($_POST["mail"]);
    if (password_verify($_POST["password"], $user->getPassword())) {
        $_SESSION["nomUser"] = $user->getNomUser();
        $_SESSION["userId"] = $user->getId();
        echo "<script>window.location.href='./index.php'</script>";
    } else {
        echo "Il y a eu une erreur lors de la connection à votre compte";
    }
}
?>

<body>
    <h2>Connectez-vous</h2>

    <form class="mx-5" method="POST">
        <label for="mail" class="form-label">Adresse mail</label>
        <input type="mail" name="mail" id="mail" placeholder="exemple@exemple.com" minlength="10" maxlength="120" class="form-control">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="MotDePasse1234!" minlength="8" maxlength="70" class="form-control">
        <input type="submit" value="Me connecter" class="btn btn-primary mt-2">
    </form>

    
    <h2>Créer un compte</h2>
    <a href="./creationCompte.php" class="btn btn-primary mt-2">Cliquer ici !</a>
    <?php require("./footer.php") ?>
</body>

</html>