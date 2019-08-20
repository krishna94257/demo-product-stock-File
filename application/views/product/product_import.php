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



                    <h4 class="page-title">Multiple Products Upload</h4>

                    <!-- <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="#">Ubold</a></li>

                        <li class="breadcrumb-item"><a href="#">Forms</a></li>

                        <li class="breadcrumb-item active">Multiple Products Upload</li>

                    </ol> -->



                </div>

            </div>





            <div class="row">

                <div class="col-md-12 portlets">

                    <div class="m-t-15">

                        <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url('product/product_upload'); ?>" class="" >

                            <div class="fallback dropzone selectbox">
								<a href="<?php echo base_url('assets/income-expense-worksheet.xlsx'); ?>">Sample File</a>
							
								<div class="selectbox-inner">
                                <input class="productimport-btn inputfile inputfile-1" name="file" type="file" multiple />
								<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
                                </div>
                                <center><h5 style="color: red;" >Choose Microsoft Excel files only</h5></center>
                            </div>



                        <div class="clearfix pull-right m-t-15">

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

        &copy; 2016 - 2018. All rights reserved.

    </footer>



</div>
