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

    <h4 class="m-t-0 header-title"> PDF </h4>
    
    <?php
  $success_msg= $this->session->flashdata('success_msg');
  $error_msg= $this->session->flashdata('error_msg');

	
  ?>  

<a href="<?php echo base_url('assets/bill.pdf'); ?>">Sample Pdf</a>


    <div class="row">

    <div class="col-12">

            <div class="p-20">

                <form class="form-horizontal" role="form"  enctype="multipart/form-data" action="<?php echo base_url("product/pdf"); ?>" id="register-form" method="post">

                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Address</label>

                        <div class="col-12 col-sm-10">

                             <input type="hidden" class="form-control" placeholder="Address" value="<?php echo $row['id']; ?>" id="id" name="id">

                            <input type="text" class="form-control" placeholder="Address" value="" id="address" name="address">

                            <span style="color :red" ><?php echo form_error('address'); ?></span> 

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Telephone</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="Telephone" value="" id="telephone" name="telephone">

                            <span style="color :red" ><?php echo form_error('telephone'); ?></span> 
                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">GSTIN No</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="GSTIn No" value="" id="gstinno" name="gstinno">

                            <span style="color :red" ><?php echo form_error('gstinno'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label"> Bank Detail</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="Bank Detail" value="" id="bankdetail" name="bankdetail">

                            <span style="color :red" ><?php echo form_error('bankdetail'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label"> A/C No. </label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="A/C No." id="acno" name="acno">
                                 
                            <span style="color :red" ><?php echo form_error('acno'); ?></span> 

                       </div>

                    </div>                                                    



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">IFSC No</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="IFSC No" value="" id="ifscno" name="ifscno">

                            <span style="color :red" ><?php echo form_error('ifscno'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Branch</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="Branch" value="" id="branch" name="branch">

                            <span style="color :red" ><?php echo form_error('quantity'); ?></span> 

                        </div>

                    </div>
                    
                     <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Auth. Distributer </label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="Auth. Distributer " value="" id="auth" name="auth">

                            <span style="color :red" ><?php echo form_error('auth'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">Terms & Conditions</label>

                        <div class="col-12 col-sm-10">

                            <textarea class="form-control"  rows="6" id="terms" name="terms"></textarea>

                            <span style="color :red" ><?php echo form_error('terms'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-4 col-form-label"></label>

                            <h5 class="text-muted font-16"></h5>

                            <button class="btn btn-pink btn-rounded waves-effect waves-light" data-style="zoom-in">Submit

                            </button>

                    </div>



                </div>

            </form>

        </div>

    </div>

<?php

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

    &copy; 2016 - 2018. All rights reserved.

    </footer>

</div>
 
 <script src="<?php echo base_url('assets/login/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>assets/js/registervalidation.js"></script>
