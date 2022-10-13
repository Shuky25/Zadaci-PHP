<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesije 2</title>
</head>
<body>
    <?php
    echo "Na svetu postoji Bog, i postoji " . $_SESSION['gospod'] . "<br>";
    echo $_SESSION["jordanke"] . " nije Bog jos ali je svedok";
    ?>
</body>
</html>