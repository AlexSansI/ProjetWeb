<?php

require("header.php");
$userController->removeUser($_GET["id"]);
echo "<script>window.location.href='./disconnect.php'</script>";