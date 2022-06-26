<?php
include "connection.php";
$spec = $_GET["spec"];

$query = "SELECT * from doctors where speciality=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $spec);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
