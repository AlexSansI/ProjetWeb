<?php
require("./header.php");
echo "<script>window.location.href='./removeUser.php?id=" . $_SESSION['userId'] . "'</script>";