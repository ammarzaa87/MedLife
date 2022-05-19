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
    <title>Blogs</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
                                <li><a class="active" href="">Blogs</a></li>
                                <li><a  href="add-blog.php">Add Blog</a></li>
                                
                            </ul>
                        </li>
                     
						
                        <li>
                            <a href="change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <input type="hidden" id="blid">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Blog</h4>
                    </div>
                    <div class="col-sm-4 col-8 text-right m-b-30">
                        <a class="btn btn-primary btn-rounded float-right" href="add-blog.php"><i class="fa fa-plus"></i> Add Blog</a>
                    </div>
                </div>
                <div class="row">

                <?php
					
				   $sql1 = "SELECT * FROM `blog`";
				   $stmt1 = $connection->prepare($sql1);
				   $stmt1->execute();
					$result = $stmt1->get_result();
					while($row = $result->fetch_assoc()) {
						
						
						?>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="#"><img class="img-fluid" src="images/<?php echo $row['image'];?>" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="blog-details.html"><?php echo $row["name"];?></a></h3>
                                <p> <?php echo $row["description"];?></p>
                                
                                <div class="blog-info clearfix">
                                    
                                    <div class="post-right"><a class="dropdown-item" data-role="delete" data-toggle="modal" data-id="<?php echo $row['id'];?>" data-target="#delete_blog" ><i class="fa fa-trash-o m-r-5"></i> Delete</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <?php
					}
				   ?>
                    
                </div>
            </div>




            <div id="delete_blog" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Blog?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" id="delete" class="btn btn-danger">Delete</button>
						</div>
					</div>
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
    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
	$(document).on('click','a[data-role=delete]',function(){
		var id = $(this).data('id');
		$('#blid').val(id);
		
	})
    $(document).on('click','#delete',function(){
	//alert($(this).data('id'));
	var id = $('#blid').val();
   location.replace("php/delete-blog.php?blog_id="+id)
});

});
</script>
</body>


<!-- blog23:51-->
</html>