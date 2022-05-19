<?php
include "connection.php";



if(isset($_POST["doctor"]) && $_POST["doctor"] != "") {
    $doctor_id = $_POST["doctor"];
}else{
    die ("Dr id is required");
}

if(isset($_POST["date"]) && $_POST["date"] != "") {
    $date = $_POST["date"];
}else{
    die ("date is required");
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
$st = strtotime($start);
$en = strtotime($end);
$arr= array ();
while($st <= $en){
    $arr[]= date("h:i A", $st);
    $st = $st+30*60;
}
$i=0;
$count = count($arr);
while($i< $count){
    $sql1="Select * from timing where fromm=? and too=?"; #Check if the email already exists in the database
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("ss",$arr[$i],$arr[$i+1]);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();

    $ava=1;
    $sql = "INSERT INTO `has_time` (`doctor_id`, `timing_id`,`date`,`availability`) VALUES (?,?,?,?);";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss",$doctor_id,$row['id'],$date,$ava);
    $stmt->execute();
    $i++;
    
}
header('location: ../schedule.php?id='.$doctor_id);


	




?>