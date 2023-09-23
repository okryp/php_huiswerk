<?php

/**
 * In deze opdracht maak je een script dat het gemiddelde van een reeks
 * ingevoerde cijfers uitrekent. Om deze reeks van cijfers op te slaan, heb je
 * een sessievariabele nodig met als waarde een array
 */

session_start();

if (!isset($_SESSION["numbers"])) {
	$_SESSION["numbers"] = [];
}

if (isset($_POST["number-input"]) && $_POST["number-input"] != null) {
    array_push($_SESSION["numbers"], $_POST["number-input"]);
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>opdracht 6</title>
</head>
<body>
	<form method="post">
		<label for="number-input">Cijfer:</label>
		<input type="number" name="number-input" id="number-input"><br><br>
		<button type="submit">Toevoegen</button>
	</form>
	<br><br>
	<?php

	echo "Aantal ingevoerde cijfers: ". sizeof($_SESSION["numbers"]). "<br>";
	echo "Gemiddelde: ". (array_sum($_SESSION["numbers"]) / (max(sizeof($_SESSION["numbers"]), 1))). "<br>";
	?>
</body>
</html>
