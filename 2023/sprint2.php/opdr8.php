<?php

/**
 * Deze opdracht is om te oefenen met een variabele van het type array.
 *
 * Door middel van een formulier is het mogelijk om fruitsoorten aan een
 * sessievariabele toe te voegen. Onder het formulier wordt de inhoud van de
 * sessievariabele weergeven.
 */

session_start();

if (!isset($_SESSION["fruits"])) {
	$_SESSION["fruits"] = [];
}

if (isset($_POST["fruit-type"]) && $_POST["fruit-type"] != null) {
	array_push($_SESSION["fruits"], $_POST["fruit-type"]);
}

if (isset($_POST["sort"])) {
	sort($_SESSION["fruits"], SORT_STRING);
}

if (isset($_POST["shuffle"]))
	shuffle($_SESSION["fruits"]);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>opdracht 8</title>
</head>
<body>
	<form method="post">
		<label for="fruit-type">Fruitsoort:</label>
		<input type="text" name="fruit-type" id="fruit-type">
		<br><br>
		<button type="submit" name="add">Toevoegen</button>
		<br><br>
		------------------
		<br>
		<button type="submit" name="sort">Sorteren</button>
		<button type="submit" name="shuffle">'Schudden'</button>
		<br>
		------------------
		<br><br>

		Inhoud van de array:<br>
		<ul>
			<?php
				foreach($_SESSION["fruits"] as $fruit) {
					echo "<li>". $fruit. "</li>";
				}
			?>
		</ul>
	</form>
</body>
</html>
