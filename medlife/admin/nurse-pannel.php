<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['n_id'])){
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
    <title>Critical Patients</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
					$id=$_SESSION['n_id'];
					$sql1 = "Select * from nurses where id=$id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?php echo $row["fname"]?></span>
                    </a>
					<div class="dropdown-menu">
                    <a class="dropdown-item" href="nurse-change-password.php">Change Password</a>
						<a class="dropdown-item" href="php/n-logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="nurse-change-password.php">Change Password</a>
                    <a class="dropdown-item" href="php/n-logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                        <li class="menu-title">Main</li>
                       
						
                        
						
					
						
                        <li class="active">
                            <a href=""><i class="fa fa-calendar"></i> <span>Critical Patients</span></a>
                        </li>
                       
                       
					
                     
						
                        <li>
                            <a href="nurse-change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                     
                       
                    </ul>
                </div>
            </div>
        </div>
       
 





<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Critical Patients</h4>
                    </div>
                    
                </div>
				<div class="row doctor-grid">
				
				<?php
					
				   $sql1 = "SELECT * FROM `patients` where is_critical=1";
				   $stmt1 = $connection->prepare($sql1);
				   $stmt1->execute();
					$result = $stmt1->get_result();
					while($row = $result->fetch_assoc()) {
						
						
						?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" ><img alt="" src="images/<?php echo $row['profile'];?>"></a>
                            </div>
                           
                                   
                                  
                            
                            <h4 class="doctor-name text-ellipsis"><?php echo $row["fname"]," ", $row["lname"];?></a></h4>
                            <div class="doc-prof"><?php echo date("d-m-Y", strtotime($row["birth"]));?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row["address"];?>
                            </div>
                            <button  type="button" class="dropdown-item" data-role="update" data-toggle="modal" data-id="<?php echo $row['ssn'];?>" data-target="#add-critical"><i class="fa fa-pencil m-r-5"></i>Add Information</button>
                          
                        </div>
                        
                    </div>
                   <?php
					}
				   ?>
                 
                
                </div>
				
            </div>
       
        </div>
        <div id="add-critical" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
            
				<div class="modal-content">
					<div class="modal-body text-center">
                    <form method="POST" action="php/monitoring.php">
						<img src="assets/img/logo-dark.png" alt="" width="50" height="46">
                        <h1></h1>
                        <br>
                        <div class="col-sm-12">
                                    <div class="form-group">
                                        
                                    <input type="hidden" id="ssn" name="ssn" class="form-control" readonly>
                                    </div>
                                </div>
                        <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Pressure <span class="text-danger">*</span></label>
                                        <input name="press" class="form-control" type="text" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Diabetes <span class="text-danger">*</span></label>
                                        <input name="diab" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Heart Beat <span class="text-danger">*</span></label>
                                        <input name="heart" class="form-control" type="text" required>
                                    </div>
                                </div>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button id="butsave" type="submit" class="btn btn-primary">Add</button>
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
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
	$(document).on('click','button[data-role=update]',function(){
		var id = $(this).data('id');
        $('#ssn').val(id);
		
		
	})

});

$('#butsave').on('click', function() {
    var postData = new FormData($("#modal_form_id")[0]);
    var ssn = $('#ssn').html();
    

     
	});

</script>
</body>


<!-- appointments23:20-->
</html>