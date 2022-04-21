<?php
include "connection.php";


if(isset($_POST["ssn"]) && $_POST["ssn"] != "") {
    $ssn = $_POST["ssn"];
}else{
    die ("Enter ssn");
}
if(isset($_POST["test"]) && $_POST["test"] != "") {
    $test = $_POST["test"];
}else{
    die ("Enter test id");
}

if(isset($_POST["date"]) && $_POST["date"] != "") {
    $date = $_POST["date"];
}else{
    die ("Enter date");
}

$status=1;//not done yet
if($_POST["type"]=="Lab") {
$sql4 = "INSERT INTO `dolab` (`labtest_id`, `patient_ssn`,`status` ,`date`) VALUES (?,?,?,?);"; 
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("ssss",$test,$ssn,$status,$date);
$stmt4->execute();
header('location: ../dr-medfile.php?ssn='.$ssn);
}else{
    $sql4 = "INSERT INTO `doradio` (`radio_id`, `patient_ssn`,`status` ,`date`) VALUES (?,?,?,?);"; 
    $stmt4 = $connection->prepare($sql4);
    $stmt4->bind_param("ssss",$test,$ssn,$status,$date);
    $stmt4->execute();
    header('location: ../dr-medfile.php?ssn='.$ssn);
}







	



?>