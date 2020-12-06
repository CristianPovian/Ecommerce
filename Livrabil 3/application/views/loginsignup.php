<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/loginsignup.css" />
    <title>Pink Friday - UVT 2020</title>

  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Sign In BEGIN -->
          <form action="#" class="sign-in-form" method = "post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = "username" id = "sign-in-username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "password" id = "sign-in-password"/>
            </div>
            <input type="button" value="Login" class="btn solid" id = "sign-in-submit"/>
            <!-- 
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
             -->
          </form>
          <!-- Sign In END-->
          <!-- Sign Up BEGIN -->
          <form action="#" class="sign-up-form" method = "post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input  type="text"  placeholder="Username" name = "sign_up_username" id = "sign-up-username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name = "email" placeholder="Email" name = "sign_up_email" id = "sign-up-email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "sign_up_password" id = "sign-up-password"/>
            </div>
			      <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name = "sign_up_repeat_password" id = "sign-up-confirm-password"/>
            </div>
            <input type="button" class="btn" value="Sign up" id = "sign-up-submit"/>
            <!--
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            -->
          </form>
          <!-- Sign Up END -->
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Create an account for free
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Input your credentials
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>JavaScript/app.js"></script>
  </body>
</html>
