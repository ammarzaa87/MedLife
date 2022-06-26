<?php
session_start();
include "php/connection.php";
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
              
			<?php
					$id=$_SESSION['d_id'];
					$sql1 = "Select * from doctors where id=$id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span><?php echo $row["first_name"]?></span>
                    </a>
					<div class="dropdown-menu">
						
						<a class="dropdown-item" href="dr-change-password.php">Change Password</a>
						<a class="dropdown-item" href="php/dr-logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                   
                    <a class="dropdown-item" href="dr-change-password.php">Change Password</a>
                    <a class="dropdown-item" href="php/dr-logout.php">Logout</a>
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
				<?php
					$dr_id= $_SESSION['d_id'];
					$sql1 = "Select (select count(*) from patients) as count1, (select count(*) from appointments where dr_id=$dr_id) as count2,
					(select count(*) from appointments where dr_id=$dr_id AND status=0) as count3,
					 (select count(*) from appointments where dr_id=$dr_id AND status=1) as count4;";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row["count1"];?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3><?php echo $row["count2"];?></h3>
								<span class="widget-title1">Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row["count3"];?></h3>
                                <span class="widget-title3">Done <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $row["count4"];?></h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
		
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Today's Appointments</h4> <a href="dr-appointments.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
										
										
										
										<?php
                            $d_id = $_SESSION['d_id'];
							$date= date('y-m-d');
                            $sql1 = "SELECT A.id,A.time_id, D.first_name,D.last_name,D.speciality,P.ssn,P.fname,P.address,P.lname,P.birth,T.fromm,T.too,A.date, A.status
                            FROM appointments AS A, patients AS P, timing AS T , doctors AS D WHERE A.patient_ssn=P.ssn
                             AND A.time_id=T.id AND A.dr_id=D.id AND A.dr_id=$d_id AND A.date='$date' AND A.status=1 ORDER BY A.time_id limit 4;";
                            $stmt1 = $connection->prepare($sql1);
                            $stmt1->execute();
                            $result = $stmt1->get_result();
                            while($row = $result->fetch_assoc()) {
                               
                                
                         
                         ?>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.html"><?php echo $row["fname"]," ", $row["lname"];?> <span><?php echo $row["address"]?></span></a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. <?php echo $row["first_name"]," ", $row["last_name"];?></p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p><?php echo $row["fromm"]," ", $row["too"];?></p>
												</td>
												<td class="text-right">
													<a href="dr-medfile.php?ssn=<?php echo $row["ssn"]?>" class="btn btn-outline-primary take-btn">Take up</a>
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
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="dr-patients.php" class="btn btn-primary float-right">View all</a>
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
													<h2><a href="dr-medfile.php?ssn=<?php echo $row["ssn"];?>"><?php echo $row["fname"]," ", $row["lname"];?> <span><?php echo $row["address"];?></span></a></h2>
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