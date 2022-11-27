<!DOCTYPE html>
<?php
session_start();
if(empty($_SESSION['ime'])) {
    $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['mejl'] = $_SESSION['sifra'] = $_SESSION['slika'] = "";
}
else {
    $email = $psw = $ime = $prezime = "";
}
$stanje = "";
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
    <title>Registracija</title>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['email']) || empty($_POST['psw']) || empty($_POST['psw2']) || empty($_POST['ime']) || empty($_POST['prezime'])) {
            $stanje = "Sva polja su obavezna!";
        } else {

            $email = $_POST['email'];
            $psw = $_POST['psw'];
            $psw2 = $_POST['psw2'];
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];

            if ($psw !== $psw2) {
                $stanje = "Sifre se ne podudaraju!";
            } else {
                if ($_SESSION['ime'] != "" || !empty($_SESSION['ime'])) {
                    $stanje = "Vec ste ulogovani!";
                } else {
                    $_SESSION['slika'] = "user.png";
                    $_SESSION['ime'] = $ime;
                    $_SESSION['prezime'] = $prezime;
                    $stanje = "Dobrodosli, " . $_SESSION['ime'] . " " . $_SESSION['prezime'];

                    require 'konekcija.php';
                    $sql = "INSERT INTO korisnici(email, password, ime, prezime) VALUES('$email', '$psw', '$ime', '$prezime')";

                    if (mysqli_query($conn, $sql)) {
                        header("location: ../index.php");
                        exit();
                    } else {
                        echo "<script>alert('Registracija nije uspela!')";
                        header("location: ./register.php");
                        exit();
                    }
                }

            }

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
                            
                            <a style="color: #fff" href="./nalog.php"><?php echo '<img src="../img/' . $_SESSION['slika'] . '" alt="" style="width: 50px; margin: 0 20px;" />' . $_SESSION['ime'] . " " . $_SESSION['prezime']; ?></a>
                        
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section id="forma" data-aos="fade-up">
        <div class="container">
            <h1>Register</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-control">
                    <label for="email">Email:</label><br>
                    <input type="text" placeholder="Unesite mejl" name="email"><br>
                </div>
                <div class="form-control">
                    <label for="email">Sifra:</label><br>
                    <input type="text" placeholder="Unesite sifru" name="psw"><br>
                </div>
                <div class="form-control">
                    <label for="email">Ponovljena sifra:</label><br>
                    <input type="text" placeholder="Ponovite sifru" name="psw2"><br>
                </div>
                <div class="form-control">
                    <label for="email">Ime:</label><br>
                    <input type="text" placeholder="Unesite ime" name="ime"><br>
                </div>
                <div class="form-control">
                    <label for="email">Prezime:</label><br>
                    <input type="text" placeholder="Unesite prezime" name="prezime"><br>
                </div>
                <button type="submit" class="btn btn-primary">Registruj se</button>
                <?php echo $stanje; ?>
            </form>
        </div>
    </section>



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