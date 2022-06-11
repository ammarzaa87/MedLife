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
    <title>MedLife</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="#department-section" class="nav-link"><span>Department</span></a></li>
	          <li class="nav-item"><a href="#doctor-section" class="nav-link"><span>Doctors</span></a></li>
	          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
			  <li class="nav-item cta mr-md-2"><a href="file.php" class="nav-link">Medical File</a></li>
			  <li class="nav-item cta mr-md-2"><a href="php/logout.php" class="nav-link">Log Out</a></li>
	          
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
	  
	  <section class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 pt-5 ftco-animate">
          	<div class="mt-5">
          		<span class="subheading">Welcome to MedLife</span>
	            <h1 class="mb-4">We are here <br>for your Care</h1>
	            <p class="mb-4">Hospitals are only an intermediate stage of civilization, never intended at all even to take in the whole sick population.</p>
	            <p><a href="#app" class="btn btn-primary py-3 px-4">Make an appointment</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

		


		<section  class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
			<div class="container">
        <div class="row d-flex">
	        <div class="col-md-7 py-5">
	        	<div class="py-lg-5">
		        	<div class="row justify-content-center pb-5">
			          <div class="col-md-12 heading-section ftco-animate">
			            <h2 class="mb-3">Our Services</h2>
			          </div>
			        </div>
			        <div class="row">
			        	<div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-ambulance"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Emergency Services</h3>
			                <p>Though force can protect in emergency, only justice, fairness, consideration and cooperation can finally lead men to the dawn of eternal peace.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-doctor"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Qualified Doctors</h3>
			                <p>Everything that irritates us about others can lead us to an understanding of ourselves.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-stethoscope"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Outdoors Checkup</h3>
			                <p>The aim of medicine is to prevent disease and prolong life, the ideal of medicine is to eliminate the need of a physician.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-24-hours"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">24 Hours Service</h3>
			                <p>There are only 24 hours in each day. You can't make it 25 or 26. You just have to plan your activities very well.</p>
			              </div>
			            </div>      
			          </div>
			        </div>
			      </div>
		      </div>
		      <div id="app" class="col-md-5 d-flex">
	        	<div class="appointment-wrap bg-white p-4 p-md-5 d-flex align-items-center">
		        	<form action="php/add-appointment.php"  method="post" class="appointment-form ftco-animate">
		        		<h3>Book an Appointment</h3>
		    				
		    				<div class="">
		    					<div class="form-group">
			    					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="spec" id="spec" class="form-control" required>
	                      	<option value="">Select Your Services</option>
							  <option>Allergology</option>
							  <option>Anatomic Pathology</option>
								<option>Anesthesia</option>
                                  <option>Cardiology</option>
                                 <option>Cardiothoracic Surgery</option>
                                 <option>Clinical Psychology</option>
                                <option>Dermatology</option>
                                 <option>Dietitian</option>
                                 <option>E.N.T.</option>
                                 <option>Emergency Medicine</option>
                                 <option>Endocrinology</option>
                                 <option>Family Medicine</option>
                                 <option>Gastroenterology</option>
                                 <option>General Surgery</option>
                                 <option>Neurology</option>
                                 <option>Radiology</option>
                                 <option>Urology</option>
	                      </select>
	                    </div>
			              </div>
			    				</div>

								<div class="form-group">
			    					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="doctor" id="dr" class="form-control" required>
	                      	<option value="">Select Doctor</option>
							 
	                      </select>
	                    </div>
			              </div>
			    				</div>
		    					
		    				</div>
		    				<div class="">
			    				<div class="form-group">
			    					<div class="input-wrap">
			            		
			            		<input name="date" id="date" type="date" class="form-control" value="0-0-0" placeholder="Date" required>
		            		</div>
			    				</div>
								<div class="form-group">
			    					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="time" id="time" class="form-control" required>
	                      	<option value="">Select Timing</option>
							 
	                      </select>
	                    </div>
			              </div>
			    				</div>
		    				</div>
		    				<div class="">
		    					<div class="form-group">
			              <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
			            </div>
			            <div class="form-group">
			              <input type="submit" value="Appointment" class="btn btn-secondary py-3 px-4">
			            </div>
		    				</div>
		    			</form>
		    		</div>
	        </div>
		    </div>
			</div>
		</section>

    <section class="ftco-intro img" style="background-image: url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Your Health is Our Priority</h2>
						<p>YOUR HEALTH IS SO IMPORTANT, AND SHOULD BE A PRIORITY IN YOUR LIFE. A LITTLE CARE EACH DAY GOES A LONG WAY. IF YOU NEGLECT YOUR HEALTH, YOU WILL HAVE NO CHOICE BUT TO ADDRESS IT, AT SOME POINT. HOPEFULLY, IT WON'T BE TOO LATE! </p>
						
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb" id="department-section">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
    			<div class="col-md-4 d-flex">
    				<div class="img img-dept align-self-stretch" style="background-image: url(images/dept-1.jpg);"></div>
    			</div>

    			<div class="col-md-8">
    				<div class="row no-gutters">
    					<div class="col-md-4">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Neurology</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Surgical</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Dental</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    					</div>

    					<div class="col-md-4">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Opthalmology</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Cardiology</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Traumatology</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    					</div>

    					<div class="col-md-4">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Nuclear Magnetic</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>X-ray</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a>Cardiology</a></h3>
    								<p>Always laugh when you can, it is cheap medicine.</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
		
		<section class="ftco-section" id="doctor-section">
			<div class="container-fluid px-5">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Our Qualified Doctors</h2>
            <p>There are only two sorts of doctors: those who practice with their brains, and those who practice with their tongues.</p>
          </div>
        </div>	
				<div class="row">
					
				<?php
					
				   $sql1 = "SELECT * FROM `doctors`";
				   $stmt1 = $connection->prepare($sql1);
				   $stmt1->execute();
					$result = $stmt1->get_result();
					while($row = $result->fetch_assoc()) {
						
						
						?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(../admin/images/<?php echo $row['profile'];?>);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. <?php echo $row["first_name"]," ", $row["last_name"];?></h3>
								<span class="position mb-2"><?php echo $row["speciality"];?></span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a><span class="icon-instagram"></span></a></li>
		              </ul>
		              <p><a href="#app" class="btn btn-primary">Book now</a></p>
	              </div>
							</div>
						</div>
					</div>

					<?php
					}
				   ?>

				</div>
			</div>
		</section>
		<?php
					
					$sql1 = "Select (select count(*) from doctors) as count1, (select count(*) from patients) as count2,
					(select count(*) from nurses) as count3,
					 (select count(*) from labtech) as count4, (select count(*) from radiotech) as count5;";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
		<section class="ftco-facts img ftco-counter" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-md-5 heading-section heading-section-white">
						<span class="subheading">Fun facts</span>
						<h2 class="mb-4">Over <?php print($row["count2"]);?> patients trust us</h2>
						<p class="mb-0"><a href="#app" class="btn btn-secondary px-4 py-3">Make an appointment</a></p>
					</div>
					<div class="col-md-7">
						<div class="row pt-4">
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="1">0</strong>
		                <span>Years of Experienced</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $row["count2"];?>">0</strong>
		                <span>Happy Patients</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $row["count1"];?>">0</strong>
		                <span>Number of Doctors</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $row["count3"]+$row["count4"]+$row["count5"];?>">0</strong>
		                <span>Number of Staffs</span>
		              </div>
		            </div>
		          </div>
	          </div>
					</div>
				</div>
			</div>
		</section>


		<section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Gets Every Single Updates Here</h2>
          </div>
        </div>
        <div class="row d-flex">
         

		<?php
					
				   $sql1 = "SELECT * FROM `blog`";
				   $stmt1 = $connection->prepare($sql1);
				   $stmt1->execute();
					$result = $stmt1->get_result();
					while($row = $result->fetch_assoc()) {
						
						
		?>
        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a class="block-20" style="background-image: url('../admin/images/<?php echo $row['image'];?>');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a><?php echo date(' F d, Y',strtotime($row['date']));?></a></div>
                  <div><a>Admin</a></div>
                  
                </div>
                <h3 class="heading"><a><?php echo $row['name'];?></a></h3>
                <p><?php echo $row['description'];?></p>
                
              </div>
            </div>
        	</div>


			<?php
					}
				   ?>

		

		

        </div>
      </div>
    </section>

   

    <section class="ftco-section contact-section" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Contact Us</h2>
            
          </div>
        </div>
        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>Khiara, West Beqaa, Lebanon</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://+961 71 696 574">+961 71 696 574</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:MedLife@info.com">MedLife@info.com</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a>MedLife.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row no-gutters block-9">
         

          <div class="col-md-12 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-section img" style="background-image: url(images/footer-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container-fluid px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">MedLife</h2>
              <p>Hospitals are only an intermediate stage of civilization, never intended at all even to take in the whole sick population.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
         
        
          
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Khiara, West Bekaa, Lebanon</span></li>
	                <li><a><span class="icon icon-phone"></span><span class="text">+961 71 696 574</span></a></li>
	                <li><a><span class="icon icon-envelope pr-4"></span><span class="text">MedLife@info.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
       
      </div>
    </footer>
    

  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
	  $(document).ready(function () {
    $("#spec").change(function () {
		$('#dr').empty();
		var ele = document.getElementById('dr');
		ele.innerHTML = ele.innerHTML +'<option value="">Select Doctor</option>';
		
		$('#time').empty();
		var ele = document.getElementById('time');
		ele.innerHTML = ele.innerHTML + '<option value="">Select Timing</option>';
		$('#date').val('')
    .attr('type', 'text')
    .attr('type', 'date');
			async function drfetchAPI(){
				
				const response = await fetch('php/showdr.php?spec='+$('#spec').val());
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const categresults = await response.json();
				return categresults; 
			}
				drfetchAPI().then(categresults => {
					dropdown(categresults);
					
					
				}).catch(error => {
					console.log(error.message);
				})
	

				
	function dropdown(results){
		var ele = document.getElementById('dr');
        for (var i = 0; i < results.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            ele.innerHTML = ele.innerHTML +
                '<option value="' + results[i]['id'] + '">' + results[i]['first_name'] +" "+results[i]['last_name']+ '</option>';
        }
		
		
		}
	});


	$("#dr").change(function () {
		$('#time').empty();
		var ele = document.getElementById('time');
		ele.innerHTML = ele.innerHTML + '<option value="">Select Timing</option>';
		$('#date').val('')
    .attr('type', 'text')
    .attr('type', 'date');
	});



	$("#date").change(function () {
		$('#time').empty();
		var ele = document.getElementById('time');
		ele.innerHTML = ele.innerHTML + '<option value="">Select Timing</option>';
		console.log($('#date').val());
			async function timefetchAPI(){
				
				const response = await fetch('php/showtime.php?d_id='+$('#dr').val()+'&date='+$('#date').val());
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const categresults = await response.json();
				return categresults; 
			}
				timefetchAPI().then(categresults => {
					dropdown(categresults);
					
					
				}).catch(error => {
					console.log(error.message);
				})
	

				
				function dropdown(results){
		var ele = document.getElementById('time');
        for (var i = 0; i < results.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            ele.innerHTML = ele.innerHTML +
			'<option value="' + results[i]['id'] + '">' + results[i]['fromm'] +" - "+results[i]['too']+ '</option>';
        }
		
		
		}
	});
});
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