<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        table tr:nth-child(even){background-color: #d3d3d3;}

        table tr td {
            padding: 20px;
            border: 1px solid black;
        }

        
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="red">Broj redova</label>
        <input type="text" placeholder="Unesi broj redova" name="red"><br>
        <label for="kolona">Broj kolona</label>
        <input type="text" placeholder="Unesi broj kolona" name="kolona"><br>
        <input type="submit" value="Potvrdi">
    </form>

    <?php

    $n = $m = 0;
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["red"])) {
            $n = test_input($_POST["red"]);
        } else {
            $n = 0;
        }
        if (!empty($_POST["kolona"])) {
            $m = test_input($_POST["kolona"]);
        } else {
            $m = 0;
        }

        echo "<table>";
        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $m; $j++) {
                echo "<td>";
                echo "gyfyf";
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }




    ?>
</body>

</html>