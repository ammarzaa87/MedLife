<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['l_id'])){
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
    <title>Lab Tests</title>
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
						<a class="dropdown-item" href="php/l-logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="php/l-logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                        <li class="menu-title">Main</li>
                       
						
                        
						
					
						
                        <li class="active">
                            <a href=""><i class="fa fa-calendar"></i> <span>Lab Tests</span></a>
                        </li>
                        
                        <li>
                            <a href="dr-change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                       
                     
                       
                    </ul>
                </div>
            </div>
        </div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
    <form enctype="multipart/form-data" id="data"  method="POST" action="php/add-test.php">
      <div class="modal-body">
      <label>Test Number</label>
     <input type="ssn" id="ssn" name="id" class="form-control" readonly>
      </div>
     
	  <div class="modal-body">
      <input class="form-control" type="file" name="my_file" id="my_file" required>
        <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png.</small>
    
	  </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="butsave" type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>

    </div>
  </div>
</div>


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lab Tests</h4>
                    </div>
                    
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
                      
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Lab Test ID</th>
										<th>Patient Name</th>
										<th>Age</th>
                                        <th>Test Name</th>
										<th>Test Date</th>
										
										<th>Add</th>
									</tr>
								</thead>
                                
								<tbody>
                                <?php
					
				   $sql1 = "SELECT D.id,D.date, P.fname,P.lname,P.birth,L.name 
                   FROM dolab AS D,patients AS P, labtests AS L WHERE D.labtest_id=L.id AND D.patient_ssn=P.ssn AND D.status=1;";
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
										<td>TEST<?php echo $row["id"];?></td>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row["fname"]," ", $row["lname"];?></td>
										<td><?php echo $age;?></td>
										
										<td><?php echo $row["name"];?></td>
										<td><?php echo date("d-m-Y", strtotime($row["date"]));?></td>
										
										
										<td><button type="button" class="btn-primary" data-role="update" data-toggle="modal" data-id="<?php echo $row["id"];?>" data-target="#AddModal">Add File</button></td>
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
    <script src="assets/js/app.js"></script>
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