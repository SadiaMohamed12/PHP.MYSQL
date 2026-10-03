```php
<?php

// ==========================================
// Q3: Two-Dimensional Square Array
// ==========================================

// 1. Declare and initialize the array

$array = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);


// 2. Print all elements

echo "<h3>1. All Elements</h3>";

echo "<table border='1' cellpadding='10'>";

foreach ($array as $row) {
    echo "<tr>";

    foreach ($row as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}

echo "</table>";


// 3. Calculate total of odd elements

$oddTotal = 0;

foreach ($array as $row) {
    foreach ($row as $value) {
        if ($value % 2 != 0) {
            $oddTotal += $value;
        }
    }
}

echo "<h3>2. Total of Odd Elements</h3>";
echo $oddTotal;


// 4. Calculate total of even elements

$evenTotal = 0;

foreach ($array as $row) {
    foreach ($row as $value) {
        if ($value % 2 == 0) {
            $evenTotal += $value;
        }
    }
}

echo "<h3>3. Total of Even Elements</h3>";
echo $evenTotal;


// 5. Calculate total of each row

echo "<h3>4. Total of Each Row</h3>";

for ($i = 0; $i < 3; $i++) {

    $rowTotal = 0;

    for ($j = 0; $j < 3; $j++) {
        $rowTotal += $array[$i][$j];
    }

    echo "Row " . ($i + 1) . " Total = " . $rowTotal . "<br>";
}


// 6. Calculate total of each column

echo "<h3>5. Total of Each Column</h3>";

for ($j = 0; $j < 3; $j++) {

    $columnTotal = 0;

    for ($i = 0; $i < 3; $i++) {
        $columnTotal += $array[$i][$j];
    }

    echo "Column " . ($j + 1) . " Total = " . $columnTotal . "<br>";
}


// 7. Calculate total of each diagonal

$mainDiagonal = 0;
$secondDiagonal = 0;

for ($i = 0; $i < 3; $i++) {

    $mainDiagonal += $array[$i][$i];

    $secondDiagonal += $array[$i][2 - $i];
}

echo "<h3>6. Diagonal Totals</h3>";
echo "Main Diagonal Total = " . $mainDiagonal . "<br>";
echo "Second Diagonal Total = " . $secondDiagonal;


// 8. Calculate total of all elements

$total = 0;

foreach ($array as $row) {
    foreach ($row as $value) {
        $total += $value;
    }
}

echo "<h3>7. Total of All Elements</h3>";
echo $total;


// 9. Find minimum element and its positions

$minimum = $array[0][0];

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] < $minimum) {
            $minimum = $array[$i][$j];
        }
    }
}

echo "<h3>8. Minimum Element and Positions</h3>";
echo "Minimum = " . $minimum . "<br>";

echo "Positions: ";

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] == $minimum) {
            echo "(" . $i . ", " . $j . ") ";
        }
    }
}


// 10. Find maximum element and its positions

$maximum = $array[0][0];

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] > $maximum) {
            $maximum = $array[$i][$j];
        }
    }
}

echo "<h3>9. Maximum Element and Positions</h3>";
echo "Maximum = " . $maximum . "<br>";

echo "Positions: ";

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {

        if ($array[$i][$j] == $maximum) {
            echo "(" . $i . ", " . $j . ") ";
        }
    }
}

?>
```