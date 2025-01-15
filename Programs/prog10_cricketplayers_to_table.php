<?php

$arr = array("Sachin", "Kohli", "Rohit", "Jadeja", "Samson", "Sundar");
echo "<center>";
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><th>Indian Cricket Players</th></tr>";

foreach ($arr as $player) {
	echo "<tr><td>$player</td></tr>";
}
echo "</table>";
?>