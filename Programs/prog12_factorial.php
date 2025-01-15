<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h1>Factorial Calculator</h1>
    <form method="post" action="">
        <label for="number">Enter a non-negative integer:</label>
        <input type="number" id="number" name="number" min="0" required>
        <input type="submit" value="Calculate Factorial">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = intval($_POST['number']);
        function factorial($n)
        {
            if ($n < 0)
            {
                return "Factorial is not defined for negative numbers.";
            } 
            elseif ($n === 0) 
            {
                return 1; // Base case: 0! = 1
            } 
            else 
            {
                $result = 1;
                for ($i = 1; $i <= $n; $i++) 
                {
                    $result *= $i; // Multiply result by the current number
                }
                return $result;
            }
        }
        $result = factorial($number);
        echo "<h2>Factorial of $number is: $result</h2>";
    }
    ?>
</body>

</html>