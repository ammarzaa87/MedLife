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

if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}else{
    die ("Enter email");
}
if(isset($_POST["id"]) && $_POST["id"] != "") {
    $id = $_POST["id"];
}else{
    die ("Enter id");
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

if(isset($_POST["major"]) && $_POST["major"] != "") {
    $major = $_POST["major"];
}else{
    die ("Enter a valid major");
}

if(isset($_POST["phone"]) && $_POST["phone"] != "") {
    $phone = $_POST["phone"];
}else{
    die ("Enter a valid phone");
}


$address = $_POST["city"].", ".$_POST["state"].", ".$_POST["country"];

$biography = $_POST["bio"];
if($gender=="Male"){
	$new_img_name = "doctor.png";
}
else{
	$new_img_name = "f-doctor.png";
}


	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../add-doctor.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				
				
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../add-doctor.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../add-doctor.php?error=$em");
	}
				
	



$sql1="Select * from doctors where dr_id=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$id);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
if(empty($row)){

		$hash = hash('sha256', $password);
		$sql4 = "INSERT INTO `doctors` (`first_name`, `last_name`,`dr_id`, `gender`,`phone`,`email`,`password`,`birth`,`profile`,`speciality`,`address`,`biography`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);"; #add the new user to the database
		$stmt4 = $connection->prepare($sql4);
		$stmt4->bind_param("ssssssssssss",$fname,$lname,$id,$gender,$phone,$email,$hash,$birth,$new_img_name,$major,$address,$biography);
		$stmt4->execute();
		header('location: ../doctors.php');
	


}
else{
    session_start();
    $_SESSION["flash"] = "ID already exists";
    header('location: ../add-doctor.php');
}
?>