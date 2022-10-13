<?php
$cookie_name = 'Voce';
$cookie_value = 'Kajsija';
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), '/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolacici</title>
</head>
<body>
    <h1>Kolacic</h1>
    <?php
    if(!isset($_COOKIE[$cookie_name])) {
        echo '<p>Zdravo! Prvi put ste ovde!</p>';
    }
    else {
        echo '<p>Zdravo, opet! Izabrali ste voce ' . $cookie_value . ' </p>';
    }
    ?>
</body>
</html>