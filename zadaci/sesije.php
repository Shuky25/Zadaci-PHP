<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesija</title>
</head>
<body>
    <?php
    $_SESSION["gospod"] = "suki";
    $_SESSION["jordanke"] = "majdza";
    echo "Promenljiva je postavljena";
    
    ?>
    <a href="./sesije2.php">Sesija na drugoj strani</a>
</body>
</html>