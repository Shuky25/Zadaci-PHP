<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['ime'])) {
    $komentar = $komentarErr = $stanje = $email = $psw = $ime = $prezime = $_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['mejl'] = $_SESSION['sifra'] = "";
} else {
    $komentar = $komentarErr = $stanje = $email = $psw = $ime = $prezime = "";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../layout/style.css">
    <title>Diskusija</title>
</head>

<body>

    <?php
    if (!empty($_GET['id'])) {

        $_SESSION['idT'] = $_GET['id'];
        $id_teme = $_SESSION['idT'];
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $komentar = "";
        if ($_SESSION['ime'] != "" || !empty($_SESSION['ime'])) {
            if (!empty($_POST['komentar']) || $komentar != "") {
                require './konekcija.php';
                $komentar = $_POST['komentar'];
                $id_teme = $_SESSION['idT'];
                $autor = $_SESSION['ime'] . " " . $_SESSION['prezime'];
                $sql = "INSERT INTO komentari(id_teme, tekst, autor) VALUES('$id_teme', '$komentar', '$autor')";
                if (mysqli_query($conn, $sql)) {
                    echo 'Komentar je dodat';
                    header("location: ../index.php");
                    exit();
                } else {
                    echo 'Komentar nije dodat';
                    header("location: ../index.php");
                    exit();
                }
            } else {
                $komentarErr = "Morate napisati komentar";
            }
        } else {
            echo '<script>alert("Morate biti ulogovani!");</script>';
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

    <section id="tema">
        <div class="container">
            <?php
            require './konekcija.php';
            $id_teme = $_SESSION['idT'];
            $sql = "SELECT * FROM teme WHERE id = '$id_teme' LIMIT 1";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<h2>' . $row['naziv_teme'] . '</h2>
                    <hr>
                    <p> ' . $row['opis_teme'] . ' </p>
                    <hr>
                    <div id="komentar-blok" >
                        <form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                            <input name="komentar" id="komentar" style="padding: 10px 20px; width: 90%; display: block; margin: auto;" type="text" placeholder="Unesi komentar" />
                            <button type="submit" style="padding: 5px 10px; display: block; margin: 10px auto;">Posalji</button>
                            ' . $komentarErr . '
                        </form>
                    </div>
                ';
                    $sql1 = "SELECT * FROM komentari WHERE id_teme = '$id_teme'";
                    $res1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($res1) > 0) {
                        echo '<h3 style="text-align: center;">Komentari</h3>';
                        while ($row1 = mysqli_fetch_assoc($res1)) {
                            echo '<hr style="margin: 50px auto; width: 70%">';
                            echo '<div class="row">';
                            echo '<p><b>Autor:</b> ' . $row1['autor'] . "</p>";
                            echo '<p><b>-</b> ' . $row1['tekst'] . "</p>";
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Nema komentara</p>';
                    }
                }
            } else {
                echo "<h1>Nema teme</h1>";
            }
            ?>
        </div>

    </section>

    <?php include "./components/footer.php"; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>