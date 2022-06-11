<?php 
header("Access-Control-Allow-Origin: *");

include 'connection.php';

	$json = file_get_contents('php://input'); 	
	$obj = json_decode($json,true);

	$email = $obj['email'];
	
	$password = $obj['password'];
	
	if($obj['email']!=""){	
	
    $hash = hash('sha256', $password);
    $sql1="Select * from doctors where email=? and password=?"; #Check if the email already exists in the database
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("ss",$email,$hash);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();
    if(empty($row)){
        echo json_encode('Wrong Details');
    }
    else{
        echo json_encode('ok');	
        
    }
		
	}	
	else{
	  echo json_encode('try again');
	}

?>
