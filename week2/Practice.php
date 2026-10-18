<?php

// 1. Create a multidimensional associative array
//    to store countries and their capitals

echo "<h1> Assigment pratice code </h1>";

$countries = array(
    "Somalia" => array(
        "capital" => "Mogadishu"
    ),

    "Kenya" => array(
        "capital" => "Nairobi"
    ),

    "Ethiopia" => array(
        "capital" => "Addis Ababa"
    ),

    "Uganda" => array(
        "capital" => "Kampala"
    )
);


// 2. Function that takes a country name
//    and returns its capital name

function getCapital($country)
{
    global $countries;

    return $countries[$country]["capital"];
}


// 3. Print country name and its capital name
//    for each element in the array

foreach ($countries as $country => $data) {

    echo "Country: " . $country . "<br>";
    echo "Capital: " . $data["capital"] . "<br><br>";
}







// Q5
$students = array(
    "Semester 1" => array(
        "Python" => array(10, 20, 10, 40),
        "JavaScript" => array(0, 20, 10, 40),
        "Oracle" => array(4, 10, 15, 30)
    ),
    "Semester 2" => array(
        "Flutter" => array(5, 10, 10, 10),
        "PHP and MySQL" => array(9, 20, 10, 40)
    )
);

echo "<table border='1' cellpadding='10'>";

echo "<tr>
<th>Semester</th>
<th>Course</th>
<th>CW1</th>
<th>MidTerm</th>
<th>CW2</th>
<th>Final</th>
<th>Total</th>
</tr>";

foreach ($students as $semester => $subjects) {

    foreach ($subjects as $course => $marks) {

        $total = array_sum($marks);

        if ($total >= 50 && $total <= 60) {
            $color = "yellow";
        } elseif ($total < 50) {
            $color = "red";
        } else {
            $color = "white";
        }

        echo "<tr style='background-color:$color'>";
        echo "<td>$semester</td>";
        echo "<td>$course</td>";
        echo "<td>$marks[0]</td>";
        echo "<td>$marks[1]</td>";
        echo "<td>$marks[2]</td>";
        echo "<td>$marks[3]</td>";
        echo "<td>$total</td>";
        echo "</tr>";
    }
}

echo "</table>";















?>