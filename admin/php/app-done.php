<?php
include "connection.php";



$id=$_GET['id'];



$sql1 = "UPDATE appointments SET status =0 where id=?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$id);
$stmt1->execute();

header('location: ../dr-appointments.php');
	

?>