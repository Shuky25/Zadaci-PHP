<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Multiple forme</title>
</head>

<body>
	<form action="formaSesija2.php" method="POST">
		<select name="proizvod[]" id="proizvod" multiple>
			<option value="jordanke">Jordanke 1</option>
			<option value="nike">Nike 30</option>
			<option value="puma">Puma gas</option>
			<option value="bmw">BMW F10</option>
			<option value="bmw2">BMW F11</option>
			<option value="rakija">Rakija sljiva</option>
			<option value="medovaca">Medovaca</option>
			<option value="visnjevaca">Visnjevaca</option>
			<option value="kruskovac">Kruskovac</option>
			<option value="kafa">Kafa 3 u 1</option>
			<option value="pivo">Pivo Tuborg</option>
		</select>
		<button type="submit">Potvrdi</button>
	</form>
	<?php
	$_SESSION['products'] = serialize(array($_POST["proizvod"]));
	?>
</body>

</html>