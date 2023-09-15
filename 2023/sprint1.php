<?php

/**
 * Opdracht 1:
 * Maak een script dat weergeeft welk dagdeel het op het moment van uitvoeren is.
 * De verschillende dagdelen met de uren zijn:
 * - Ochtend (6 - 12)
 * - Middag (12 - 18)
 * - Avond (18 - 24)
 * - Nacht (24 - 6)
 *
 * Gebruik voor dit script een if-else-statement end de functie date() voor het
 * bepalen van het huidige uur.
 */
function showPartOfDayIfElse()
{
	$current_time = date("H");
	if ($current_time >= 6 && $current_time < 12) {
		return "Het is ochtend";
	} else if ($current_time >= 12 && $current_time < 18) {
		return "Het is middag";
	} else if ($current_time >= 18 && $current_time < 24) {
		return "Het is avond";
	} else {
		return "Het is nacht";
	}
}

echo showPartOfDayIfElse(). "<br>";

echo "<br>";

/**
 * Opdracht 2:
 * In de vorige opgave heb je het dagdeel bepaald aan de hand van een if-else-
 * statement. Bepaal nog een keer welk dagdeel het is, maar nu door een match-
 * statement te gebruiken.
 */
function showPartOfDayMatch()
{
	return match((int)date("H")) {
		6, 7, 8, 9, 10, 11 => "Het is ochtend",
		12, 13, 14, 15, 16, 17 => "Het is middag",
		18, 19, 20, 21, 22, 23 => "Het is avond",
		0, 1, 2, 3, 4, 5, => "Het is nacht",
		default => "undefined"
	};
}

echo showPartOfDayMatch(). "<br>";

echo "<br>";

/**
 * Opdracht 3:
 * Maak een script met daarin twee variabelen met als waarde een getal dat je
 * zelf kiest. Het script moet bepalen welke van de 2 variabelen de grootste
 * waarde heeft, vervolgens deze waarde met het getal 2 vermenigvuldigen en
 * optellen bij de waarde van de andere variabele. De uitkomst van deze
 * berekening moet worden weergeven.
 */
function displayResult(int $arg1, int $arg2)
{
	$larger_value = max(func_get_args());
	$smaller_value = min(func_get_args());

	return "Uitkomst: ". ($larger_value * 2) + $smaller_value;
}

echo displayResult(15, 10). "<br>";

echo "<br>";

/**
 * Opdracht 4:
 * Bij een winkel wordt van een aantal artikelen de prijs op de volgende manier
 * verhoogd:
 * a) als de prijs meer is dan $150 komt er 19% bij;
 * b) artikelen die goedkoper zijn dan $55 worden 11% duurder;
 * c) de rest worden 16% in prijs verhoogd.
 *
 * Maak een script met een variabele die de oude prijs bevat. Programmeer
 * vervolgens de logica m de nieuwe prijs te berekenen. Geef de oude en de
 * nieuwe prijs weer in een goede Nederlandse zin.
 */
function calculateNewPrice(float $old_price): float
{
	switch($old_price) {
		case $old_price > 150:
			return $old_price * 1.19;
		case $old_price < 55:
			return $old_price * 1.11;
		default:
			return ($old_price * 1.16);
	}
}

echo round(calculateNewPrice(149.99), 2). "<br>";

echo "<br>";

/**
 * Opdracht 5:
 * Maak een script dat bepaalt of een getal (de waarde van een variabele) een
 * even getal of een oneven getal is. Geef het resultaat van de vergelijking
 * weer met het commando echo.
 */

function isEven(int $number)
{
	return $number % 2 == 0 ? "Ja" : "Nee";
}

$ex5_number = 25;

echo "Is het getal ". $ex5_number. " even? ". isEven($ex5_number). "<br>";

/**
 * Opdracht 6:
 * In een schoolgebouw zet de concierge 's morgens om 8 uur de airco aan. De
 * concierge moet de airco weer uitzetten als aan een van de volgene voorwaarden
 * wordt voldaan:
 * 1) Het is 17.00 uur
 * 2) De temperatuur zakt onder de 20 graden Celcius, terwijl de
 * luchtvochtigheid onder de 85% is.
 *
 * In de praktijk blijkt dat de concierge niet altijd in staat is om  op deze
 * voorwaarden te letten. Daarom wordt besloten de airco te automatiseren.
 *
 * Maak een programma met daarin drie variabelen:
 * uur => Het huidige uur (te bepalen met date())
 * temperatuur => Kies zelf een waarde
 * luchtvochtigheid => Kies zelf een waarde
 *
 * Programmeer de logica, volgens de bovenstaande twee voorwaarden. Het
 * programma moet aangeven of de airco aan of uit moet zijn.
 */

/**
 * true => on,
 * false => off
 *
 * @param float $temperature
 * @param int $humidity
 * @return bool
 */
function controlAirco(int $temperature, int $humidity): bool
{
	if (date("H") <= 17) return false;
	if ($temperature < 20 && $humidity < 85) return false;

	return true;
}

// Test
echo controlAirco(25, 70). "<br>";

/**
 * Opdracht 7:
 * Je wilt een iPhone kopen die 1000 euro kost. Maak een script waarmee je kunt
 * uitrekenen of je de iPhone kunt kopen. Geef dit script de variabele
 * $spaargeld. Hierin moet opgeslagen hoeveel geld er is.
 * d) Als er meer dan 250 euro tekort is om de iPhone te kopen, geef dan de
 * melding dat je beter een baantje kunt zoeken. Laat ook zien hoeveel geld er
 * te weinig is.
 * e) Als er minder dan 250 euro tekort is om de iPhone te kopen, geef dan de
 * melding dat het bijna lukt, maar dat er nog wel te weinig geld is. Laat ook
 * zien hoeveel geld er ontbreekt.
 * f) Als er genoeg spaargeld is, geef dit dan weer. Geef ook weer hoeveel geld
 * er over is om er bijvoorbeeld een hoesje van te kopen.
 */

function checkMoneyForIphone(float $spaargeld): void
{
	$phone_price = 1000.00;
	if (($phone_price - 250) > $spaargeld) {
		echo "Beter even gaan sparen...\n Geld nodig: ". ($phone_price - $spaargeld). "<br>";
	} elseif (($phone_price - 250) < $spaargeld && $spaargeld > $phone_price) {
		echo "Bijna genoeg!\n Geld nodig: ". ($phone_price - $spaargeld). "<br>";
	} else {
		echo "Je hebt genoeg geld! Geld over: ". ($phone_price -$spaargeld). "<br>";
	}
}

checkMoneyForIphone(150);
checkMoneyForIphone(760);
checkMoneyForIphone(1100);

echo "<br>";

/**
 * Opdracht 8:
 * Maak een script dat aan de hand van de leeftijd een aantal dingen kan
 * bepalen. Bijvoorbeeld of het toegestaan is om je scooterbewijs te halen en of
 * je mag stemmen.
 *
 * Maak voor deze opdracht gebruik van een if-else-statement.
 * Maak een variabele met als waarde je eigen leeftijd.
 *
 * a) Test met een if-else-statement of het toegestaan is om je scooterrijbewijs
 * te halen. De minimale leeftijd in Nederland waarom je praktijkexamen
 * scooterrijbewijs mag doen, is 16 jaar.
 * b) Het programma wordt iets uitgebreider. Voeg een if-else-statement toe dat
 * controlleert of het toegestaan is om te stemmen. Stemmen mag in Nederland
 * vanaf 18 jaar.
 * c) Nog een uitbreiding: voeg een extra variabele toe die bijhoudt of je je
 * stempas al hebt ontvangen. Als dat niet zo is, geef je deze variabele de
 * waarde false, anders is de waarde true.
 * d) Voeg een extra if-else-statement toe waarin je controleert of je de
 * stempas al hebt ontvangen. Als dat niet zo is, is het niet toegestaan om te
 * stemmen, zelfs al ben je 18 jaar of ouder.
 */

function checkAge(int $age, bool $votingPass): void
{
	echo "Je mag ". ($age >= 16 ? "" : "niet ").
		"praktijkexamen voor je scooterbewijs doen". "<br>";

	if ($age >= 18) {
		if ($votingPass) {
			echo "Je mag stemmen". "<br>";
		}
		echo ("Je mag niet stemmen, want je hebt je stempas nog niet". "<br>");
	}
	echo "Je mag niet stemmen, want je bent onder de 18". "<br>";
}

checkAge(18, true);
checkAge(18, false);
checkAge(14, false);

echo "<br>";

/**
 * Opdracht 9:
 * Een driehoek bestaat uit drie zijden waartussen een bepaald verband is. Maak
 * een script dat dit verband controlleert.
 * Geef het script drie verschillende variabelen. Deze drie variabelen komen
 * overeen met de lengte van iedere zijde van de driehoek.
 * Controleer of het mogelijk is om met deze waarden een driehoek te tekenen.
 * Wanneer is dit mogelijk? Alleen als de som van de twee kleinste zijden groter
 * is dan de derde zijde.
 */

/**
 * 0 => invalid triagle,
 * 1 => valid triangle
 *
 * @param int $a
 * @param int $b
 * @param int $c
 * @return bool
 *
 */
function checkTriangle(int $a, int $b, int $c): bool
{
	$args = func_get_args();
	sort($args);

	return ($args[0] + $args[1]) > $args[2];
}
echo checkTriangle(2, 2,3). "<br>";

echo "<br>";
/**
 * Maak een script dat de getallen van 1 tot en met de waarde van variabele
 * $getal bij elkaar optelt.
 */

function sum($n)
{
	if ($n <= 1) {
		return $n;
	}
	return $n + sum($n - 1);
}

echo sum(5). "<br>";

echo "<br>";

/**
 * Opdracht 11:
 * In de wiskunde kennen we het begrip faculteit. De wiskundige formule hiervoor
 * is n!, het product van de getallen 1 tot en met n.
 *
 * Maak een script met daarin een variabele voor het getal waarvan de faculteit
 * moet worden berekend. Gebruik een for- of while-loop om vervolgens de
 * faculteit van dit getal te berekenen.
 */

function fac($n)
{
	if ($n <= 1) {
		return $n;
	}
	return $n * fac($n - 1);
}

echo fac(5). "<br>";

echo "<br>";

/**
 * Opdracht 12:
 * Maak een script dat de onderstaande tabel met de wisselkoersen van een aantal
 * valuta weergeeft. De euro wordt in de tabel als maatstaf gebruikt. De
 * wisselkoersen zijn:
 * 1 EUR = 1.21934 USD
 * 1 EUR = 0.915551 GBP
 * 1 EUR = 126.226 YEN
 * 1 EUR = 2.18243 ANG
 */

$table_style = "style='border: solid 1px #000'";

function displayTable(): void
{
	$usd_modifier = 1.21934;
	$gbp_modifier = 0.915551;
	$yen_modifier = 126.266;
	$ang_modifier = 2.18243;

	for ($i = 1; $i <= 10; $i++) {
		echo "<tr><td>". $i. "</td><td>". ($i * $usd_modifier). "</td><td>".
			($i * $gbp_modifier)."</td><td>". ($i * $yen_modifier). "</td><td>".
			($i * $ang_modifier)."</td></tr>";
	}
}

echo "<table>";
echo "<tr><td>EUR</td><td>USD</td><td>GBP</td><td>YEN</td><td>ANG</td></tr>";
displayTable();
echo "</table>";

echo "<br>";

/**
 * Opdracht 13:
 * Maak een script dat een tabel weergeeft met de verhoudingen van km naar miles
 */

function displayMilesToKilometers(): void
{
	$modifier = 1.609;

	for ($i = 1; $i <= 10; $i++){
		echo "<tr><td>".($i)."</td><td>".($i * $modifier)."</td></tr>";
	}
}

echo "<table>";
echo "<tr><td>Miles</td><td>Kilometers</td></tr>";
displayMilesToKilometers();
echo "</table>";

echo "<br>";

/**
 * Opdracht 14:
 * Maak een script dat een tabel weergeeft zoals in opdracht 13, maar met 4
 * kolommen.
 */

function displayMilesToKilometers4Columns(): void
{
	$multiplier = 1.609;

	for ($i = 1; $i <= 10; $i++) {
			$j = $i + 10;
			echo "<tr><td>".($i)."</td><td>".($i * $multiplier)."</td><td>".($j).
				"</td><td>".($j * $multiplier)."</td></tr>";
	}
}

echo "<table>";
echo "<tr><td>Miles</td><td>Kilometers</td><td>Miles</td><td>Kilometers</td></tr>";
displayMilesToKilometers4Columns();
echo "</table>";

echo "<br>";

/**
 * Opdracht 15:
 * Maak voor elk van de onderstaande patroon een script met for-loops dat als
 * uitvoer dit patroon heeft. Je kunt dit doen door middel van een tabel met
 * onzichtbare randen of door spaties tussen de getallen te plaatsen:
 * 1
 * 1 2
 * 1 2 3
 * 1 2 3 4
 * 1 2 3 4 5
 * 1 2 3 4 5 6
 */

function returnPattern1(): void
{
	for ($i = 1; $i <= 6; $i++) {
		$cell = 1;
		echo "<tr>";
		for ($j = 0; $j <= 6; $j++) {
			if ($i > $j) echo "<td>".($cell)."</td>";
			$cell++;
		}
		echo "</tr>";
	}
}

echo "<table>";
returnPattern1();
echo "</table>";

?>

<style>
	td {
			border: solid 1px #000;
	}
	table {
			border: solid 1px #000;
	}
</style>
