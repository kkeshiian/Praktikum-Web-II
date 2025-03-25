<?php
$inputCelcius =  37.841;

echo "Fahrenheit (F) = ". number_format(((($inputCelcius * 9) / 5) + 32), 4) . "<br>";
echo "Reamur (R) = ". number_format(($inputCelcius * 4) / 5, 4) . "<br>";
echo "Kelvin (K) = ". number_format($inputCelcius + 273.15, 4);
?>