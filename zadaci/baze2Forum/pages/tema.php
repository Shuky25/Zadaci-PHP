<!DOCTYPE html>
<?php
session_start();
$naslovErr = $opisErr = "";
$naslov = $opis = "";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema</title>
</head>

<body>
    <form id="tema" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="naslov">Naslov: </label>
        <input type="text" name="naslov" placeholder="Unesi naslov"><?php echo $naslovErr; ?><br>
        <label for="opis">Opis: </label>
        <input type="text" name="opis" placeholder="Unesi opis"><br>
        <button type="submit" name="objavi" id="reg">Objavi temu</button>
    </form>
    <?php

    require './../baza/konekcija.php';

    $sql = "SELECT * FROM tema";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) != 0) {
        echo "<div class='container'>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<div class='row m-auto w-50'>";
            echo "<p><b>ID:</b> " . $row['id'] . "</p><br>";
            echo "<p><b>Ime:</b> " . $row['naslov'] . "</p><br>";
            echo "<p><b>Prezime:</b> " . $row['opis'] . "</p><br>";
            echo "</div><hr><br>";
        }
        echo "</div>";
    }
    else {
        echo "<p>Nema prikazanih tema</p>";
    }

    
    


    /* $sql = "INSERT INTO korisnik(email, password, ime, prezime) VALUES('$email', '$psw', '$ime', '$prezime')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Polje uneseno u bazu');</script>";
                        } else {
                            echo "<script>alert('Greska pri unosu');</script>";
                        } */

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $naslov = "";
        $opis = "";
        if (isset($_POST['objavi'])) {
            if ($naslov == "") {
                $naslovErr = "Polje je obavezno";
            }
            if ($opis == "") {
                $opisErr = "Polje je obavezno";
            } else {
                $naslov = $_POST['naslov'];
                $opis = $_POST['opis'];

                $sql = "SELECT * FROM tema WHERE naslov = '$naslov'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) == 0) {

                    $sql = "INSERT INTO tema(naslov, opis) VALUES('$naslov', '$opis')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Tema je postavljena!');</script>";
                    } else {
                        echo "<script>alert('Greska pri unosu!');</script>";
                    }
                } else {
                    echo "<script>alert('Tema postoji u bazi!');</script>";
                }
            }
        }
    }



    ?>
    <hr id="linija">
</body>

</html>