<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['ime'])) {
    $stanje = $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['mejl'] = $_SESSION['sifra'] = "";
} else {
    $stanje = $email = $psw = $ime = $prezime = "";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../layout/style.css">
    <title>Login</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (empty($_SESSION['ime']) || $_SESSION['ime'] == "") {
            require "./konekcija.php";
            $email = $_POST['email'];
            $psw = $_POST['psw'];

            $sql = "SELECT * FROM korisnici WHERE email = '$email' LIMIT 1";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {

                    if ($psw == $row['password']) {
                        $_SESSION['ime'] = $row['ime'];
                        $_SESSION['prezime'] = $row['prezime'];
                        $_SESSION['mejl'] = $row['email'];
                        $_SESSION['psw'] = $row['password'];
                        $_SESSION['slika'] = $row['slika'];
                        //header("location: ../index.php");
                        echo "<script>alert('Uspesno ste se ulogovali!');</script>";
                        header('refresh:0;url=../index.php');
                        exit();
                    } else {
                        $stanje = "Sifre se ne podudaraju";
                    }
                }
            }
        } else {
            $stanje = "Vec ste ulogovani!";
        }
    }
    ?>
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
                        <a style="color: #fff" href="./nalog.php"><?php echo $_SESSION['ime'] . " " . $_SESSION['prezime']; ?></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section id="forma" data-aos="fade-up">
        <div class="container">
            <h1>Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-control">
                    <label for="email">Email:</label><br>
                    <input type="text" placeholder="Unesite mejl" name="email"><br>
                </div>
                <div class="form-control">
                    <label for="email">Sifra:</label><br>
                    <input type="password" placeholder="Unesite sifru" name="psw"><br>
                </div>
                <button type="submit" class="btn btn-primary">Loguj se</button>
                <?php echo $stanje; ?>
            </form>
        </div>
    </section>

    <?php include "./components/footer.php"; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>