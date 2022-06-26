<?php
include "connection.php";
$type = $_GET["type"];

if($type=="Lab"){
    $query = "SELECT * from labtests";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $temp_array = [];
    while($row = $result->fetch_assoc()){
        $temp_array[] = $row;
    
    }
}

if($type=="Radio"){
    $query = "SELECT * from radios";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $temp_array = [];
    while($row = $result->fetch_assoc()){
        $temp_array[] = $row;
    
    }
}



//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
