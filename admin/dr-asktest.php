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
    <title>Ask For Test</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
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
                        <h4 class="page-title">Ask For Test</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="php/dotest.php" id="registration" method="post">
                            <div class="row">
                                
                                
                           
                            <input type="hidden" id="ssn" name="ssn" value="<?php echo $_GET['ssn'];?>">
								 
                            <div class="col-sm-12">
									<div class="row">
								
								
                              
										
										
										<div class="col-sm-6 col-md-4 col-lg-4">
											<div class="form-group">
												<label>Lab/Radio <span class="text-danger">*</span></label>
												<select id="type" name="type" class="form-control select">
													<option value="">Select Type</option>
													<option>Lab</option>
													<option>Radio</option>
													
												</select>
											</div>
										</div>
										
										<div class="col-sm-6 col-md-4 col-lg-4">
											<div class="form-group">
												<label>Test Name <span class="text-danger">*</span></label>
												<select id="test" name="test" class="form-control select">
													<option value="">Select Test</option>
													
												</select>
											</div>
										</div>

                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Date <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input id="date" class="form-control" type="date" name="date" value="0-0-0" required>
                                        </div>
                                    </div>
                                </div>
										
										
                                        </div>
								</div>		
								
                                
                                
                            </div>
							
							
							
                         
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
    $("#type").change(function () {
		$('#test').empty();
		$('#date').val('')
    .attr('type', 'text')
    .attr('type', 'date');
			async function testfetchAPI(){
				
				const response = await fetch('http://localhost/MedLife/admin/php/showtest.php?type='+$('#type').val());
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const categresults = await response.json();
				return categresults; 
			}
				testfetchAPI().then(categresults => {
					dropdown(categresults);
					
					
				}).catch(error => {
					console.log(error.message);
				})
	

				
	function dropdown(results){
		var ele = document.getElementById('test');
        for (var i = 0; i < results.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            ele.innerHTML = ele.innerHTML +
                '<option value="' + results[i]['id'] + '">' + results[i]['name'] + '</option>';
        }
		
		
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
    <script src="assets/js/select2.min.js"></script>
</body>


</html>