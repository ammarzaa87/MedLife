<?php
include "connection.php";
session_start();
if(empty($_SESSION['l_id'])){
    header("Location: ../index.php");
    die();
}



if(isset($_POST["old"]) && $_POST["old"] != "") {
    $old = $_POST["old"];
}else{
    die ("Enter old password");
}

if(isset($_POST["new"]) && $_POST["new"] != "") {
    $new = $_POST["new"];
}else{
    die ("Enter new password");
}

if(isset($_POST["confirm"]) && $_POST["confirm"] != "") {
    $confirm = $_POST["confirm"];
}else{
    die ("Enter confirm new password");
}
$hash = hash('sha256', $old);
$id = $_SESSION['l_id'];
$sql1="Select * from labtech where id=? and password=?"; #Check if old pass already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$id,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
$realold =$row["password"];
$newhash = hash('sha256', $new);
if(empty($row)){
    $_SESSION["a-pass"] = "Your old password is incorrect";
    header('location: ../lab-change-password.php');
}
else{
    
	if ($_POST["new"] === $_POST["confirm"]) {
        if($realold === $newhash){
            $_SESSION["a-pass"] = "Old Passsword Can't be the new one";
            header('location: ../lab-change-password.php');
        }
        else{
            
            
            $sql = "UPDATE labtech SET password = '$newhash' where id=$id";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $_SESSION["a-pass-success"] = "Password Changed Successfully";
            header('location: ../lab-change-password.php');
        }
       
     }
     else {
       
        $_SESSION["a-pass"] = "Passwords didn't match";
        header('location: ../lab-change-password.php');
     }
	
}











?>