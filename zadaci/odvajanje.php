<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odvajanje niza</title>
</head>
<body>
    <?php
    $niz = array("crvena", "plava", "zuta", "zelena");
    $n = count($niz);


    for ($i = 0; $i < $n - 1; $i++) {
        echo $niz[$i];
        if ($i < $n - 2) {
            echo ", ";
        }
    }
    echo " i " . $niz[$n - 1];
    

    ?>
</body>
</html>