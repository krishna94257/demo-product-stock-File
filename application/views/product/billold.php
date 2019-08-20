<!DOCTYPE html>

<html>

    <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property management</title>

    

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  </head>

  <body>



    <div class="content-page">

    <!-- Start content -->

    <div class="content">

    <div class="container-fluid">





    <div class="row">

    <div class="col-12">

    <div class="card-box">

    <h4 class="m-t-0 header-title"> BILL </h4>

   



<!-- <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add</button> -->

    <div class="row">

    <div class="col-12">

            <div class="p-20">

                <form class="form-horizontal" role="form"  enctype="multipart/form-data" action="<?php echo base_url("product/bill_add"); ?>" method="post">

                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">CUSTOMER NAME </label>

                        <div class="col-sm-10 col-12">

                            <input type="hidden" id="bid" name="bid" value="<?php echo isset($details->id) ? set_value("id", $details->id) : set_value("id"); ?>" />

                            <input name="customer_name" id="customer_name" type="text" class="form-control" placeholder="" value="<?php echo isset($details->customer_name) ? set_value("customer_name", $details->customer_name) : set_value("customer_name"); ?>" >

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">PRODUCT NAME </label>

                        <div class="col-sm-10 col-12">                          

                            <select class="product_name form-control" id="product_name" name="product_name" value='<?php echo isset($details->product_name) ? set_value("product_name", $details->product_name) : set_value("product_name"); ?>'  selected="selected" ><?php echo isset($details->product_name) ?></select>

                            

                        </div>

                    </div>                                                          



                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">PRODUCT PRICE</label>

                        <div class="col-sm-10 col-12">

                            <input id="price" name="price" readonly type="text" class="form-control" placeholder="" value="<?php echo isset($details->price) ? set_value("price", $details->price) : set_value("price"); ?>">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">PRODUCT QUANTITY</label>

                        <div class="col-sm-10 col-12">

                            <input type="text" class="form-control" placeholder="" value="<?php echo isset($details->quantity) ? set_value("quantity", $details->quantity) : set_value("quantity"); ?>" id="available_quantity" name="quantity">

                        </div>

                    </div>





                     <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label"> DISCOUNT %</label>

                        <div class="col-sm-10 col-12">

                            <input type="text" class="form-control" placeholder="" value="<?php echo isset($details->discount) ? set_value("discount", $details->discount) : set_value("discount"); ?>" id="discount" name="discount">

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-sm-2 col-12 col-form-label">TOTAL AMOUNT</label>

                        <div class="col-sm-10 col-12">

                            <input type="text" class="form-control" placeholder="" value="<?php echo isset($details->total) ? set_value("total", $details->total) : set_value("total"); ?>" id="total" name="total">

                        </div>

                    </div>   



                    <div class="form-group row">

                        <label class="col-4 col-form-label"></label>                       

                        <button class="btn btn-pink btn-rounded waves-effect waves-light" data-style="zoom-in">Submit

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>



    </div>

  

    </div>

    </div>

    </div>

    </div> 

    </div>





    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h4 class="modal-title">Modal Content is Responsive</h4>

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label for="field-1" class="control-label">Name</label>

                                                                <input type="text" class="form-control" id="field-1" placeholder="John">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label for="field-2" class="control-label">Surname</label>

                                                                <input type="text" class="form-control" id="field-2" placeholder="Doe">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <div class="form-group">

                                                                <label for="field-3" class="control-label">Address</label>

                                                                <input type="text" class="form-control" id="field-3" placeholder="Address">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="field-4" class="control-label">City</label>

                                                                <input type="text" class="form-control" id="field-4" placeholder="Boston">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="field-5" class="control-label">Country</label>

                                                                <input type="text" class="form-control" id="field-5" placeholder="United States">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="field-6" class="control-label">Zip</label>

                                                                <input type="text" class="form-control" id="field-6" placeholder="123456">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <div class="form-group no-margin">

                                                                <label for="field-7" class="control-label">Personal Info</label>

                                                                <textarea class="form-control" id="field-7" placeholder="Write something about yourself"></textarea>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>

                                                    <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

    

   



<script type="text/javascript">

//alert("hi");


      $('.product_name').select2({


        placeholder: 'SELECT PRODUCT',

        ajax: {

          url: '<?php echo base_url("product/search"); ?>',

          dataType: 'json',

          delay: 250,

          processResults: function (data) {

            //alert(data);

            return {

              results: data

            };



          },

          cache: true

        }

      });





</script>

  <script type="text/javascript">





    $(document).ready(function() {

      //alert("hi");

        $('select[name="product_name"]').on('change', function() {

            var id = $(this).val();



            if(id) {

                $.ajax({

                    url: "<?php echo base_url("product/productiddetails/"); ?>" + id,

                    type: "GET",

                    dataType: "json",

                    success:function(data) {

                      //alert(data);

                       $('input[name="price"]').val(data.price);

                       $('input[name="total"]').val(data.price);

                       $('input[name="quantity"]').val(1);

                       $('input[name="discount"]').val(0);

                    }

                });

            }else{

                $('input[name="price"]').empty();

            }

        });

    });





    $(document).ready(function() {

      //alert("hi");

        $('input[name="quantity"]').on('change', function() {

            var quantity = $(this).val();

            var id = $("#price").val();

            var price = $("#price").val();           

            var discount = $("#discount").val();

            if(quantity) {



              if (quantity < 100) {

                $.ajax({

                    url: "<?php echo base_url("product/productiddetails/"); ?>" + id,

                    type: "GET",

                    dataType: "json",

                    success:function(data) {

                      //alert(data);

                       $('input[name="price"]').val(data.price);

                       $('input[name="total"]').val(data.price);

                       $('input[name="quantity"]').val(1);

                       $('input[name="discount"]').val(0);

                    }

                });

              }

            }         

            if (discount == 0) {

              if (price && quantity)  {

                var total = (price*quantity);

                 $("#total").val(total);

                //alert(total);

              }

            }else{

              if (price && quantity && discount)  {

                var total = ((price*quantity*(100-discount))/100);

                 $("#total").val(total);

                //alert(total);

              }

            }

            



        });



        $('input[name="discount"]').on('change', function() {

      

            var discount = $(this).val(); 

            //alert(discount);         

            var price = $("#price").val(); 

            //alert(price);         



            var quantity = $("#available_quantity").val();

            //alert(quantity);         



            if (discount == 0) {

              if (price && quantity)  {

                var total = (price*quantity);

                 $("#total").val(total);

                //alert(total);

              }

            }else{

              if (price && quantity && discount)  {

                var total = ((price*quantity*(100-discount))/100);

                 $("#total").val(total);

                //alert(total);

              }

            }        



        });

    });

</script>





</body>

</html>



