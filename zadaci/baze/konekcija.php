<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bioskop_c";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Greska: " . mysqli_connect_error());
}
echo "Uspesno konektovano!";

?>