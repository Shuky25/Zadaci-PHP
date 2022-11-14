<?php
session_start();
$_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['email'] = $_SESSION['sifra'] = "ddda";
session_destroy();
header('location: ../index.php');
echo "<script>alert('Uspesno izlogovani!');</script>";
?>