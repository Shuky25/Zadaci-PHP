<?php
$nameErr = $mailErr = $filmErr = $terminErr = $sedisteErr = "";
$name = $mail = $film = $termin = $sediste = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && preg_match("/^([a-zA-Z' ]+)$/", $_POST['name'])) {
        $nameErr = "";
        $name = test_input($_POST['name']);
    } else {
        $nameErr = "Greska u unosu imena";
    }

    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mailErr = "";
        $mail = test_input($_POST['mail']);
    } else {
        $mailErr = "Mejl nije dobar";
    }

    if (!empty($_POST['film'])) {
        $filmErr = "";
        $film = test_input($_POST['film']);
    } else {
        $filmErr = "Ovo polje je obavezno";
    }

    if (!empty($_POST['termin'])) {
        $terminErr = "";
        $termin = test_input($_POST['termin']);
    } else {
        $terminErr = "Ovo polje je obavezno";
    }

    if (!empty($_POST['sediste']) && preg_match("/^([1-9])/", $_POST['sediste'])) {
        $sedisteErr = "";
        $sediste = test_input($_POST['sediste']);
    } else {
        $sedisteErr = "Ovo polje je obavezno";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija bioskopske karte</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form .form-control {
            padding: 5px;
        }

        form .form-control label {
            font-size: 20px;
        }

        form .form-control input {
            padding: 5px;
            outline: none;
            border: none;
            border-bottom: 2px solid black;
            width: 200px;
            background-color: #d3d3d3;
            transition: .2s;
        }

        form .form-control input:focus {
            background-color: #fff;
        }

        form button {
            padding: 10px 5px;
            border: 2px solid #000066;
            color: #fff;
            background-color: #000066;
            transition: .2s;
            font-weight: bold;
            border-radius: 10px;
        }

        form button:hover {
            background-color: #fff;
            color: #000066;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Rezervacija bioskopske karte</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-control">
            <label for="name">Ime: </label>
            <input type="text" name="name" placeholder="Unesite ime"><?php echo $nameErr; ?>
        </div>
        <div class="form-control">
            <label for="mail">Email: </label>
            <input type="email" name="mail" placeholder="Unesite mail"><?php echo $mailErr; ?>
        </div>
        <div class="form-control">
            <label for="film">Film: </label>
            <select name="film" id="film">
                <option value="" default></option>
                <option value="Juzni Vetar">Juzni Vetar</option>
                <option value="Rocky V">Rocky V</option>
                <option value="Cuvari plaze">Cuvari plaze</option>
                <option value="Bruce Lee">Bruce Lee</option>
            </select><?php echo $filmErr; ?>
        </div>
        <div class="form-control">
            <label for="termin">Termin: </label>
            <select name="termin" id="termin">
                <option value="" default></option>
                <option value="16">16 h</option>
                <option value="18">18</option>
                <option value="20">20 h</option>
                <option value="22">22 h</option>
            </select><?php echo $terminErr; ?>
        </div>
        <div class="form-control">
            <label for="sediste">Broj sedista: </label>
            <input type="text" name="sediste" placeholder="Unesite broj sedista"><?php echo $sedisteErr; ?>
        </div>
        <button type="submit">Rezervisi</button>
    </form>
</body>

</html>

<?php

if ($nameErr == "" && $mailErr == "" && $filmErr == "" && $terminErr == "" && $sedisteErr == "") {
    $file = fopen("rezervacija.txt", "w") or die("Ne mozemo otvoriti fajl!");
    $string = "Izvrsena je rezervacija na ime $name , za film $film  u terminu  $termin .\nBroj sedista je  $sediste";
    fwrite($file, $string);
    fclose($file);
}

?>