```php
<?php

// ==========================================
// Q2: Two-Dimensional Associative Array
// ==========================================

// Declare the associative 2D array

$colors = array(
    "Light" => array(
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),

    "Normal" => array(
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),

    "Dark" => array(
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    )
);


// Print array elements as a table

echo "<h3>Q2: Color Table</h3>";

echo "<table border='1' cellpadding='10'>";

// Column names
echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";


// Print rows and values
foreach ($colors as $rowName => $row) {

    echo "<tr>";

    // Row name
    echo "<th>" . $rowName . "</th>";

    // Values
    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>
```