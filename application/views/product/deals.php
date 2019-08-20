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



                    <h4 class="page-title">Logo Change</h4>

                    <!-- <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="#">Ubold</a></li>

                        <li class="breadcrumb-item"><a href="#">Forms</a></li>

                        <li class="breadcrumb-item active">Logo Chang</li>

                    </ol> -->



                </div>

            </div>


            <?php $logo = $this->common_model->getByid("logo", array('id' => 1));
            //print_r($logo->logo);die;
            ?>
            <div class="row">

                <div class="col-md-12 portlets">

                    <div class="m-t-15">

                        <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url('product/deals'); ?>" class="" >

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Deals1</label>
                                <div class="col-5">
                                    <input type="file" name="deals1" class="form-control">
                                </div>
                                <div class="col-md-2 portlets">
                                    <center><img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $logo->deals1;?>" style="width:150px; height: 60px;"></center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Deals2</label>
                                <div class="col-5">
                                    <input type="file" name="deals2" class="form-control">
                                </div>
                                <div class="col-md-2 portlets">
                                    <center><img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $logo->deals2;?>" style="width:150px; height: 60px;"></center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Deals3</label>
                                <div class="col-5">
                                    <input type="file" name="deals3" class="form-control">
                                </div>
                                <div class="col-md-2 portlets">
                                    <center><img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $logo->deals3;?>" style="width:150px; height: 60px;"></center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Deals4</label>
                                <div class="col-5">
                                    <input type="file" name="deals4" class="form-control">
                                </div>
                                <div class="col-md-2 portlets">
                                    <center><img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $logo->deals4;?>" style="width:150px; height: 60px;"></center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Deals5</label>
                                <div class="col-5">
                                    <input type="file" name="deals5" class="form-control">
                                </div>
                                <div class="col-md-2 portlets">
                                    <center><img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $logo->deals5;?>" style="width:150px; height: 60px;"></center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Deals6</label>
                                <div class="col-5">
                                    <input type="file" name="deals6" class="form-control">
                                </div>
                                <div class="col-md-2 portlets">
                                    <center><img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $logo->deals6;?>" style="width:150px; height: 60px;"></center>
                                </div>
                            </div>

                                            


                        <div class="clearfix pull-center m-t-15">

                            <button type="submit" name="submit" class="btn btn-pink btn-rounded waves-effect waves-light">Submit</button>

                        </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- end row -->



        </div> <!-- container -->



    </div> <!-- content -->



    <footer class="footer text-right">

        <?php
                     $year = date("Y");
                     
                   ?>
                    &copy; <?php echo $year; ?>. All rights reserved.

    </footer>



</div>
