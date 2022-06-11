<?php
include "connection.php";



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


$sql1="Select * from nurses where username=?"; #Check if the username already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$username);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
if(empty($row)){

		$hash = hash('sha256', $password);
		$sql4 = "INSERT INTO `nurses` (`fname`, `lname`,`phone` ,`gender`,`username`,`password`,`birth`) VALUES (?,?,?,?,?,?,?);"; #add the new lab tech to the database
		$stmt4 = $connection->prepare($sql4);
		$stmt4->bind_param("sssssss",$fname,$lname,$phone,$gender,$username,$hash,$birth);
		$stmt4->execute();
		header('location: ../nurse.php');
	


}
else{
    session_start();
    $_SESSION["flash"] = "This username is taken, please register with new one";
    header('location: ../add-nurse.php');
}
?>