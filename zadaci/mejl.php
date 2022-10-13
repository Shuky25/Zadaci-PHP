<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Slanje mejla</title>
</head>

<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		
		<div class="form-control">
			<label for="subject">Naslov: </label>
			<input type="text" placeholder="Unesite naslov" name="naslov">
		</div>
		<div class="form-control">
			<label for="text">Text: </label>
			<textarea name="text" id="text" cols="30" rows="10" placeholder="Unesi tekst"></textarea>
		</div>
		<button type="submit">Posalji</button>
	</form>
</body>

</html>

<?php
$to_email = $subject = $body = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$to_email = "vojinsundovic@gmail.com";
	$subject = $_POST['naslov'];
	$body = $_POST['text'];
	 
	if(mail($to_email, $subject, $body)){
		echo "Mejl je uspesno poslat na " . $to_email;
	}
	else {
		echo "Greska u slanju mejla!";
	}
}
?>