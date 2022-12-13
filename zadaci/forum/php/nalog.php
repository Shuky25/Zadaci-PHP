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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../layout/style.css">
    <title>Vas nalog</title>
</head>

<body>



    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="col-md-6">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Pocetna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./register.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./tema.php">Teme</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../../index.php">Pocetak</a>
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

    <section id="nalog">
        <h1>Dobro dosli u podesavanja za nalog</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="slika">
                        <img src="../img/<?php echo $_SESSION['slika']; ?>" alt="slika" id="slika" class="img-fluid">
                        <div class="middle">
                            <form action="novaSlika.php" method="post" enctype="multipart/form-data">
                                <input type="file" class="fa fa-pencil" name="fajl" id="fajl"/>
                                <input type="submit" name="submit" value="Sacuvaj">
                            </form>
                            <!-- <a class="fa fa-pencil" href="./promeniSliku.php"></a> -->
                        </div>
                        <!-- <div id="slika">dwads</div> -->
                    </div>
                    <?php echo '<p class="ime">' . $_SESSION["ime"] . ' ' . $_SESSION['prezime']; ?>
                </div>
                <div class="col-md-6">
                    <a class="fa fa-sign-out" href="./logout.php" style="width: 5%;"></a>
                </div>
            </div>
            <hr>
            <div class="row">

            </div>
        </div>
    </section>

    <?php include "./components/footer.php"; ?>
</body>

</html>