<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets/style0.css" />
      
    <title>Sign in & Sign up</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="php/login.php" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="ssn" type="text" placeholder="SSN" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
           
          </form>
		  
		   
		  
		   

          <form action="php/login.php" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="ssn" type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="email" type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="pass" type="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn" value="Sign up" />
          
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
            YOUR HEALTH IS SO IMPORTANT, AND SHOULD BE A PRIORITY IN YOUR LIFE. A LITTLE CARE EACH DAY GOES A LONG WAY.
             IF YOU NEGLECT YOUR HEALTH, YOU WILL HAVE NO CHOICE BUT TO ADDRESS IT, AT SOME POINT. HOPEFULLY, IT WON'T BE TOO LATE!
            </p>
          
			<button class="btn transparent" id="sign-up-btn">
              Sign Up
            </button>
			
          </div>
          <img src="assets/undraw_medical_care_movn.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign In
            </button>
			
          </div>
          <img src="assets/undraw_doctor_kw-5-l.svg" class="image" alt="" />
        </div>
      </div>
    </div>
 <script src="assets/jjj.js"></script>
    
  </body>
</html>
