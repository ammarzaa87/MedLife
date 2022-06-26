<?php
header("Access-Control-Allow-Origin: *");
include "connection.php";


$query = "SELECT P.id,P.fname,P.lname,M.pressure,M.diabetes,M.heartbeat,M.date,M.time from patients AS P, monitoring AS M where P.ssn=M.patient_ssn AND P.is_critical=1
order by M.date, M.time";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
