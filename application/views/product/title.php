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

    <h4 class="m-t-0 header-title"> PRODUCT </h4>

 




    <div class="row">

    <div class="col-12">

            <div class="p-20">

                <form class="form-horizontal" role="form"  enctype="multipart/form-data" action="<?php echo base_url("product/title"); ?>" method="post">

                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">Header Title </label>

                        <div class="col-sm-10 col-12">

                            <input type="hidden" id="id" name="id" value="<?php echo isset($details->id) ? set_value("id", $details->id) : set_value("id"); ?>" />

                            <input type="text" class="form-control" placeholder="TITLE" value="<?php echo isset($details->title) ? set_value("title", $details->title) : set_value("title"); ?>" id="title" name="title">

                            <span style="color :red" ><?php echo form_error('title'); ?></span> 

                        </div>

                    </div>



                    


                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">Header String</label>

                        <div class="col-sm-10 col-12">

                            <textarea class="form-control"  rows="5" id="address" name="address"><?php echo isset($details->address) ? set_value("address", $details->address) : set_value("address"); ?></textarea>

                            <span style="color :red" ><?php echo form_error('address'); ?></span> 

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">Footer</label>

                        <div class="col-sm-10 col-12">

                            <textarea class="form-control"  rows="5" id="footer" name="footer"><?php echo isset($details->footer) ? set_value("footer", $details->footer) : set_value("footer"); ?></textarea>

                            <span style="color :red" ><?php echo form_error('footer'); ?></span> 

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
         2018. All rights reserved.

    </footer>

</div>