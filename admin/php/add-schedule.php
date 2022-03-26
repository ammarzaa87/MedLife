<?php
include "connection.php";



if(isset($_POST["doctor"]) && $_POST["doctor"] != "") {
    $doctor_id = $_POST["doctor"];
}else{
    die ("Dr id is required");
}

if(isset($_POST["day"]) && $_POST["day"] != "") {
    $day = $_POST["day"];
}else{
    die ("day is required");
}

if(isset($_POST["start"]) && $_POST["start"] != "") {
    $start = $_POST["start"];
}else{
    die ("start required");
}

if(isset($_POST["end"]) && $_POST["end"] != "") {
    $end = $_POST["end"];
}else{
    die ("end required");
}




$sql = "INSERT INTO `has_time` (`doctor_id`, `from`, `to`,`day`) VALUES (?,?,?,?);"; #add the schedule user to the database
$stmt = $connection->prepare($sql);
$stmt->bind_param("ssss",$doctor_id,$start,$end,$day);
$stmt->execute();
header('location: ../schedule.php');
	




?>