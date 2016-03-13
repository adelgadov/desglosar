<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 11/03/2016
 * Time: 12:55
 */
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=codelution-export.xls");
$csv = $_POST['csv'];



$csv = explode("\n", $csv);
array_pop($csv);
$separate=array();

for($i=0;$i<count($csv);$i++) {
    $separate[$i]=explode(";",$csv[$i]);
}
$final=array();

for($i=0;$i<count($separate);$i++){
    $final[$separate[$i][0]]=explode("+",$separate[$i][1]);
}

echo "<table>";

foreach($final as $init => $array) {
    foreach($array as $key => $value) {
        echo "<tr><td>$init</td><td>$value</td></tr>";
    }
}

echo "</table>";