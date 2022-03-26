<?php
include "connection.php";

if (isset($_POST["email"]) and $_POST["email"] !="")
	{
		$email = $_POST["email"];
	}else
	{
		die("Try again next time");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Try again next time");
	}

$hash = hash('sha256', $password);
$sql1="Select * from admins where username=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$email,$password);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please check your email or password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["id"] = $row["id"];
	if( $row["admin_type"] == 1){
		header('location: ../admin.php');
	}
	elseif($row["admin_type"] == 2){
	session_start();
	$_SESSION["id"] = $row["id"];
	header('location: ../admin/docotors.html');
	}
	elseif($row["admin_type"] == 3){
	session_start();
	$_SESSION["id"] = $row["id"];
	header('location: ../admin/labtech.html');
	}
	else{
	session_start();
	$_SESSION["id"] = $row["id"];
	header('location: ../admin/radiotech.html');
	}
}
?>