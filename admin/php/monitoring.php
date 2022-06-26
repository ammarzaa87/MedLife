<?php
include "connection.php";
session_start();
if(empty($_SESSION['n_id'])){
    header("Location: ../nurse-pannel.php");
    die();
}

$n_id = $_SESSION['n_id'];

if(isset($_POST["ssn"]) && $_POST["ssn"] != "") {
    $ssn = $_POST["ssn"];
}else{
    die ("ssn is required");
}

if(isset($_POST["press"]) && $_POST["press"] != "") {
    $press = $_POST["press"];
}else{
    die ("pressure is required");
}
if(isset($_POST["diab"]) && $_POST["diab"] != "") {
    $diab = $_POST["diab"];
}else{
    die ("diabetes is required");
}
if(isset($_POST["heart"]) && $_POST["heart"] != "") {
    $heart = $_POST["heart"];
}else{
    die ("heart beat is required");
}


$sql1="Select * from monitoring where patient_ssn=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$ssn);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
if(empty($row)){

    date_default_timezone_set('Asia/Beirut');
    $date=date("Y-m-d");
    $timee = date('H:i a');
    $sql4 = "INSERT INTO `monitoring` (`patient_ssn`,`nurse_id`,`date`,`time`,`pressure`,`diabetes`,`heartbeat`) VALUES (?,?,?,?,?,?,?);"; 
    $stmt4 = $connection->prepare($sql4);
    $stmt4->bind_param("sssssss",$ssn,$n_id,$date,$timee,$press,$diab,$heart);
    $stmt4->execute();
    
    header('location: ../nurse-pannel.php');
	


}
else{
    date_default_timezone_set('Asia/Beirut');
    $date=date("Y-m-d");
    $timee = date('H:i a');
    $sql4 = "UPDATE `monitoring` SET nurse_id='$n_id', date='$date', time='$timee',pressure='$press',diabetes='$diab',heartbeat='$heart' where patient_ssn='$ssn';"; 
$stmt4 = $connection->prepare($sql4);
$stmt4->execute();
header('location: ../nurse-pannel.php');
}





?>