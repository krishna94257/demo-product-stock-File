<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css'); ?>">
</head>
<body>

    <div class="main" style="padding-top:50px !important;">

        <!-- Sign up form -->
       

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url('assets/login/images/signin-image.jpg'); ?>" alt="sing up image"></figure>
<!--
                        <a href="#" class="signup-image-link">Create an account</a>
-->
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php
                  $success_msg= $this->session->flashdata('success_msg');
                  $error_msg= $this->session->flashdata('error_msg');
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo base_url('user'); ?>">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="mobile" id="mobile" placeholder="Mobile No"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="user_password" id="user_password" placeholder="Password"/>
                            </div>
<!--
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
-->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                <a href="<?php echo base_url('user/register'); ?>" class="form-submit">Register</a>
                            </div>
                        </form>
<!--
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
-->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
<!--
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
-->
      <script src="<?php echo base_url('assets/login/vendor/jquery/jquery.min.js'); ?>"></script>
    
    <script src="<?php echo base_url('assets/login/js/main.js'); ?>"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
