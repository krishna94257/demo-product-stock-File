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

                <form class="form-horizontal" role="form"  enctype="multipart/form-data" action="<?php echo base_url("product/product_add"); ?>" method="post">

                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT NAME</label>

                        <div class="col-12 col-sm-10">

                            <input type="hidden" id="id" name="id" value="<?php echo isset($details->id) ? set_value("id", $details->id) : set_value("id"); ?>" />

                            <input type="text" class="form-control" placeholder="PRODUCT NAME" value="<?php echo isset($details->product_name) ? set_value("product_name", $details->product_name) : set_value("product_name"); ?>" id="product_name" name="product_name">

                            <span style="color :red" ><?php echo form_error('product_name'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT CODE</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="PRODUCT CODE " value="<?php echo isset($details->product_id) ? set_value("product_id", $details->product_id) : set_value("product_id"); ?>" id="product_id" name="product_id">

                            <span style="color :red" ><?php echo form_error('product_id'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT CODE 2</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="PRODUCT CODE 2" value="<?php echo isset($details->product_id2) ? set_value("product_id2", $details->product_id2) : set_value("product_id2"); ?>" id="product_id2" name="product_id2">

                            <span style="color :red" ><?php echo form_error('product_id2'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT SIZE</label>

                        <div class="col-12 col-sm-10">

                            <select class="form-control" id="product_categorie" name="product_categorie">
                                 
                                <?php foreach($category as $book){
                                    //print_r($book);die; ?>

                                    <option value="<?php echo $book->id;?>" <?php if (!empty($details->product_categorie)){ if($book->id == $details->product_categorie){ echo "selected";} } ?>
                                        
                                    > <?php echo $book->category;?> </option>

                                <?php }?>



                               

                            </select>

                            <span style="color :red" ><?php echo form_error('product_categorie'); ?></span> 



                            

                        </div>

                    </div>                                                    



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT PRICE</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="PRODUCT PRICE" value="<?php echo isset($details->price) ? set_value("price", $details->price) : set_value("price"); ?>" id="price" name="price">

                            <span style="color :red" ><?php echo form_error('price'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT STOCK</label>

                        <div class="col-12 col-sm-10">

                            <input type="text" class="form-control" placeholder="PRODUCT STOCK" value="<?php echo isset($details->quantity) ? set_value("quantity", $details->quantity) : set_value("quantity"); ?>" id="available_quantity" name="quantity">

                            <span style="color :red" ><?php echo form_error('quantity'); ?></span> 

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-12 col-sm-2 col-form-label">PRODUCT DESCRIPTION</label>

                        <div class="col-12 col-sm-10">

                            <textarea class="form-control"  rows="5" id="product_description" name="product_description"><?php echo isset($details->product_description) ? set_value("product_description", $details->product_description) : set_value("product_description"); ?></textarea>

                            <span style="color :red" ><?php echo form_error('product_description'); ?></span> 

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

    &copy; 2016 - 2018. All rights reserved.

    </footer>

</div>