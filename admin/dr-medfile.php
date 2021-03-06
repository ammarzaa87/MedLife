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
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Medical File</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="dr-addpresc.php?ssn=<?php echo $_GET['ssn'];?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>Add To File</a>
                        <a href="dr-asktest.php?ssn=<?php echo $_GET['ssn'];?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>Ask For Test</a>
                    </div>

                    

                </div>
                <?php
					$ssn=$_GET['ssn'];
					$sql1 = "Select * from patients where ssn=$ssn";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="images/<?php echo $row['profile'];?>" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $row["fname"]," ", $row["lname"];?></h3>
                                                <small class="text-muted"></small>
                                                <div class="staff-id">SSN : <?php echo $row["ssn"];?></div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php echo $row["phone"];?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php echo $row["email"];?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text"><?php echo date("d-m-Y", strtotime($row["birth"]));?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php echo $row["address"];?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"><?php echo $row["gender"];?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
				<div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Medical File</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Lab Tests</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Radio Tests</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab4" data-toggle="tab">Pending Medical Tests</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div id="file" class="col-md-12">
 
                    </div>
                </div>
						</div>
                        <div class="tab-pane" id="bottom-tab2">
                        <?php
					
                    $sql1 = "SELECT * FROM add_lab_res AS L, labtests AS T WHERE L.labtest_id=T.id AND patient_ssn=$ssn order by date Desc;";
                    $stmt1 = $connection->prepare($sql1);
                    $stmt1->execute();
                     $result = $stmt1->get_result();
                     while($row = $result->fetch_assoc()) {
                         
                         
                         ?>
                        <div class="card-box">
                           
                            <div class="experience-box">
                                <ul class="experience-list">
                                   
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?php echo $row["name"];?></a>
                                                <a class="btn btn-primary btn-rounded float-right" target="_blank" href="tests/<?php echo $row["file"];?>">View Test</a>
                                                <span class="time"><?php echo date("d-m-Y", strtotime($row["date"]));?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php
					}
				   ?>


                      


						</div>
                        <div class="tab-pane" id="bottom-tab3">
							

                        
                        <?php
					
                    $sql1 = "SELECT * FROM add_radio_res AS L, radios AS R WHERE L.radio_id=R.id AND patient_ssn=$ssn order by date Desc;";
                    $stmt1 = $connection->prepare($sql1);
                    $stmt1->execute();
                     $result = $stmt1->get_result();
                     while($row = $result->fetch_assoc()) {
                         
                         
                         ?>
                        <div class="card-box">
                           
                            <div class="experience-box">
                                <ul class="experience-list">
                                   
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?php echo $row["name"];?></a>
                                                <a class="btn btn-primary btn-rounded float-right" target="_blank" href="tests/<?php echo $row["file"];?>">View Test</a>
                                                <span class="time"><?php echo date("d-m-Y", strtotime($row["date"]));?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php
					}
				   ?>

						</div>
                        <div class="tab-pane" id="bottom-tab4">
							

                        
                      
                        <div class="card-box">
                           
                            <div class="experience-box">
                            <h3 class="card-title">Lab Tests</h3>
                                <ul class="experience-list">
                                <?php
					
                    $sql1 = "SELECT * FROM dolab AS D, labtests AS L WHERE D.labtest_id=L.id AND D.status=1 AND patient_ssn=$ssn order by date;";
                    $stmt1 = $connection->prepare($sql1);
                    $stmt1->execute();
                     $result = $stmt1->get_result();
                     while($row = $result->fetch_assoc()) {
                         
                         
                         ?>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?php echo $row["name"];?></a>
                                               
                                                <span class="time"><?php echo date("d-m-Y", strtotime($row["date"]));?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
					}
				   ?>
                                </ul>
                            </div>
                        </div>


                        <div class="card-box">
                           
                            <div class="experience-box">
                            <h3 class="card-title">Radio Tests</h3>
                                <ul class="experience-list">
                                <?php
					
                    $sql1 = "SELECT * FROM doradio AS D, radios AS L WHERE D.radio_id=L.id AND D.status=1 AND patient_ssn=$ssn order by date;";
                    $stmt1 = $connection->prepare($sql1);
                    $stmt1->execute();
                     $result = $stmt1->get_result();
                     while($row = $result->fetch_assoc()) {
                         
                         
                         ?>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?php echo $row["name"];?></a>
                                               
                                                <span class="time"><?php echo date("d-m-Y", strtotime($row["date"]));?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
					}
				   ?>
                                </ul>
                            </div>
                        </div>
                     


                          
                            
                            </div>
						
						
					</div>
				</div>
            </div>



       
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
			async function fetchAPI(){
				const response = await fetch('https://med-lifee.000webhostapp.com/api/get.php?ssn=<?php echo $_GET['ssn'];?>');
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const results = await response.json();
				return results; 
			}
			
           
			$(document).ready(function() {
                
				fetchAPI().then(results => {
                    
					buildTable(results);
					
				}).catch(error => {
					console.log(error.message);
				})
			});
	
		</script>

<script>


function buildTable(data){
    var table = document.getElementById('file')

    for (var i = 0; i < data.length; i++){
        var row = ` <div  class="card-box">
        <h3 class="card-title">${data[i].hospital_name}</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Diagnosis</a>
                                                <div>${data[i].overall_diagnosis}</div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Prescription</a>
                                                <div>${data[i].prescription}</div>
                                                <span class="time">${data[i].date}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            </div>`
        table.innerHTML += row


    }
}

</script>



    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


</html>