<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['ime'])) {
    $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['mejl'] = $_SESSION['sifra'] = "";
} else {
    $email = $psw = $ime = $prezime = "";
}

function izlogujSe()
{
    $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = "";
    session_destroy();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="./layout/style.css">

    <title>Forum aplikaija</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="col-md-6">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Pocetna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./php/register.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./php/login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./php/tema.php">Teme</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../index.php">Pocetak</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <a style="color: #fff" href="./php/logout.php"><?php echo $_SESSION['ime'] . " " . $_SESSION['prezime']; ?></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section id="tema">
        <div class="container">
            <h1>Pocetna</h1>
            <hr>
            <div class="row">
                <?php
                require './php/konekcija.php';
                $i = 0;
                $sql = "SELECT * FROM teme";
                $res = mysqli_query($conn, $sql);
                if(mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        if($i < 3) {
                            echo '<div style="border: 2px solid #d3d3d3; border-radius: 10px; margin: 20px; padding: 20px;">';
                            echo  '<a href="#"><h2>' . $row['naziv_teme'] . '</h2></a>';
                            echo '<hr style="width: 90%; margin: 10px auto 30px auto;">';
                            echo   '<p> ' . $row['opis_teme'] . ' </p>';
                            echo    '</div>';
                        }
                    }
                } else {
                    echo '<p>Nema tema za prikaz!</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>