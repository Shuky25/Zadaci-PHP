<?php
session_start();

$image_file = $_FILES["fajl"];

if (!isset($image_file)) {
    die('No file uploaded.');
}

if (filesize($image_file["tmp_name"]) <= 0) {
    die('Uploaded file has no contents.');
}

$image_type = exif_imagetype($image_file["tmp_name"]);
if (!$image_type) {
    die('Uploaded file is not an image.');
}

$image_extension = image_type_to_extension($image_type, true);

$image_name = bin2hex(random_bytes(16)) . $image_extension;

if(move_uploaded_file($image_file["tmp_name"], "../img/" . $_SESSION["ime"] . $image_extension)) {
    echo "Uploadovano";

    require "konekcija.php";
    $sql = "UPDATE korisnici SET slika='" . $_SESSION["ime"] . $image_extension . "' WHERE email='" . $_SESSION["mejl"]."'";
    if(mysqli_query($conn, $sql)) {
        echo "ok";
    }
    else {
        echo "nije ok";
    }

    echo "<script>alert('Uspesno uploadovana slika!');</script>";
    header('refresh:0;url=../index.php');
    exit();
}
else {
    echo "Nije oke3j";
}
?>