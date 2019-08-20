<div class="content-page">

    <!-- Start content -->

    <div class="content">

    <div class="container-fluid">

    <!-- Page-Title -->

        <div class="row">

            <div class="col-sm-12">

                <!-- <div class="btn-group pull-right m-t-15">

                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings</button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">

                        <a class="dropdown-item" href="#">Dropdown One</a>

                        <a class="dropdown-item" href="#">Dropdown Two</a>

                        <a class="dropdown-item" href="#">Dropdown Three</a>

                        <a class="dropdown-item" href="#">Dropdown Four</a>

                    </div>

                </div> -->



                <!-- <h4 class="page-title">Form elements</h4>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="#">Ubold</a></li>

                    <li class="breadcrumb-item"><a href="#">Forms</a></li>

                    <li class="breadcrumb-item active">Form elements</li>

                </ol>
 -->


            </div>

        </div>





    <div class="row">

    <div class="col-12">

    <div class="card-box">

    <h4 class="m-t-0 header-title"> USER </h4>

 

  <?php
   foreach($a as $detail)
   {
  ?>


    <div class="row">

    <div class="col-12">

            <div class="p-20">

                <form class="form-horizontal" role="form"  enctype="multipart/form-data" action="<?php echo base_url("user/useredit"); ?>" id="register-form" method="post">

                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">USER NAME</label>

                        <div class="col-12 col-sm-10">

                            <input type="hidden" id="id" name="id" value="<?php echo $detail['user_id']; ?>" />

                            <input type="text" class="form-control" placeholder="USER NAME" value="<?php echo $detail['user_name']; ?>" id="user_name" name="user_name">

                            <span style="color :red" ><?php echo form_error('user_name'); ?></span> 

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Contact</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="Contact " value="<?php echo $detail['user_mobile']; ?>" id="contact" name="contact">

                            <span style="color :red" ><?php echo form_error('contact'); ?></span> 
                        </div>
                    </div>




                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Country</label>

                        <div class="col-12 col-sm-10">

                           <select name="country" id="country" class="form-control" style="height: 34px;">

                              
								  <?php
								   $query = $this->db->query("select * from countries where id = '".$detail['user_country']."'");
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

                            <span style="color :red" ><?php echo form_error('country'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">State</label>

                        <div class="col-12 col-sm-10">

                            <select name="state" id="state" class="form-control" style="height: 34px;">
							
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

                            <span style="color :red" ><?php echo form_error('state'); ?></span> 



                            

                        </div>

                    </div>                                                    



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">City</label>

                        <div class="col-12 col-sm-10">

                            <select name="city" id="city" class="form-control" style="height: 34px;">
								
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

                            <span style="color :red" ><?php echo form_error('city'); ?></span> 

                        </div>

                    </div>


                   <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Company/Shop Name</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="Company/Shop Name" value="<?php echo $detail['user_companyname']; ?>" id="companyname" name="companyname">

                            <span style="color:red" ><?php echo form_error('companyname'); ?></span> 

                        </div>

                    </div>

                    



                   



                    <div class="form-group row">

                        <label class="col-4 col-form-label"></label>

                            <h5 class="text-muted font-16"></h5>

                            <button class="btn btn-pink btn-rounded waves-effect waves-light" data-style="zoom-in" value="save">Save

                            </button>

                    </div>



                </div>

            </form>

        </div>

    </div>

<?php
}
?>

    </div>

    <!-- end row -->



    </div> <!-- end card-box -->

    </div><!-- end col -->

    </div>

            <!-- end row -->





           

            <!-- end row --> 



        </div> <!-- container -->

    </div> <!-- content -->



    <footer class="footer text-right">
<?php $year = date("Y"); ?>
    &copy; <?php echo $year; ?> All rights reserved.

    </footer>

</div>
<script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script>
<script src="<?php echo base_url();?>assets/js/registervalidation.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script>

  $(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        //alert(countryID)
        if(countryID){
            $.ajax({
                type:'POST',
                url:"<?php echo base_url();?>user/ajaxdata",
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
                url:"<?php echo base_url();?>user/ajaxdata",
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
</script>
