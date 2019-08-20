<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Form by Product</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css'); ?>">
    <style>
       .form-group select{
			width: 100%;
			webkit-appearance:set !important;
			display: block;
			border: none;
			border-bottom: 1px solid $grey-light;
			padding: 6px 30px;
			font-family: Poppins;
			box-sizing: border-box;
			@include input-placeholder($grey-light);
			&:focus {
				border-bottom: 1px solid $black-color;
				@include input-placeholder($black-color);
			}
      }
      .error{
		      color:red;
		  }
    </style>
</head>
<body>

    <div class="main" style="padding-top:15px !important;">

        <!-- Sign up form -->
        <section class="signup" style="margin-bottom:0px !important;">
            <div class="container">
                <div class="signup-content" style="margin-bottom:0px !important;">
                    <div class="signup-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo base_url('user/register_user'); ?>">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name"/>
                            </div>
                           
                             <div class="form-group">
                                <label for="mobileno"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="mobileno" id="mobileno" placeholder="Mobile No"/>
                            </div>
                           
                             <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="gmail" id="gmail" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="cpassword"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="companyname"><i class="zmdi zmdi-local-store"></i></label>
                                <input type="text" name="companyname" id="companyname" placeholder="Company/Shop Name"/>
                            </div>
                            
                             <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                            
                        </form>
                        Already Registered! Please<a href="<?php echo base_url('user'); ?>"> Click Here </a>to Sign In.
                    </div>
                    
                    
                          
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url('assets/login/images/signup-image.jpg'); ?>" alt="sing up image"></figure>
                       
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        

    </div>

    <!-- JS -->
     
    <script src="<?php echo base_url('assets/login/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<!--
    <script src="<?php echo base_url('assets/vendors/jquery/jquery.validation.min.js');?>"></script>
-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/country.js"></script>
    <script src="<?php echo base_url();?>assets/js/registervalidation.js"></script>
    <script src="<?php echo base_url('assets/login/js/main.js'); ?>"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
