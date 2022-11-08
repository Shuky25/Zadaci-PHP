<!DOCTYPE html>
<?php
//session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="tema" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="naslov">Naslov: </label>
        <input type="text" name="naslov" placeholder="Unesi naslov"><br>
        <label for="opis">Opis: </label>
        <input type="text" name="opis" placeholder="Unesi opis"><br>
        <button id="reg">Objavi temu</button>
    </form>
    <hr id="linija">
</body>
</html>