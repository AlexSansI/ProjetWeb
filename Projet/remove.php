<?php

require("header.php");
$artisteController->remove($_GET["id"]);
echo "<script>window.location.href='./index.php'</script>";