<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['ime'])) {
    $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['mejl'] = $_SESSION['sifra'] = $_SESSION['slika'] = "";
} else {
    $email = $psw = $ime = $prezime = "";
}

function izlogujSe()
{
    $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['slika'] = "";
    session_destroy();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a style="color: #fff" href="./php/nalog.php"><?php echo $_SESSION['ime'] . " " . $_SESSION['prezime']; ?></a>
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
                            echo  '<a href="./php/diskusija.php?id=' . $row['id'] . '"><h2>' . $row['naziv_teme'] . '</h2></a>';
                            echo '<hr style="width: 90%; margin: 10px auto 30px auto;">';
                            echo   '<p> ' . $row['opis_teme'] . ' </p>';
                            echo   '<p> <b>Auror:</b> ' . $row['email'] . ' <b>Datum objave: </b>' . $row['datum_kreiranja'] . ' </p>';
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

    <!-- <footer>
        <p id="footerText"></p>
        <div class="container">
            <div class="row">
                <div id="formaMejl" class="col-md-6">
                    <h2>Posalji mejl</h2>
                    <hr>
                    <form action="./php/mejl.php" method="post">
                        <div class="form-control">
                            <label for="mejl">Vas mejl: </label><br>
                            <input type="email" name="formaMejl" placeholder="Unesi mejl">
                        </div>
                        <div class="form-control">
                            <label for="poruka">Vasa poruka: </label><br>
                            <textarea name="formaPoruka" id="poruka" cols="30" rows="10" placeholder="Unesi poruku"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Posalji mejl</button>
                    </form>
                </div>
                <div id="socialMedia" class="col-md-6">
                    <h2>Zaprati nas</h2>
                    <hr>
                    <ul id="socialMediaList">
                        <li>
                            <a href="#" class="fa fa-facebook"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-instagram"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-youtube"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> -->

    <?php include "./php/components/footer.php"; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>