<?php
include "connection.php";


if(isset($_POST["id"]) && $_POST["id"] != "") {
    $id = $_POST["id"];
}else{
    die ("Enter id");
}

if(isset($_POST["fname"]) && $_POST["fname"] != "") {
    $fname = $_POST["fname"];
}else{
    die ("Enter Firstname");
}

if(isset($_POST["lname"]) && $_POST["lname"] != "") {
    $lname = $_POST["lname"];
}else{
    die ("Enter lastname");
}

if(isset($_POST["username"]) && $_POST["username"] != "") {
    $username = $_POST["username"];
}else{
    die ("Enter username");
}



if(isset($_POST["password"]) && $_POST["password"] != "") {
    $password = $_POST["password"];
}else{
    die ("Enter a valid password");
}


if ($_POST["password"] === $_POST["confirmpassword"]) {
	// success!
 }
 else {
	die("passwords didn't match");
 }

if(isset($_POST["birth"]) && $_POST["birth"] != "") {
    $birth = $_POST["birth"];
}else{
    die ("Enter a valid birthdate");
}

if(isset($_POST["gender"]) && $_POST["gender"] != "") {
    $gender = $_POST["gender"];
}else{
    die ("Enter a gender");
}


if(isset($_POST["phone"]) && $_POST["phone"] != "") {
    $phone = $_POST["phone"];
}else{
    die ("Enter a valid phone");
}

$hash = hash('sha256', $password);
$sql4 = "UPDATE `nurses` SET fname='$fname', lname='$lname', gender='$gender',phone='$phone',username='$username',password='$hash',birth='$birth' where id=$id;"; 
$stmt4 = $connection->prepare($sql4);
$stmt4->execute();
header('location: ../nurse.php');


	



?>