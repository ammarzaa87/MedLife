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
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>MedLife</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                
               
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
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
                        <li class="active">
                            <a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
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
		<?php
					
					$sql1 = "Select (select count(*) from doctors) as count1, (select count(*) from patients) as count2,
					(select count(*) from nurses) as count3,
					 (select count(*) from labtech) as count4, (select count(*) from radiotech) as count5;";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">

								<h3><?php echo $row["count1"];?></h3>
								<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
				
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row["count2"];?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
				
					
					
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row["count3"];?></h3>
                                <span class="widget-title3">Nurses <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row["count4"]+$row["count5"];?></h3>
                                <span class="widget-title4">Technicians <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												
											</tr>
										</thead>
										<tbody>
										<?php
					
					$sql1 = "SELECT A.id, D.first_name,D.last_name,P.fname,P.lname,P.address,P.ssn,T.fromm,T.too,A.date
					FROM appointments AS A, patients AS P, timing AS T , doctors AS D WHERE A.patient_ssn=P.ssn
					 AND A.time_id=T.id AND A.dr_id=D.id ORDER BY A.id DESC LIMIT 5";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 while($row = $result->fetch_assoc()) {
						 
						 
						 ?>
										
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="patient_profile.php?ssn=<?php echo $row["ssn"];?>"><?php echo $row["fname"]," ", $row["lname"];?> <span><?php echo $row["address"];?></span></a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. <?php echo $row["first_name"]," ", $row["last_name"];?></p>
												</td>
												<td>
													<h5 class="time-title p-0">Date</h5>
													<p><?php echo date("d-m-Y", strtotime($row["date"]));?></p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p><?php echo $row["fromm"]," ", $row["too"];?></p>
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
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Doctors</h4>
							</div>
                            <div class="card-body">
                                <ul class="contact-list">
                                   
                                 
                                 
								<?php
					
					$sql1 = "SELECT * FROM `doctors`";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 while($row = $result->fetch_assoc()) {
						 
						 
						 ?>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a  title="Richard Miles"><img src="images/<?php echo $row['profile'];?>" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?php echo $row["first_name"]," ", $row["last_name"];?></span>
                                                <span class="contact-date"><?php echo $row["speciality"];?></span>
                                            </div>
                                        </div>
                                    </li>
									<?php
					}
				   ?>

                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.php" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
										
										<?php
                                    
									$sql1 = "SELECT * FROM `patients` ORDER BY id DESC LIMIT 4";
									$stmt1 = $connection->prepare($sql1);
									$stmt1->execute();
										$result = $stmt1->get_result();
										while($row = $result->fetch_assoc()) {
														
											?>	
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="images/<?php echo $row['profile'];?>" alt=""> 
													<h2><a href="patient_profile.php?ssn=<?php echo $row["ssn"];?>"><?php echo $row["fname"]," ", $row["lname"];?> <span><?php echo $row["address"];?></span></a></h2>
												</td>
												<td><?php echo $row["email"];?></td>
												<td><?php echo $row["phone"];?></td>
												<td><button class="btn btn-primary btn-primary-<?php echo( $row["is_critical"]==1 ? 'four' : 'three' );?> float-right"><?php echo( $row["is_critical"]==1 ? 'Critical' : 'Not Critical' );?></button></td>
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
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Hospital Management</h4>
						</div>
						<div class="bar-chart">
							<div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>
								
								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div>
							<div class="chart clearfix">
								<div class="item">
									<div class="bar">
										<span class="percent">16%</span>
										<div class="item-progress" data-percent="16">
											<span class="title">OPD Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">71%</span>
										<div class="item-progress" data-percent="71">
											<span class="title">New Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">82%</span>
										<div class="item-progress" data-percent="82">
											<span class="title">Laboratory Test</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">67%</span>
										<div class="item-progress" data-percent="67">
											<span class="title">Treatment</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">30%</span>									
										<div class="item-progress" data-percent="30">
											<span class="title">Discharge</span>
										</div>
									</div>
								</div>
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
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>



</html>