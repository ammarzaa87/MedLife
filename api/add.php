<?php
	include 'connection.php';
	
	if(isset($_POST['pass'])) {
		$hash = hash('sha256', $_POST['pass']);
		$sql1 = "SELECT * FROM user where hash=?";
		$stmt1 = $connection->prepare($sql1);
		$stmt1->bind_param("s",$hash);
		$stmt1->execute();
		$result = $stmt1->get_result();
		$row = $result->fetch_assoc();
		$user_id = $row['id'];
		
		if(!empty($row)){
			if(isset($_POST['ssn'])) {
			$ssn=$_POST['ssn'];
			}else{
				die ("Enter a valid input");
			}
			if(isset($_POST['doctor'])) {
				$doctor=$_POST['doctor'];
			}else{
				die ("Enter a valid input");
			}
			if(isset($_POST['desc'])) {
				$desc = $_POST['desc'];
			}else{
				die ("Enter a valid input");
			}
			
			
			
			$sql = "INSERT INTO `file`(`user_id` ,`patient_ssn`,`doctor_nb`,`overall`) 
			VALUES ('$user_id','$ssn','$doctor','$desc')";
			
			

			if (mysqli_query($connection, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($connection);
		}
		else{
			die("authentication error");
		}
		
	
	}
	else{
		die("you must be authenticated");
	}
?>