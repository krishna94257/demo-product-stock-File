<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   select{
	     height:45px;
	   }
	.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}   
  </style>
</head>
 <?php
  $success_msg= $this->session->flashdata('success_msg');
  $error_msg= $this->session->flashdata('error_msg');
foreach($a as $detail)
{
	
  ?>   

<hr>
<div class="container bootstrap snippet" style="width: 800px !important;margin-top: 55px;">
    <div class="row">
  		<div class="col-sm-10" style="text-transform: uppercase;"><h1><?php echo $detail['user_name']; ?></h1></div>
  		<?php
  		if(empty($detail['user_logo']))
  		{
		?>
    	<div class="col-sm-2"><a href="" class="pull-right"><img title="Default logo" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a><p>Default Logo</p></div>
	  
	  <?php 
	   }
	         else
	         {
	   ?>
	  <div class="col-sm-2"><a href="" class="pull-right"><img title="Default logo" class="img-circle img-responsive" src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $detail['user_logo'];?>"></a></div>
       <?php
   }
   ?>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
			
  <form class="form" action="<?php echo base_url('user/profile'); ?>" method="post" id="register-form" enctype="multipart/form-data">       

      <div class="text-center"  >
		  <?php
  		if(empty($detail['user_profilepicture']))
  		{
			?>
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
         <?php  }
	         else
	         {
	   ?>
	       <img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $detail['user_profilepicture'];?>"  class="avatar img-circle img-thumbnail" alt="avatar">
	         <?php
   }
   ?>
        <h6>Upload your profile picture</h6>
        
       
        <input type="file" class="text-center center-block file-upload"  name="picture" id="picture">
<!--
         <button class="btn btn-success btn-block btn-upload-image" style="margin-top:2%">Upload Image</button>
-->
      </div>
        <div id="uploaded_image"></div>
      </hr><br>

               
<!--
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
-->
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
<!--
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
                <li><a data-toggle="tab" href="#settings">Home</a></li>
              </ul>
-->

          
          
            <input type="hidden" class="form-control" value="<?php echo $detail['user_id']; ?>" name="id" id="id" placeholder="first name">
              
            <!--/tab-pane-->
             <!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" tabindex="1" class="form-control" value="<?php echo $detail['user_name']; ?>" name="name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Company Logo</h4></label>
                              <input type="file"  tabindex="2" class="form-control" name="logo" id="logo"  placeholder="">
                          </div>
                      </div>
          
                     <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile No</h4></label>
                              <input type="text"  tabindex="4" class="form-control" value="<?php echo $detail['user_mobile']; ?>" name="mobileno" id="mobileno" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      
                        <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Company Name</h4></label>
                              <input type="text" tabindex="3" class="form-control" name="companyname" value="<?php echo $detail['user_companyname']; ?>" id="" placeholder="" >
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" tabindex="5" class="form-control" name="email" value="<?php echo $detail['user_email']; ?>" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Country</h4></label>
<!--
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
-->
                              <select name="country" id="country" class="form-control" style="height: 34px;" tabindex="6">
<!--
								  <option value="">Select Country</option>
-->
								  <?php $query = $this->db->query("select * from countries where id = '".$detail['user_country']."'");
								         $c = $query->result_array();
								         foreach($c as $country)
								         {
								   ?>
										<option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
										<?php
									    }
										?>
										<?php
										  foreach($p as $row)
										  {
										?>
										<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
										<?php
									     }
										?>
								 </select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4> Change Password</h4></label>
                              <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      
                       
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email" class="css-serial"><h4>State</h4></label>
<!--
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
-->
                             <select name="state" id="state" class="form-control" style="height: 34px;" tabindex="7">
								 <?php
								 $query = $this->db->query("select * from states where id = '".$detail['user_state']."'");
								         $s = $query->result_array();
								         foreach($s as $state)
								         {
											 ?>
									<option value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
									<?php
								       }
									?>
								 </select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password">
                               <span style="color :red" id="cpasss"></span> 
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>City</h4></label>
<!--
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
-->
                              <select name="city" id="city" class="form-control" style="height: 34px;" tabindex="8">
								  <?php
								 $query = $this->db->query("select * from cities where id = '".$detail['user_city']."'");
								         $ci = $query->result_array();
								         foreach($ci as $cities)
								         {
											 ?>
									<option value="<?php echo $cities['id']; ?>"><?php echo $cities['name']; ?></option>
									<?php
								      }
									?>
								  </select>
                          </div>
                      </div>
                      
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Address</h4></label>
                              <textarea  class="form-control"  tabindex="9" name="address" placeholder="Address" row="2"><?php echo $detail['user_address']; ?></textarea>
                          </div>
                      </div>
                      
                     
                    
                       
                     
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit" class="btn-upload-image"  id="upload_image" onclick="return Validate()><i class="glyphicon glyphicon-ok-sign" ></i> Save</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form ">
              </div>
               <?php
			}
               ?>
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    
    
    <div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>
    
    <script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<!--
       <script src="<?php echo base_url();?>assets/js/registervalidation.js"></script>
-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<!--
    <script src="<?php echo base_url();?>assets/js/country.js"></script>
-->
<script>
	    $(function () {
        $("#submit").click(function () {
            var password = $("#newpassword").val();
            var confirmPassword = $("#cpass").val();
            if (password != confirmPassword) {
                $("#cpasss").html('Please confirm the password')
                return false;
            }
            return true;
        });
    });
  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});

$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        //alert(countryID)
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxdata',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxdata',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    
});
$(document).ready(function(){
  
$('#newpassword,#cpass').on('keyup', function () {
  if ($('#newpassword').val() == $('#cpass').val()) {
	 // alert("adda");
   // $('#message').html('Matching').css('color', 'green');
  } else {
    //$('#message').html('Not Matching').css('color', 'red');
    //alert("notok");
}
});
});
</script>                                                   

<script>
   $(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:100,
      height:100,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#picture').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"crop_profile",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>
