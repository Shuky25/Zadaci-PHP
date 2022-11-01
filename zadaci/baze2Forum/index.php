<!DOCTYPE html>
<?php
$mejlErr = $pswErr = $imeErr = $prezErr = $prijavaErr = "";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="layout/style.css">
    <title>Forum</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Pocetna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">O nama</a>
                        </li>
                    </ul>
                    <button id="reg" onclick="document.getElementById('id02').style.display='block'">Registruj se</button>
                    <button id="log" onclick="document.getElementById('id01').style.display='block'">Prijavi se</button>
                </div>
            </div>
        </nav>
    </header>

    <!-- modul 1 -->
    <div id="id01" class="modal">

        <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <h2>Login</h2>
            </div>

            <div class="container">
                <label for="email"><b>E mail:</b></label>
                <input type="email" placeholder="Unesi email" name="email" required>

                <label for="psw"><b>Password: </b></label>
                <input type="password" placeholder="Unesi sifru" name="password" required>

                <input id="prijava" type="submit" name="prijava" value="Prijavi se" />Prijavi se
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
            <?php echo $prijavaErr; ?>
        </form>
    </div>

    <!-- modul 2 -->
    <div id="id02" class="modal">

        <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <h2>Register</h2>
            </div>

            <div class="container">
                <label for="email"><b>E mail:</b></label>
                <input type="email" placeholder="Unesi email" name="email" required><?php echo $mejlErr; ?>

                <label for="psw"><b>Password: </b></label>
                <input type="password" placeholder="Unesi sifru" name="password" required> <?php echo $pswErr; ?>

                <label for="psw"><b>Ponovi password: </b></label>
                <input type="password" placeholder="Ponovi sifru" name="password1" required> <?php echo $pswErr; ?>

                <label for="psw"><b>Ime: </b></label>
                <input type="text" placeholder="Unesi ime" name="ime" require> <?php echo $imeErr; ?>

                <label for="psw"><b>Prezime: </b></label>
                <input type="text" placeholder="Unesi prezime" name="prezime" require> <?php echo $prezErr; ?>

                <input id="prijava" type="submit" value="Registruj se" name="registracija" />
                <button id="log" onclick="PrijaviSe()">Prijavi se</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

            </div>
        </form>
    </div>

    <?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        /* registracija */
        if(isset($_POST['registracija'])) {
            
            /* unos u polja */
            if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password1']) && !empty($_POST['ime']) && !empty($_POST['prezime'])) {
                
                $email = $_POST['email'];
                $psw = $_POST['password'];
                $password1 = $_POST['password1'];
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];

                if($psw != $password1) {
                    $pswErr = "Sifre se ne podudaraju";
                }
                else {
                    require './baza/konekcija.php';
                    $sql = "INSERT INTO korisnik(email, password, ime, prezime) VALUES('$email', '$psw', '$ime', '$prezime')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Polje uneseno u bazu";
                    }else {
                        echo 'Greska pri unosu';
                    }
                }
            }
        }
    }
    
    ?>


    <script src="./script/script.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>