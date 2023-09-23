<?php

/**
 * Deze opdracht is om te oefenen met stringfuncties.
 *
 * Maak een script met daarin een tekstvak, vier radiobuttons en een
 * verzendknop. De gebruiker voert in het tekstvak tekst in en selecteert de
 * uitvoermethode door middel van een van de vier radiobuttons.
 *
 * Als er op de verzendknop wordt geklikt, verschijnt de tekst uit het tekstvak
 * op de manier die is geselecteerd door de gebruiker.
 */

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>opdracht 9</title>
</head>
<body>
<form method="post">
	<label for="string-input">Tekst: </label>
	<input type="text" name="string-input" id="string-input">
	<br>
	<input type="radio" name="formatting" value="uppercase" checked>
	<label for="uppercase-radio">HOOFDLETTERS</label>
	<br>
	<input type="radio" name="formatting" value="lowercase">
	<label for="lowercase-radio">kleine letters</label>
	<br>
	<input type="radio" name="formatting" value="first-of-sentence">
	<label for="first-of-sentence-radio">Eerste letter van de zin een hoofdletter</label>
	<br>
	<input type="radio" name="formatting" value="first-of-word">
	<label for="first-of-word-radio">Eerste Letter Van Elk Woord Een Hoofdletter</label>
	<br>
	<button type="submit">Formatteren</button>
</form>
<br>
<?php

if (isset($_POST["string-input"]) && $_POST["string-input"] != null) {
	echo match ($_POST["formatting"]) {
		"uppercase" => strtoupper($_POST["string-input"]),
		"lowercase" => strtolower($_POST["string-input"]),
		"first-of-sentence" => ucfirst($_POST["string-input"]),
		"first-of-word" => ucwords($_POST["string-input"]),
		default => "?"
	};
}

?>
</body>
</html>
