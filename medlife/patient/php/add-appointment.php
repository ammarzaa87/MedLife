<?php
include "connection.php";
session_start();
if(empty($_SESSION['u_id'])){
    header("Location: ../login.php");
    die();
}
$u_id=$_SESSION['u_id'];
$sql1="Select * from patients where id=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$u_id);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
$ssn = $row["ssn"];



if(isset($_POST["doctor"]) && $_POST["doctor"] != "") {
    $dr_id = $_POST["doctor"];
}else{
    die ("dr id is required");
}

if(isset($_POST["date"]) && $_POST["date"] != "") {
    $date = $_POST["date"];
}else{
    die ("date required");
}

if(isset($_POST["time"]) && $_POST["time"] != "") {
    $time = $_POST["time"];
}else{
    die ("time required");
}
$status = 1; //not held yet
$message=$_POST["message"];


$sql1="Select * from appointments WHERE patient_ssn=? and date=? and time_id=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("sss",$ssn,$date,$time);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
    $sql = "INSERT INTO `appointments` (`patient_ssn`,`dr_id`,`date`,`time_id`,`message`,`status`) VALUES (?,?,?,?,?,?);";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssss",$ssn,$dr_id,$date,$time,$message,$status);
    $stmt->execute();
    
    $sql = "UPDATE has_time SET availability = 0 where timing_id='$time' and date='$date' and doctor_id='$dr_id'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    header('location: ../success.html');
}
else{
	header('location: ../oops.html');
	
}



	




?>