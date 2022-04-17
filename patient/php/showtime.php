<?php
include "connection.php";
$dr_id = $_GET["d_id"];
$date = $_GET["date"];
$query = "SELECT T.fromm,T.too,T.id FROM timing AS T, has_time AS H WHERE H.timing_id=T.id AND H.doctor_id=? AND H.date=? AND availability=1 order by id";
$stmt = $connection->prepare($query);
$stmt->bind_param("ss", $dr_id,$date);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
