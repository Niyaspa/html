<?php

$students = ["Manuel", "Lanzini", "Alphonso", "Davies", "Bobby"];
echo "<h2>Original array:</h2><br>";
print_r($students);
echo "<br><br>";
asort($students);
echo "<h2>Array sorted with asort():</h2><br>";
print_r($students);  // After asort()
echo "<br><br>";
arsort($students);
echo "<h2>Array sorted with arsort():</h2><br>";
print_r($students);  // After arsort()

?>
