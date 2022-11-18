<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum_c";

// Kreiranje konekcije
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Provera
if (!$conn) {
  die("Greska: " . mysqli_connect_error());
}
//echo "Usesno konektovano";
?> 