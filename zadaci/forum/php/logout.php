<?php
session_start();
$_SESSION['ime'] = $_SESSION['prezime'] = $_SESSION['email'] = $_SESSION['sifra'] = "ddda";
session_destroy();
echo "<script>alert('Uspesno izlogovani!');</script>";
header('refresh:0;url=../index.php');
//header('location: ../index.php');
exit();
?>