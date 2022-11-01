<?php
require './konekcija.php';

$sql = "CREATE TABLE rezervacije (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    film VARCHAR(50) NOT NULL,
    termin VARCHAR(50) NOT NULL,
    sediste VARCHAR(5) NOT NULL
    )";
    
    if (mysqli_query($conn, $sql)) {
      echo "Tabela rezervacije kreirana";
    } else {
      echo "Greska u kreiranju tabele: " . mysqli_error($conn);
    }
?>