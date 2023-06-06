<?php

if (key_exists("nomUser", $_SESSION)) {
    echo "<p>Bienvenue {$_SESSION['nomUser']}</p>";
} else {
    echo "<script>window.location.href='./login.php'</script>";
}