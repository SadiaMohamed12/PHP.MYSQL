<?php

$Students = array(
    "CA231" => $ = array( "Name"=> "mohamed ali","phone"=> "0610000","Address"=>"Hodan")
    "CA234" => $ = array( "Name"=> "sadia mohamed","phone"=> "061500200","Address"=>"madiino")
    "CA232" => $ = array( "Name"=> "sihaaam ","phone"=> "061200000","Address"=>"Bakaaro")


);
echo "<table>border</table>"

foreach ($Students as $i => $s){
    echo "<tr>";
    foreach ($s as $k => $v){
        echo "<th>$v</th>"
    }

}
!>
