<?php
echo "<center>";
function fibonacci($terms)
{
	$sequence = [0, 1];
	for ($i = 2; $i < $terms; $i++) {
		$sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
	}
	return $sequence;
}

$terms = $_GET["range"];

$fibonacci_series = fibonacci($terms);

echo "Fibonacci series up to $terms terms:<br>";
foreach ($fibonacci_series as $value) {
	echo $value . "<br>";
}
echo "<a href='fibb.html'>Back to home</a>";
?>