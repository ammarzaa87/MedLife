<?php
include "connection.php";

if (isset($_POST["ssn"]) and $_POST["ssn"] !="")
	{
		$ssn = $_POST["ssn"];
	}else
	{
		die("Invalid ssn");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Try again next time");
	}


$hash = hash('sha256', $password);
$sql1="Select * from patients where ssn=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$ssn,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please check your SSN or Password";
	header('location: ../login.php');
}
else{
	session_start();
	$_SESSION["u_id"] = $row["id"];
	header('location: ../home.php');
	
}











?>