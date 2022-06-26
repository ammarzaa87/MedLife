<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['u_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <?php

  $pid= $_SESSION['u_id'];
					
				   $sql1 = "SELECT * FROM `patients` where id=$pid";
				   $stmt1 = $connection->prepare($sql1);
				   $stmt1->execute();
					$result = $stmt1->get_result();
					$row = $result->fetch_assoc();
						
						
						?>

  <div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text"><?php echo $row["phone"];?></span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text"><?php echo $row["email"];?></span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><a href="php/logout.php" class="mr-3">Log Out</a></p>
					    </div>
						
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="home.php">MedLife</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="home.php#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="home.php#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="home.php#department-section" class="nav-link"><span>Department</span></a></li>
	          <li class="nav-item"><a href="home.php#doctor-section" class="nav-link"><span>Doctors</span></a></li>
	          <li class="nav-item"><a href="home.php#blog-section" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
			 
			  <li class="nav-item cta mr-md-2"><a href="php/logout.php" class="nav-link">Log Out</a></li>
	          
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
	 
	
      <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-4">
            <h1 class="mb-3 bread">Medical File</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My File <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

  
      <div class="main-wrapper">
            <div class="content">
            
            
                <?php
					$id=$_SESSION['u_id'];
					$sql1 = "Select * from patients where id=$id";
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
                                        <a href="#"><img class="avatar" src="../admin/images/<?php echo $row['profile'];?>" alt=""></a>
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
						
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div id="file" class="col-md-12">
 
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
				const response = await fetch('https://med-lifee.000webhostapp.com/api/get.php?ssn=<?php echo $row['ssn'];?>');
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

<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>

    
  </body>


</html>