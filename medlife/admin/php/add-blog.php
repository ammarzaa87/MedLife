<?php
include "connection.php";



if(isset($_POST["name"]) && $_POST["name"] != "") {
    $name = $_POST["name"];
}else{
    die ("name is required");
}

if(isset($_POST["cat"]) && $_POST["cat"] != "") {
    $cat = $_POST["cat"];
}else{
    die ("category is required");
}

if(isset($_POST["desc"]) && $_POST["desc"] != "") {
    $desc = $_POST["desc"];
}else{
    die ("description is required");
}
$date=date("Y-m-d");
if (isset($_FILES['my_image'])) {
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
		    header("Location: ../add-blog.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$sql = "INSERT INTO `blog` (`description`, `category_id`, `name`,`image`,`date`) VALUES (?,?,?,?,?);"; #add the blog to the database
$stmt = $connection->prepare($sql);
$stmt->bind_param("sssss",$desc,$cat,$name,$new_img_name,$date);
$stmt->execute();
header('location: ../blogs.php');
				
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../add-blog.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../add-blog.php?error=$em");
	}


	

}else {
	header("Location: ../add-blog.php");
}


?>