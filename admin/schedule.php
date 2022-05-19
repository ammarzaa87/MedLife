<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['a_id'])){
    header("Location: index.php");
    die();
}
if(isset($_GET['id'])) {
    $dr_id=$_GET['id'];
}else{
    $dr_id=0;
}


?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Doctor Schedule</title>
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
                        <li class="active">
                            <a href=""><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                       
						
					
						
						
						 <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blogs.php">Blogs</a></li>
                                
                                <li><a href="add-blog.php">Add Blog</a></li>
                                
                            </ul>
                        </li>
                     
						
                        <li>
                            <a href="change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                      
                    </ul>
                </div>
            </div>
        </div>
        <input type="hidden" id="tid">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                    <?php
					
					$sql1 = "SELECT * FROM `doctors` where id=$dr_id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 if($row = $result->fetch_assoc()) {
                        ?>
                        <h4 class="page-title"><?php echo $row["first_name"]," ", $row["last_name"],"'s";?> Schedule</h4>
                        <?php
                     }
                     else{
                        ?>
                        <h4 class="page-title">Schedule</h4>
                        <?php
                     }
                     
						 ?>
                        
                        <select name="doctor" id="dr" class="select" required>
											<option value="">Select Doctor</option>

                                            <?php
                                    
                                        $sql1 = "SELECT * FROM `doctors`";
                                        $stmt1 = $connection->prepare($sql1);
                                        $stmt1->execute();
                                        $result = $stmt1->get_result();
                                        while($row = $result->fetch_assoc()) {
                                        
                                            ?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["first_name"]," ", $row["last_name"];?></option>
											
                                    <?php
                                        }
                                    ?>
										</select>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-schedule.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>
                <br>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Department</th>
										<th>Available Days</th>
										<th>Available Time</th>
										
										<th class="text-right">Action</script></th>
									</tr>
								</thead>
								<tbody>
                                <?php
					$date= date('y-m-d');
                    $sql1 = "SELECT H.id,D.first_name, D.last_name,D.speciality,H.date,H.timing_id,T.fromm,T.too FROM has_time AS H, 
                    doctors AS D, timing AS T WHERE H.doctor_id=D.id AND H.timing_id=T.id AND D.id=$dr_id AND H.date>='$date' ORDER BY H.date,H.timing_id;";
                    $stmt1 = $connection->prepare($sql1);
                    $stmt1->execute();
                     $result = $stmt1->get_result();
                     while($row = $result->fetch_assoc()) {
                       
                         
                         ?>
									<tr>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""><?php echo $row['first_name']," ",$row['last_name'];?></td>
										<td><?php echo $row['speciality'];?></td>
										<td><?php echo date("d-m-Y", strtotime($row["date"]));?></td>
										<td><?php echo $row["fromm"]." - ".$row["too"];?></td>
										
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-schedule.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" data-role="delete" data-toggle="modal" data-id="<?php echo $row['id'];?>" data-target="#delete_time" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
                <?php
					}
				   ?>

								</tbody>
							</table>
						</div>
                </div>
                </div>
            </div>



            



        </div>
        <div id="delete_time" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this time?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" id="delete" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
    $("#dr").change(function () {
        
		window.location.replace("schedule.php?id="+$('#dr').val());
	});

    $(document).on('click','a[data-role=delete]',function(){
		var id = $(this).data('id');
		$('#tid').val(id);
		
	})
    $(document).on('click','#delete',function(){
	//alert($(this).data('id'));
	var id = $('#tid').val();
   location.replace("php/delete-schedule.php?sched_id="+id)
});
});
    </script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- schedule23:21-->
</html>