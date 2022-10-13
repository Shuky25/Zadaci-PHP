<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload fajlova</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="file" name="fajl">
        <input type="submit" value="Okaci" name="submit">
    </form>
</body>

</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $target_folder = 'uploads/' . basename($_FILES['fajl']['name']);
    $file_type = explode('.', $_FILES['fajl']);
    if($file_type != 'pdf' || $file_type != 'doc' || $file_type != 'docx' || $file_type != 'txt') {
        echo 'Problem pri uploadovanju fajla';
    }
    else {
        if(move_uploaded_file($_FILES['fajl']['tmp_name'], $target_folder)) {
            echo 'Fajl' . basename($_FILES['fajl']['name']) . ' je uploadovan.';
        }
        else {
            echo 'Problem pri uploadovanju fajla!';
        }
    }
}
?>