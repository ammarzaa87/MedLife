<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['a_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Edit-patient-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Edit Patient</title>
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
				<a href="admin.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>MedLife</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                
               
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
					<div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="change-password.php">Change Password</a>
						<a class="dropdown-item" href="php/logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="change-password.php">Change Password</a>
						<a class="dropdown-item" href="php/logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                    <li class="menu-title">Main</li>
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li class="active">
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
						<li>
                            <a href="lab-tech.php"><i class="fa fa-medkit"></i> <span>Lab Technician</span></a>
                        </li>
						<li>
                            <a href="radio-tech.php"><i class="fa fa-stethoscope"></i> <span>Radio Technician</span></a>
                        </li>
						<li>
                            <a href="nurse.php"><i class="fa fa-heartbeat"></i> <span>Nurses</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                        
						
					
						
						
						 <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blogs.php">Blogs</a></li>
                                <li><a href="add-blog.php">Add Blog</a></li>
                                
                            </ul>
                        </li>
                     
						
                        <li>
                            <a href="change-password"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                      
                    </ul>
                </div>
            </div>
        </div>

        <?php
					$p_id=$_GET['id'];
					$sql1 = "Select * from patients where id=$p_id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
                     $arr =(explode(", ",$row["address"]));
						 
						 ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="php/edit-patient.php" id="registration" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="fname" value="<?php echo $row["fname"];?>" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="lname" value="<?php echo $row["lname"];?>" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>SSN <span class="text-danger">*</span></label>
                                     
                                        <input name="ssn" class="form-control" value="<?php echo $row["ssn"];?>" type="number" required readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                    
                                        <input class="form-control" name="email" value="<?php echo $row["email"];?>" type="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input id="password" name="password" class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <input id="confirm_password" name="confirmpassword" class="form-control" type="password" required>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="birth" value="<?php echo $row["birth"];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender: <span class="text-danger">*</span></label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Male" class="form-check-input" required <?php echo( $row["gender"]=="Male" ? 'checked' : '' );?>>Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Female" class="form-check-input" required <?php echo( $row["gender"]=="Female" ? 'checked' : '' );?>>Female
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										
                                    <div class="col-sm-6 col-md-6 col-lg-4">
											<div class="form-group">
												<label>City</label>
												<input name="city" type="text" value="<?php echo $arr[0];?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-4">
											<div class="form-group">
												<label>State/Province</label>
												<select name="state" class="form-control select">
													<option></option>
													<option <?php echo( $arr[1]=="Akkar" ? 'selected' : '' );?>>Akkar</option>
													<option <?php echo( $arr[1]=="Baalbeck-Hermel" ? 'selected' : '' );?>>Baalbeck-Hermel</option>
													<option <?php echo( $arr[1]=="Beirut" ? 'selected' : '' );?>>Beirut</option>
													<option <?php echo( $arr[1]=="Bekaa" ? 'selected' : '' );?>>Bekaa</option>
													<option <?php echo( $arr[1]=="Mount Lebanon" ? 'selected' : '' );?>>Mount Lebanon</option>
													<option <?php echo( $arr[1]=="North Lebanon" ? 'selected' : '' );?>>North Lebanon</option>
													<option <?php echo( $arr[1]=="Nabatiyeh" ? 'selected' : '' );?>>Nabatiyeh</option>
													<option <?php echo( $arr[1]=="South Lebanon" ? 'selected' : '' );?>>South Lebanon</option>
												</select>
											</div>
										</div>
										
										<div class="col-sm-6 col-md-6 col-lg-4">
											<div class="form-group">
												<label>Country</label>
												<select name="country" class="form-control select">
													<option></option>
													<option selected>Lebanon</option>
												</select>
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input name="phone" class="form-control" value="<?php echo $row["phone"];?>" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
										<label>Profile</label>
										<div class="profile-upload">
											<input type="file" name="my_image" size="60">
										</div>
									</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Critical</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="critical" id="patient_active" value="1" <?php echo( $row["is_critical"]==1 ? 'checked' : '' );?>>
									<label class="form-check-label" for="patient_active">
									Yes
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="critical" id="patient_inactive" value="0" <?php echo( $row["is_critical"]==0 ? 'checked' : '' );?>>
									<label class="form-check-label" for="patient_inactive">
									No
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Edit Patient</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			






        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
                var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
</script>
</body>


<!-- add-patient24:07-->
</html>
