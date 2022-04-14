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


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Add Blog</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/tagsinput.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
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
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="php/logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
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
                        <li>
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
                                
                                <li><a class="active" href="#">Add Blog</a></li>
                                
                            </ul>
                        </li>
                     
						
                        <li>
                            <a href="change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Blog</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="php/add-blog.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Blog Title</label>
                                <input name="name" class="form-control" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>Blog Image</label>
                                <div>
                                    <input class="form-control" type="file" name="my_image" >
                                    <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png.</small>
                                </div>



                               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Blog Category</label>
                                        <select name="cat" class="select" required>
                                            <option value="">Select Category</option>
                                            
                                            <?php
                                    
                                    $sql1 = "SELECT * FROM `category`";
                                    $stmt1 = $connection->prepare($sql1);
                                    $stmt1->execute();
                                    $result = $stmt1->get_result();
                                    while($row = $result->fetch_assoc()) {
                                    
                                        ?>
                                        <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                                        
                                <?php
                                    }
                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="form-group">
                                <label>Blog Description</label>
                                <textarea name="desc" cols="30" rows="6" class="form-control" required></textarea>
                            </div>
                           
                          
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Publish Blog</button>
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
    <script src="assets/js/tagsinput.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- add-blog23:57-->
</html>