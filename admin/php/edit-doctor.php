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

if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}else{
    die ("Enter email");
}
if(isset($_POST["d_id"]) && $_POST["d_id"] != "") {
    $d_id = $_POST["d_id"];
}else{
    die ("Enter doctor id");
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
		    header("Location: ../edit-doctor.php?error=$em");
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
		        header("Location: ../edit-doctor.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../edit-doctor.php?error=$em");
	}
				
	

        if($new_img_name != "") {
            $hash = hash('sha256', $password);
            $sql4 = "UPDATE `doctors` SET first_name='$fname', last_name='$lname',dr_id='$d_id', gender='$gender',phone='$phone',email='$email',password='$hash',birth='$birth',profile='$new_img_name',speciality='$major',address='$address',biography='$biography' where id=$id;"; #add the new user to the database
            $stmt4 = $connection->prepare($sql4);
            $stmt4->execute();
            header('location: ../doctors.php');
        }else{
            $hash = hash('sha256', $password);
            $sql4 = "UPDATE `doctors` SET first_name='$fname', last_name='$lname',dr_id='$d_id', gender='$gender',phone='$phone',email='$email',password='$hash',birth='$birth',speciality='$major',address='$address',biography='$biography' where id=$id;"; #add the new user to the database
            $stmt4 = $connection->prepare($sql4);
            $stmt4->execute();
            header('location: ../doctors.php');
        }
    
    
 

    




	


?>