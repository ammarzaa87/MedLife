<?php
include "connection.php";
$dr_id = $_GET["d_id"];

$query = "SELECT T.fromm,T.too FROM timing AS T, has_time AS H WHERE H.timing_id=T.id AND H.doctor_id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $dr_id);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
