<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
    <style>
		.reg
		{
	      background-color: #0072ff7a;
          color: white;
	    }
	</style>	
  </head>
  <body>

    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 200px;">
            <div class="login-panel panel">
                <div class="panel-heading" style="background: #6f42c1;">
                    <h1 class="panel-title">Login</h1>
                </div>
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

                <div class="panel-body">
                    <form id="loginForm" role="form" method="post" action="<?php echo base_url('user'); ?>">
                        <fieldset>
                            <div class="form-group"  >
                                <input id="username" class="form-control" placeholder="Mobile No" name="mobile" type="mobile" autofocus required>
                            </div>
                            <div class="form-group">
                                <input id="password" class="form-control" placeholder="Password" name="user_password" type="password" value="" required>
                            </div>
                                <input id="submit" class="btn btn-lg btn-block btn btn-pink btn-rounded waves-effect waves-light" type="submit" value="login" name="login" >
                                <a href="<?php echo base_url('user/register'); ?>" class="reg btn btn-lg btn-block btn btn-blue btn-rounded waves-effect waves-light">Register</a>
                        </fieldset>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
