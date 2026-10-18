
<?php

// =====================================================
// PHP ASSIGNMENT 2
// =====================================================


// =====================================================
// QUESTION 1
// One-Dimensional Array
// =====================================================

echo "<h2>Q1 — One-Dimensional Array</h2>";

$numbers = array(
    5, -7, 12, 10, -7, 11,
    -6, 12, 1, -7, 2, 9
);


// Print all elements
echo "<h3>1. All Elements</h3>";

foreach ($numbers as $number) {
    echo $number . " ";
}


// Total of all elements
$total = 0;

foreach ($numbers as $number) {
    $total += $number;
}

echo "<h3>2. Total of All Elements</h3>";
echo $total;


// Total of even elements
$evenTotal = 0;

foreach ($numbers as $number) {

    if ($number % 2 == 0) {
        $evenTotal += $number;
    }
}

echo "<h3>3. Total of Even Elements</h3>";
echo $evenTotal;


// Total of odd elements
$oddTotal = 0;

foreach ($numbers as $number) {

    if ($number % 2 != 0) {
        $oddTotal += $number;
    }
}

echo "<h3>4. Total of Odd Elements</h3>";
echo $oddTotal;


// Minimum and positions
$minimum = min($numbers);

echo "<h3>5. Minimum Element and Positions</h3>";
echo "Minimum = " . $minimum . "<br>";
echo "Positions: ";

foreach ($numbers as $index => $number) {

    if ($number == $minimum) {
        echo $index . " ";
    }
}


// Maximum and positions
$maximum = max($numbers);

echo "<h3>6. Maximum Element and Positions</h3>";
echo "Maximum = " . $maximum . "<br>";
echo "Positions: ";

foreach ($numbers as $index => $number) {

    if ($number == $maximum) {
        echo $index . " ";
    }
}



// =====================================================
// QUESTION 2
// Two-Dimensional Associative Array
// =====================================================

echo "<hr>";
echo "<h2>Q2 — Two-Dimensional Associative Array</h2>";

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


// Print table

echo "<table border='1' cellpadding='10'>";

echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";


foreach ($colors as $rowName => $row) {

    echo "<tr>";

    echo "<th>" . $rowName . "</th>";

    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";



// =====================================================
// QUESTION 3
// Two-Dimensional Square Array
// =====================================================

echo "<hr>";
echo "<h2>Q3 — Two-Dimensional Square Array</h2>";

$array = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);


// Print all elements

echo "<h3>1. All Elements</h3>";

echo "<table border='1' cellpadding='10'>";

foreach ($array as $row) {

    echo "<tr>";

    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";


// Total of odd elements

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


// Total of even elements

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


// Total of each row

echo "<h3>4. Total of Each Row</h3>";

for ($i = 0; $i < 3; $i++) {

    $rowTotal = 0;

    for ($j = 0; $j < 3; $j++) {
        $rowTotal += $array[$i][$j];
    }

    echo "Row " . ($i + 1) . " Total = " . $rowTotal . "<br>";
}


// Total of each column

echo "<h3>5. Total of Each Column</h3>";

for ($j = 0; $j < 3; $j++) {

    $columnTotal = 0;

    for ($i = 0; $i < 3; $i++) {
        $columnTotal += $array[$i][$j];
    }

    echo "Column " . ($j + 1) . " Total = " . $columnTotal . "<br>";
}


// Diagonal totals

$mainDiagonal = 0;
$secondDiagonal = 0;

for ($i = 0; $i < 3; $i++) {

    $mainDiagonal += $array[$i][$i];

    $secondDiagonal += $array[$i][2 - $i];
}

echo "<h3>6. Total of Each Diagonal</h3>";

echo "Main Diagonal = " . $mainDiagonal . "<br>";
echo "Second Diagonal = " . $secondDiagonal;


// Total of all elements

$total = 0;

foreach ($array as $row) {

    foreach ($row as $value) {
        $total += $value;
    }
}

echo "<h3>7. Total of All Elements</h3>";
echo $total;


// Minimum

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


// Maximum

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



// =====================================================
// QUESTION 4
// Student Information
// =====================================================

echo "<hr>";
echo "<h2>Q4 — Student Information 2D Associative Array</h2>";

$students = array(

    "CA221-1" => array(
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ),

    "CA223" => array(
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ),

    "CA221-2" => array(
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    )
);


// Print table

echo "<table border='1' cellpadding='10'>";

echo "<tr>";
echo "<th>Student ID</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";


foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>" . $id . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";



// =====================================================
// QUESTION 5
// Student Transcript
// =====================================================

echo "<hr>";
echo "<h2>Q5 — Student Transcript</h2>";

$transcript = array(

    "Semester 1" => array(

        "subject1" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject2" => array(
            "CW1" => 8,
            "MidTerm" => 36,
            "CW2" => 10,
            "Final" => 50,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject3" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )
    ),


    "Semester 2" => array(

        "subject1" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 0,
            "Total" => 45,
            "Status" => "Fail"
        ),

        "subject2" => array(
            "CW1" => 8,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject3" => array(
            "CW1" => 7,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )
    )
);


// Print transcript table

echo "<table border='1' cellpadding='10'>";

echo "<tr>";
echo "<th>Semester</th>";
echo "<th>Course</th>";
echo "<th>CW1</th>";
echo "<th>MidTerm</th>";
echo "<th>CW2</th>";
echo "<th>Final</th>";
echo "<th>Total</th>";
echo "<th>Status</th>";
echo "</tr>";


foreach ($transcript as $semester => $courses) {

    foreach ($courses as $course => $marks) {

        echo "<tr>";

        echo "<td>" . $semester . "</td>";
        echo "<td>" . $course . "</td>";
        echo "<td>" . $marks["CW1"] . "</td>";
        echo "<td>" . $marks["MidTerm"] . "</td>";
        echo "<td>" . $marks["CW2"] . "</td>";
        echo "<td>" . $marks["Final"] . "</td>";
        echo "<td>" . $marks["Total"] . "</td>";
        echo "<td>" . $marks["Status"] . "</td>";

        echo "</tr>";
    }
}

echo "</table>";

?>
```