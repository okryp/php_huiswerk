// Echo with dates to doc
<?php

echo "<pre>";

echo "Het is vandaag ". date("l d F Y"). "\n";
echo "Vandaag is het de ". date("z"). "e dag van het jaar.\n";
echo date("l"). "is de ". date("w"). "e dag van de week.\n";
echo "De maand ". date("F"). " heeft in totaal ". date("t"). " dagen\n";
echo "Het jaar ". date("Y"). " is ". (date("L") ? "een" : "geen"). " schrikkeljaar\n";

echo "</pre>";
