<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Rezervacija</title>
    <style>
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Iscitavanje rezervisanih sedista</h1>
    <div class="container">
    <?php
        function ispis() {
            require "./konekcija.php";
            $sql = "SELECT * FROM rezervacije";
        $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)) {
        echo "<div class='row m-auto w-50'>";
            echo "<p><b>ID:</b> " . $row['id'] . "</p><br>";
            echo "<p><b>Ime:</b> " . $row['firstname'] . "</p><br>";
            echo "<p><b>Prezime:</b> " . $row['lastname'] . "</p><br>";
            echo "<p><b>Mejl:</b> " . $row['email'] . "</p><br>";
            echo "<p><b>Film:</b> " . $row['film'] . "</p><br>";
            echo "<p><b>Sediste:</b> " . $row['sediste'] . "</p><br>";
            echo "<p><b>Termin:</b> " . $row['termin'] . "</p><br>";
        echo "</div><hr><br>";
    }
        }
        $html = ispis();
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            require "./konekcija.php";
            $id = $_POST['id'];
            $sql = "DELETE FROM rezervacije WHERE id='$id'";
            mysqli_query($conn, $sql);
            $html = ispis();
        }
        echo $html;
    ?>
    </div>
    <h2 style="text-align: center;"><b>JE L' MOZE 5?</b></h2>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" placeholder="Unesi id koji brisete" name="id">
        <button type="submit">Obrisi</button>
    </form>
</body>
</html>