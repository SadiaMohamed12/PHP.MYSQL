```php
<?php

// ==========================================
// Q1: One-Dimensional Array
// ==========================================

// 1. Declare and initialize the array
$numbers = array(5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);


// 2. Print all elements of the array
echo "<h3>1. All Elements</h3>";

foreach ($numbers as $number) {
    echo $number . " ";
}


// 3. Calculate total of all elements
$total = 0;

foreach ($numbers as $number) {
    $total += $number;
}

echo "<h3>2. Total of All Elements</h3>";
echo $total;


// 4. Calculate total of even elements
$evenTotal = 0;

foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $evenTotal += $number;
    }
}

echo "<h3>3. Total of Even Elements</h3>";
echo $evenTotal;


// 5. Calculate total of odd elements
$oddTotal = 0;

foreach ($numbers as $number) {
    if ($number % 2 != 0) {
        $oddTotal += $number;
    }
}

echo "<h3>4. Total of Odd Elements</h3>";
echo $oddTotal;


// 6. Find minimum element and its positions
$minimum = min($numbers);

echo "<h3>5. Minimum Element and Positions</h3>";
echo "Minimum = " . $minimum . "<br>";

echo "Positions: ";

foreach ($numbers as $index => $number) {
    if ($number == $minimum) {
        echo $index . " ";
    }
}


// 7. Find maximum element and its positions
$maximum = max($numbers);

echo "<h3>6. Maximum Element and Positions</h3>";
echo "Maximum = " . $maximum . "<br>";

echo "Positions: ";

foreach ($numbers as $index => $number) {
    if ($number == $maximum) {
        echo $index . " ";
    }
}

?>
```