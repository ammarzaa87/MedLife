<?php
include "connection.php";
$ssn = $_GET["ssn"];

$query = "SELECT * from file AS F, user AS U where F.user_id=U.id AND patient_ssn=? order by F.date desc";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $ssn);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
