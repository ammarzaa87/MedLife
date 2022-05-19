<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['d_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Medical File</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="dr-pannel.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>MedLife</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>


            <?php
					$id=$_SESSION['d_id'];
					$sql1 = "Select * from doctors where id=$id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>

            <ul class="nav user-menu float-right">

            
               
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?php echo $row["first_name"]?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="php/dr-logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="php/dr-logout.php">Logout</a>
                </div>
            </div>
        </div>

        <?php
					$id=$_SESSION['d_id'];
					$sql1 = "Select * from doctors where id=$id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
                     $dr_id=$row['dr_id'];
						 
						 
						 ?>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="dr-pannel.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						
                        <li>
                            <a href="dr-patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
						
					
						
                        <li>
                            <a href="dr-appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="dr-schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                       
					
                     
						
                        <li>
                            <a href="dr-change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                        
                       
                    </ul>
                </div>





            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add To The Medical File</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        
							<div class="form-group">
                                <label>Overall Diagnosis</label>
                                <textarea id="dia" name="dia" class="form-control" rows="15" cols="30"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Prescription</label>
                                <textarea id="presc" name="presc" class="form-control" rows="15" cols="30"></textarea>
                            </div>
							
							
                         
                            <div class="m-t-20 text-center">
                                <button id="add" class="btn btn-primary submit-btn">Add</button>
                            </div>
                       
                    </div>
                </div>
            </div>
			
        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
	$(document).ready(function() {
	$('#add').on('click', function() {
		var presc = $('#presc').val();
		var dia = $('#dia').val();
		var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var date = d.getFullYear() + '-' +
            (month<10 ? '0' : '') + month + '-' +
            (day<10 ? '0' : '') + day;
		if(presc!="" && dia!=""){
			$.ajax({
				url: "http://localhost/api/add.php",
				type: "POST",
				data: {
                    pass:"chtaurahospital",
                    ssn:"<?php echo $_GET['ssn'];?>",
					doctor_nb:<?php echo $dr_id;?>,
					date:date,
                    dia:dia,
                    presc:presc,
					
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('.alert').alert()
                        location.replace("dr-appointments.php")
						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
                    else if(dataResult.statusCode=="authentication error"){
					   alert("authentication error");
					}
                    else if(dataResult.statusCode=="you must be authenticated"){
					   alert("you must be authenticated");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});

	
		</script>

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


</html>