<?php
include "connection.php";

if (isset($_POST["username"]) and $_POST["username"] !="")
	{
		$username = $_POST["username"];
	}else
	{
		die("Invalid Username");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Try again next time");
	}

if($_POST["major"]==1){
	$hash = hash('sha256', $password);
$sql1="Select * from admins where username=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please Check your Username or Password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["a_id"] = $row["id"];
	header('location: ../admin.php');
	
}
}

if($_POST["major"]==2){
	$hash = hash('sha256', $password);
$sql1="Select * from doctors where email=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please Check your Username or Password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["d_id"] = $row["id"];
	header('location: ../dr-pannel.php');
	
}
}

if($_POST["major"]==3){
	$hash = hash('sha256', $password);
$sql1="Select * from labtech where username=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please Check your Username or Password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["l_id"] = $row["id"];
	header('location: ../lab.php');
	
}
}

if($_POST["major"]==4){
	$hash = hash('sha256', $password);
$sql1="Select * from radiotech where username=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please Check your Username or Password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["r_id"] = $row["id"];
	header('location: ../radio.php');
	
}
}

if($_POST["major"]==5){
	$hash = hash('sha256', $password);
$sql1="Select * from nurses where username=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please Check your Username or Password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["a_id"] = $row["id"];
	header('location: ../nurseeeee.php');
	
}
}


?>