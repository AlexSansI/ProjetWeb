<?php

require("header.php");
$artisteController->removeArtiste($_GET["id"]);
echo "<script>window.location.href='./index.php'</script>";