<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza bioskop</title>
</head>

<body>
    <h1>Rezervacija bioskopske karte</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" placeholder="Ime" name="ime"><br>
        <input type="text" placeholder="Prezime" name="prezime"><br>
        <input type="text" placeholder="Email" name="mejl"><br>
        <input type="text" placeholder="Film" name="film"><br>
        <input type="text" placeholder="Termin" name="termin"><br>
        <input type="text" placeholder="Broj sedista" name="sediste"><br>
        <button type="submit">Rezervisi</button>
        <p><a href="./rezervacija.php">Ovde</a> mozete videti rezervaciju</p>
    </form>


    <?php
    require './konekcija.php';
    
    
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $val = mysqli_query($conn, 'select 1 from rezervacije LIMIT 1');
        if($val !== FALSE) {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $mejl = $_POST['mejl'];
            $film = $_POST['film'];
            $termin = $_POST['termin'];
            $sediste = $_POST['sediste'];

            $sql = "INSERT INTO rezervacije(firstname, lastname, email, film, termin, sediste)
            VALUES ('$ime', '$prezime', '$mejl', '$film', '$termin', '$sediste')";

            if (mysqli_query($conn, $sql)) {
                echo "Dodat red u tabelu";
              } else {
                echo "Greska: " . $sql . "<br>" . mysqli_error($conn);
              }
        }
        else {
            require './kreiranjeTabele.php';
            echo '<br>' . "Tabela kreirana!";
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $mejl = $_POST['mejl'];
            $film = $_POST['film'];
            $termin = $_POST['termin'];
            $sediste = $_POST['sediste'];

            $sql = "INSERT INTO rezervacije(firstname, lastname, email, film, termin, sediste)
            VALUES ('$ime', '$prezime', '$mejl', '$film', '$termin', '$sediste')";

            if (mysqli_query($conn, $sql)) {
                echo "Dodat red u tabelu";
              } else {
                echo "Greska: " . $sql . "<br>" . mysqli_error($conn);
              }
            
        }

        
    }

    ?>

</body>

</html>