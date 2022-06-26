<?php
include "connection.php";
session_start();
if(empty($_SESSION['l_id'])){
    header("Location: ../test.php");
    die();
}

$tech_id = $_SESSION['l_id'];

if(isset($_POST["id"]) && $_POST["id"] != "") {
    $id = $_POST["id"];
}else{
    die ("id is required");
}

echo "<pre>";
print_r($_FILES['my_file']);
echo "</pre>";

$img_name = $_FILES['my_file']['name'];
	$img_size = $_FILES['my_file']['size'];
	$tmp_name = $_FILES['my_file']['tmp_name'];
	$error = $_FILES['my_file']['error'];

	if ($error === 0) {
		if ($img_size > 50000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../lab.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png","pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("LABTEST-", true).'.'.$img_ex_lc;
				$img_upload_path = '../tests/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				
				
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../lab.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../lab.php?error=$em");
	}

    $sql1="Select * from dolab where id=?"; 
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("s",$id);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();
    $ssn=$row['patient_ssn'];
	$test_id =$row['labtest_id'];
$date=date("Y-m-d");
$sql4 = "INSERT INTO `add_lab_res` (`patient_ssn`,`labtech_id`,`labtest_id`,`date`,`file`) VALUES (?,?,?,?,?);"; 
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("sssss",$ssn,$tech_id,$test_id,$date,$new_img_name);
$stmt4->execute();


$sql1 = "UPDATE dolab SET status =0 where id=?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$id);
$stmt1->execute();
header('location: ../lab.php');


?>