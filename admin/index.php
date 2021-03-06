<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="php/login.php" method="post" class="form-signin">
					
						<div class="account-logo">
                            <img src="assets/img/logo-dark.png" alt="">
                        </div>
						<?php
					/* If email is already taken, print a danger alert that tells "email is already taken"*/
                                    if (!empty($_SESSION["flash"])){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php
                                    $x = $_SESSION["flash"];
                                    echo $x;
                                    $_SESSION["flash"] = "";
                                    
                                
                                    ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="password" autofocus="" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
						
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
												<label>User Type</label>
												<select name="major" class="form-control select" required>
													
													<option value="1">Admin</option>
													<option value="2">Doctor</option>
													<option value="3">Lab Tech</option>
                                                    <option value="4">Radio Tech</option>
                                                    <option value="5">Nurse</option>
                                                    
												</select>
						</div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>

                      
                       
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/select2.min.js"></script>
</body>


<!-- login23:12-->
</html>