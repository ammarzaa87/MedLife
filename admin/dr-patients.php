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
    <title>Patients</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?php echo $row["first_name"]?></span>
                    </a>
					<div class="dropdown-menu">
                    <a class="dropdown-item" href="dr-change-password.php">Change Password</a>
                    <a class="dropdown-item" href="php/dr-logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
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
                        <li>
                            <a href="dr-pannel.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						
                        <li class="active">
                            <a href=""><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                   
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Address</th>
										<th>Phone</th>
										<th>SSN</th>
										<th>Medical File</th>
									</tr>
								</thead>
								<tbody>
                               <?php
                                    
                                $sql1 = "SELECT * FROM `patients`";
                                $stmt1 = $connection->prepare($sql1);
                                $stmt1->execute();
                                    $result = $stmt1->get_result();
                                    while($row = $result->fetch_assoc()) {
                                                    
                                    $dateOfBirth = $row["birth"];;
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                    $age = $diff->format('%y');
           
                                        
                                        ?>
									<tr>
										<td><img width="28" height="28" src="images/<?php echo $row['profile'];?>" class="rounded-circle m-r-5" alt=""><?php echo $row["fname"]," ", $row["lname"];?></td>
										<td><?php echo $age;?></td>
										<td><?php echo $row["address"];?></td>
										<td><?php echo $row["phone"];?></td>
										<td><?php echo $row["ssn"];?></td>
										<td><a href="dr-medfile.php?ssn=<?php echo $row["ssn"];?>"><span class="custom-badge status-green">Medical File</span></a></td>
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- patients -->
</html>