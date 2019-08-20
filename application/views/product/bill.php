<!DOCTYPE html>

<html>

    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property management</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  </head>
  <body>
    <?php $cus = array();
      foreach ($custo as $key) {
        $cus[] = '"'.$key->name.'"';
      }
      $customer =  implode(",",$cus);
    ?>


    <div class="content-page">
    <!-- Start content -->
    <div class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card-box">
    <h4 class="m-t-0 header-title"> BILL </h4>
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>

    <?php } ?>
    <div class="row">



   <!--  <center><span style="color: green; text-align: center; border: 1px solid green"><?php echo $this->session->flashdata('success');?></span></center>  -->
    <div class="col-12">
            <div class="p-20">
              
                <form class="form-horizontal" role="form"  enctype="multipart/form-data" action="<?php echo base_url("product/bill_add"); ?>" method="post">
                  <div class="col-sm-12 form-control" style="border: 2px solid pink ">
                    <div class="form-group row">

                        

                        <div class="col-sm-9 col-12 col-form-label">

                            <input type="hidden" id="cusid" name="cusid" value="<?php echo isset($details->cusid) ? set_value("cusid", $details->cusid) : set_value("cusid"); ?>" />
                            <input name="invoice_no" id="invoice_no" type="text" class="form-control" placeholder="INVOICE NUMBER" value="<?php echo isset($details->invoice_no) ? set_value("invoice_no", $details->invoice_no) : set_value("invoice_no"); ?>" required >
                        </div> 
                        <div class="col-sm-3 col-12 col-form-label">

                            
                            <input name="date" id="date" type="text" class="date form-control" required>
                        </div> 
                        <div class="col-sm-9 col-12 col-form-label">
                            <!-- <input type="hidden" id="id" name="id" value="<?php echo isset($details->id) ? set_value("id", $details->id) : set_value("id"); ?>" /> -->

                            

                            <input name="customer_name" id="customer_name" type="text" class="form-control" placeholder="CUSTOMER NAME" value="<?php echo isset($details->customer_name) ? set_value("customer_name", $details->customer_name) : set_value("customer_name"); ?>" required >
                        </div>
                        

                        <div class="col-sm-3 col-12 col-form-label">                        

                            <input name="customer_number" id="customer_number" type="text" class="form-control" placeholder="CONTACT NUMBER" value="<?php echo isset($details->customer_number) ? set_value("customer_number", $details->customer_number) : set_value("customer_number"); ?>" required >
                        </div>
                        <div class="col-sm-9 col-12 col-form-label">
                            <textarea name="address" id="address" class="form-control" placeholder="ADDRESS" rows="2"></textarea>
                        </div>
                        <div class="col-sm-3 col-12 col-form-label">                        

                            <input name="gst_number" id="gst_number" type="text" class="form-control" placeholder="PARTY GSTIN NUMBER" value="<?php echo isset($details->gst_number) ? set_value("gst_number", $details->gst_number) : set_value("gst_number"); ?>" >

                            <input style="margin-top: 18px" name="trans" id="trans" type="text" class="form-control" placeholder="TRANS" value="<?php echo isset($details->trans) ? set_value("trans", $details->trans) : set_value("trans"); ?>" >
                        </div>
                        
                    </div>
                  </div>
                    <div class="col-sm-12 form-control" style="border: 2px solid pink ">
                        <label class="col-sm-12 col-12 col-form-label center"></label>
                        
                        <div id="append" class="form-group row">

                            

                            <div class="col-sm-4 col-12">                          

                                <select class="product_code form-control" id="product_code" name="product_code[0][]" value=''  selected="selected" required ><?php echo isset($details->product_code) ?></select>

                            </div>
                            <input type="hidden" class="form-control" placeholder="PRODUCT NAME" value="<?php echo isset($details->product_name) ? set_value("product_name", $details->product_name) : set_value("product_name"); ?>" id="product_name" name="product_name[0][]" required>
                            <!-- <div class="col-sm-3 col-12">                          

                                

                            </div> -->
                            <div class="col-sm-2 col-12">
                                <input type="text" class="quantity form-control" placeholder="QUANTITY" value="<?php echo isset($details->quantity) ? set_value("quantity", $details->quantity) : set_value("quantity"); ?>" id="quantity" data-id="" name="quantity[0][]" required>

                            </div>
                            <div class="col-sm-2 col-12">

                                <input type="text" readonly="" class="size form-control" placeholder="Size" value="<?php echo isset($details->size) ? set_value("size", $details->size) : set_value("size"); ?>" id="size" data-id="" name="size[0][]">

                                <input type="hidden" readonly="" class="sizevalue form-control" placeholder="Sizevalue" value="<?php echo isset($details->sizevalue) ? set_value("sizevalue", $details->sizevalue) : set_value("sizevalue"); ?>" id="sizevalue" data-id="" name="sizevalue[0][]">


                            </div>
                            <div class="col-sm-2 col-12">

                                <input id="price" name="price[0][]" type="text" class="form-control" placeholder="PRICE" value="<?php echo isset($details->price) ? set_value("price", $details->price) : set_value("price"); ?>">

                            </div>                        
                            <div class="col-sm-2 col-12">

                                <input style="text-align: right" type="text" class="total form-control calculate" readonly  placeholder="TOTAL" value="<?php echo isset($details->total) ? set_value("total", $details->total) : set_value("total"); ?>" id="total" name="total[0][]">

                            </div>

                            
                        </div>



                        <div id='TextBoxesGroup'>
                        </div>
                        <div class="input_fields_wrap row">
                        <div class="col-sm-6 col-12">
                        <input class="add_field_button form-control" type='button' value='+ ADD ' id='addButton'>
                        </div>
                        <div class="col-sm-6 col-12">
                        <input class="add_field_buttons form-control" type='button' value='X REMOVE' id='removeButton'>
                        </div>
                        </div>
                        <label class="col-sm-12 col-12 col-form-label center"></label>

                        <div id="" class=" row">
                          <label class="col-sm-8 col-12 col-form-label center"></label>
                          <label class="col-sm-1 col-12 col-form-label center">SUBTOTAL</label>
                          <label class="col-sm-1 col-12 col-form-label center"></label>
                          <div class="col-sm-2 col-12">
                            <input style="text-align: right" type="text" class="subtotal form-control" readonly  placeholder="" value="" id="subtotal" name="subtotal">
                          </div>
                        </div>
                        <div id="" class=" row">
                          <label class="col-sm-8 col-12 col-form-label center"></label>

                          <label class="col-sm-1 col-12 col-form-label center">DIS %</label>
                          <div class="col-sm-1 col-12">
                            <input type="text" class="discount form-control" placeholder="" value="" id="discount" name="discount">
                            
                          </div>
                          
                          <div class="col-sm-2 col-12">                            
                            <input style="text-align: right" type="text" class="discountamt form-control" readonly="" placeholder="" value="" id="discountamt" name="discountamt">

                            
                          </div>
                        </div>
                         <div id=""class=" row">
                          <label class="col-sm-8 col-12 col-form-label center"></label>
                          <label class="col-sm-1 col-12 col-form-label center"> FRIGHT</label>
                          <div class="col-sm-3 col-12">
                            <input style="text-align: right" type="text" class="fright form-control" placeholder="" value="" id="fright" name="fright">
                          </div>
                        </div>
                        <div id="" class="row">
                          <label class="col-sm-8 col-12 col-form-label center"></label>
                          <label class="col-sm-1 col-12 col-form-label center">GST %</label>
                          <div class="col-sm-1 col-12">
                            <input type="text" class="gst form-control" placeholder="" value="" id="gst" name="gst">
                          </div>
                          
                          <div class="col-sm-2 col-12">
                            <input style="text-align: right" type="text" class="gstamt form-control" readonly="" placeholder="" value="" id="gstamt" name="gstamt">
                          </div>
                        </div>


                        <div id="" class="form-group row">
                          <label class="col-sm-8 col-12 col-form-label center"></label>
                          <label class="col-sm-1 col-12 col-form-label center">IGST %</label>
                          <div class="col-sm-1 col-12">
                            <input type="text" class="igst form-control" placeholder="" value="" id="igst" name="igst">
                          </div>
                          
                          <div class="col-sm-2 col-12">
                            <input style="text-align: right" type="text" class="igstamt form-control" readonly="" placeholder="" value="" id="igstamt" name="igstamt">
                          </div>
                        </div>


                                                
                        
                       
                        <div id="" class=" row">
                          <label class="col-sm-7 col-12 col-form-label center"></label>
                          <label class="col-sm-1 col-12 col-form-label center"><b>GRAND TOTAL</b></label>
                          

                          <div class="col-sm-4 col-12">
                            <input style="text-align: right" type="text" class="grandtotal form-control" readonly  placeholder="" value="" id="grandtotal" name="grandtotal">
                          </div>
                        </div>
                        

                        <div class="form-group row">
                            <label class="col-4 col-form-label"></label>
                            <button class="btn btn-pink btn-rounded waves-effect waves-light" data-style="zoom-in">Submit</button>
                        </div>
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
<script type="text/javascript">

  $(document).ready(function(){
    var counter = 1;
    $("#addButton").click(function () {

    if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
    }           
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxDiv' + counter);
                
    newTextBoxDiv.after().html( '<div class="form-group row"><div class="col-sm-4 col-12"><select onchange="onchang(' + counter +')" class="product_code form-control" id="product_code' + counter +'" name="product_code[' + counter +'][]" ></select></div><input type="hidden" class="product_name form-control" placeholder="PRODUCT NAME" id="product_name' + counter +'" name="product_name[' + counter +'][]"><div class="col-sm-2 col-12"><input type="text" class="quantity form-control" placeholder="QUANTITY" onkeyup="keyup(' + counter +')" id="quantity' + counter +'" data-id="" name="quantity[' + counter +'][]"></div><div class="col-sm-2 col-12"><input type="text" readonly="" class="size form-control" placeholder="Size"  value="" id="size' + counter +'" data-id="24" name="size[' + counter +'][]"><input type="hidden" readonly="" class="sizevalue form-control" id="sizevalue' + counter +'" data-id="" name="sizevalue[' + counter +'][]"></div><div class="col-sm-2 col-12"><input id="price' + counter +'" name="price[' + counter +'][]" onkeyup="keyupprice(' + counter +')" type="text" class="form-control" placeholder="PRICE" ></div><div class="col-sm-2 col-12"><input style="text-align: right" type="text" class="total form-control calculate" readonly id="total' + counter +'" name="total[' + counter +'][]" placeholder="TOTAL" ></div></div>');
            
    newTextBoxDiv.appendTo("#TextBoxesGroup");

    $('#product_code' + counter +'').select2({
        placeholder: 'SELECT PRODUCT',
        ajax: {
          url: '<?php echo base_url("product/search"); ?>',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
               //alert(data);
              
            if (data) {
              var selected = [];
              $('.product_code').each(function () {
                var val = $(this).val();
                if (val) {
                    selected.push(val);
                }
              });              
              if (selected[0]) {
              var results = [];
              for (var i = 0; i < data.length; i++) {
                var dataid = data[i].id;                  
                var idx = $.inArray(dataid, selected);
                if (idx == -1) {            
                  results.push(data[i]);                    
                }         
              }
              return {results};
              }else{
                
                return {
                results: data
                };
              }
            } 
            // return {
            //   results: data
            // };
          },
          cache: true
        }
      });                  
      counter++;
    });
    
    $("#removeButton").click(function () {
      if(counter==1){
          alert("No more textbox to remove");
          return false;
      }        
      counter--;

        $("#TextBoxDiv" + counter).remove();
            
     });
        
     $("#getButtonValue").click(function () {        
        var msg = '';
        for(i=1; i<counter; i++){
          msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
        }
          alert(msg);
     });
  });



  function onchang (cid){
      var id = $('#product_code'+cid).val();
      var qut = $('#quantity'+cid).val();
      var discount = $("#discount").val();
      var gst = $("#gst").val(); 
      var igst = $("#igst").val();    
      var fright = $("#fright").val();
      var sum = 0;
      if(cid) {
        $.ajax({
            url: "<?php echo base_url("product/productiddetails/"); ?>" + id,
            type: "GET",
            dataType: "json",
            success:function(data) {      
              $('#product_name'+cid).val(data.product_name);
              $('#price'+cid).val(data.price);
              $('#size'+cid).val(data.category);
              $('#size'+cid).attr('data-id', data.size);
              $('#quantity'+cid).attr('data-id', data.quantity);  

              if (qut) { 
                if (parseInt(data.quantity)>= parseInt(qut)) {
                  $('#total'+cid).val(data.price*data.size*qut);
                  $('#sizevalue'+cid).val(qut*data.size);
                  $('#quantity'+cid).val(qut);                
                } else{
                  $("#quantity"+cid).val(0);
                  $("#total"+cid).val(0);      
                  alert("Only " + qut + " product's are available.");
                }
              }else{
                $('#total'+cid).val(data.price*data.size);
                $('#sizevalue'+cid).val(data.size);                
                $('#quantity'+cid).val(1);
              }
              // if (qut) {                
              //   $('#quantity'+cid).val(qut);
              //   $('#total'+cid).val(data.price*data.size*qut);
              // }else{
              //   $('#quantity'+cid).val(1);
              //   $('#total'+cid).val(data.price*data.size);
              // }

              var thu = 100;
              var amt = 0;
              $(".total").each(function(){
                  amt += +$(this).val();
                  sum = amt;

              });
              // alert(amt);
              if (discount) {
                  var disamt = amt*discount/100;
                  var amt = amt*(100-discount)/100;
                  

              }
              if (fright) {
                var amt = parseInt(amt)+parseInt(fright);
              }
              if (gst) {
                var gstamt = amt*gst/100;
                var amt = amt*(parseInt(thu)+parseInt(gst))/100;
                // alert(gstamt);
              }    
              
              $(".discountamt").val(disamt);  
              $(".gstamt").val(gstamt);
              $(".subtotal").val(sum);               
              $(".grandtotal").val(amt);
              $("#igst").val(0);
              $("#igstamt").val(0);

            }
        });
      }else{
          $('#price' + counter +'').empty();
      }
  }
  function keyup(cid){
    var quantity = $("#quantity"+cid).val();                        
    var price = $("#price"+cid).val();
    var discount = $("#discount").val();
    var gst = $("#gst").val();   
    var igst = $("#igst").val();   
    var fright = $("#fright").val();
    var size = $('#size'+cid).attr('data-id');
    var qut = $('#quantity'+cid).attr('data-id');
    var sum = 0;

    if(quantity >= 0) {
        if (parseInt(qut) >= parseInt(quantity)) {
          var total = (price*quantity*size);
          var sizevalue = (quantity*size);
          var amt = (price*quantity*size);
          $("#total"+cid).val(total);
          $("#sizevalue"+cid).val(sizevalue);

          } else{
            $("#quantity"+cid).val(0);
            $("#total"+cid).val(0);      
            alert("Only " + qut + " product's are available.");
          }
      }
    
    // if(quantity > 0) {
    //     var total = (price*quantity*size);
    //     $("#total"+cid).val(total);
    // }
    var amt = 0;
    $(".total").each(function(){
        amt += +$(this).val();
        sum = amt;
    });
    //alert(amt);
    if (discount) {
        var disamt = amt*discount/100;
        var amt = amt*(100-discount)/100;
        var thu = 100;

    }
    if (fright) {
      var amt = parseInt(amt)+parseInt(fright);
    }
    if (gst) {
      var gstamt = amt*gst/100;
      var amt = amt*(parseInt(thu)+parseInt(gst))/100;
      // alert(gstamt);
    }    
    
    $(".discountamt").val(disamt);  
    $(".gstamt").val(gstamt);
    $(".subtotal").val(sum);               
    $(".grandtotal").val(amt);
    $("#igst").val(0);
    $("#igstamt").val(0);
  }
  function keyupprice(cid){
    var price = $("#price"+cid).val();
    var quantity = $("#quantity"+cid).val();                        
    var discount = $("#discount").val();
    var gst = $("#gst").val();  
    var igst = $("#igst").val();  
    var fright = $("#fright").val();
    var size = $('#size'+cid).attr('data-id');            
    var id = $("#id").val();
    var sum = 0;
    // alert(quantity);
    // alert(size);
    // alert(price);

    if(size && quantity) {      
        var total = (price*quantity*size);
        var amt = (price*quantity*size);
        $("#total"+cid).val(total);
    }
    // if(quantity >= 0) {
    //     var total = (price*quantity);
    //     var amt = (price*quantity);
    //     $("#total").val(total);
    // }
    var amt = 0;
    $(".total").each(function(){
        amt += +$(this).val();
        sum = amt;
    });
    // alert(amt);
    if (discount) {
        var disamt = amt*discount/100;
        var amt = amt*(100-discount)/100;
        var thu = 100;
    }
    if (fright) {
      var amt = parseInt(amt)+parseInt(fright);
    }
    if (gst) {
      var gstamt = amt*gst/100;
      var amt = amt*(parseInt(thu)+parseInt(gst))/100;
      // alert(gstamt);
    }    
    
    $(".discountamt").val(disamt);  
    $(".gstamt").val(gstamt);
    $(".subtotal").val(sum);               
    $(".grandtotal").val(amt);
  }
</script>




<script type="text/javascript">

  $('.product_code').select2({

    placeholder: 'SELECT PRODUCT',
    ajax: {
      url: '<?php echo base_url("product/search"); ?>',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        // alert(data);
        // console.log(data);
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

    $('select#product_code').on('change', function() {      
      var id = $(this).val();
      var qut = $('#quantity').val();
      var discount = $("#discount").val();
      var gst = $("#gst").val();    
      var igst = $("#igst").val();    
      var fright = $("#fright").val();
      var size = $('#size').attr('data-id');
      var sum = 0;      
      if(id) {
        $.ajax({
          url: "<?php echo base_url("product/productiddetails/"); ?>" + id,
          type: "GET",
          dataType: "json",
          success:function(data) {        
            $('#id').val(data.id);
            $('#product_name').val(data.product_name);
            $('#price').val(data.price);
            $('#size').val(data.category);
            $('#size').attr('data-id', data.size);
            $('#quantity').attr('data-id', data.quantity);          

            if (qut) { 
              if (parseInt(data.quantity)>= parseInt(qut)) {
                $('#total').val(data.price*data.size*qut);
                $('#sizevalue').val(data.size*qut);
                $('#quantity').val(qut);                
              } else{
                $("#quantity").val(0);
                $("#total").val(0);      
                alert("Only " + qut + " product's are available.");
              }
            }else{
              $('#total').val(data.price*data.size);
              $('#sizevalue').val(data.size);
              $('#quantity').val(1);
            }
            var amt = 0;
              $(".total").each(function(){
                  amt += +$(this).val();
                  sum = amt;
              });
              
              if (discount) {
                  var disamt = amt*discount/100;
                  var amt = amt*(100-discount)/100;
                  var thu = 100;
              }
              if (fright) {
                var amt = parseInt(amt)+parseInt(fright);
              }
              if (gst) {
                var gstamt = amt*gst/100;
                var amt = amt*(parseInt(thu)+parseInt(gst))/100;                
              }    
              
              $(".discountamt").val(disamt);  
              $(".gstamt").val(gstamt);
              $(".subtotal").val(sum);               
              $(".grandtotal").val(amt);
              $("#igst").val(0);
              $("#igstamt").val(0);                    
          }
        });
      }else{
        $('#price').empty();
      }
    });
  });


  $('#quantity').on('change', function() {

    var quantity = $(this).val();            
    var id = $("#id").val();            
    var price = $("#price").val();
    var discount = $("#discount").val();
    var gst = $("#gst").val();   
    var igst = $("#igst").val();   
    var fright = $("#fright").val();
    var size = $('#size').attr('data-id');
    var qut = $('#quantity').attr('data-id');

    
      // alert(qut);
      // alert(quantity);
    //if (parseInt(qut) >= parseInt(quantity)) {
      if(quantity >= 0) {
        if (parseInt(qut) >= parseInt(quantity)) {
          var total = (price*quantity*size);
          var sizevalue = (quantity*size);
          var amt = (price*quantity*size);
          $("#total").val(total);
          $("#sizevalue").val(sizevalue);
          } else{
            $("#quantity").val(0);
            $("#total").val(0);      
            alert("Only " + qut + " product's are available.");
          }
      }
      var amt = 0;
      $(".total").each(function(){
          amt += +$(this).val();
          sum = amt;
      });
      // alert(amt);
      if (discount) {
          var disamt = amt*discount/100;
          var amt = amt*(100-discount)/100;
          var thu = 100;
      }
      if (fright) {
        var amt = parseInt(amt)+parseInt(fright);
      }
      if (gst) {
        var gstamt = amt*gst/100;
        var amt = amt*(parseInt(thu)+parseInt(gst))/100;
        // alert(gstamt);
      }    
      
      $(".discountamt").val(disamt);  
      $(".gstamt").val(gstamt);
      $(".subtotal").val(sum);               
      $(".grandtotal").val(amt);
      $("#igst").val(0);
      $("#igstamt").val(0);        
  });


  $('#price').on('change', function() {

    var price = $(this).val();            
    var id = $("#id").val();            
    var quantity = $("#quantity").val();
    var discount = $("#discount").val();
    var gst = $("#gst").val();    
    var igst = $("#igst").val();    
    var fright = $("#fright").val();
    var size = $('#size').attr('data-id');    
    var sum = 0;
    

    if(size && quantity) {      
        var total = (price*quantity*size);
        var sizevalue = (quantity*size);
        var amt = (price*quantity*size);
        $("#total").val(total);
        $("#sizevalue").val(sizevalue);
    }
    // if(quantity >= 0) {
    //     var total = (price*quantity);
    //     var amt = (price*quantity);
    //     $("#total").val(total);
    // }
    var amt = 0;
    $(".total").each(function(){
        amt += +$(this).val();
        sum = amt;
    });
    // alert(amt);
    if (discount) {
        var disamt = amt*discount/100;
        var amt = amt*(100-discount)/100;
        var thu = 100;
    }
    if (fright) {
      var amt = parseInt(amt)+parseInt(fright);
    }
    if (gst) {
      var gstamt = amt*gst/100;
      var amt = amt*(parseInt(thu)+parseInt(gst))/100;
      // alert(gstamt);
    }    
    
    $(".discountamt").val(disamt);  
    $(".gstamt").val(gstamt);
    $(".subtotal").val(sum);               
    $(".grandtotal").val(amt);
    $("#igst").val(0);
    $("#igstamt").val(0);       
  });


  $(document).on("change", "#discount", function() {
    var dis = $("#discount").val();
    var fright = $("#fright").val();
    var gst = $("#gst").val();
    var igst = $("#igst").val();
    var total = $("#subtotal").val();    
    //var amtper = 100 - dis;              
    var disamt = dis*total/100;
    var amt = total*(100 -dis)/100;
    if (fright) {
      var amt = parseInt(amt)+parseInt(fright);
    } 
    if (gst) {
      var gstamt = amt*gst/100;       
      var amt = parseInt(amt)+parseInt(gstamt);     
    }
    
    $(".gstamt").val(gstamt);    
    //sss$(".discountamt").val(amt);
    $(".discountamt").val(disamt);
    $(".grandtotal").val(amt);
    $("#igst").val(0);
    $("#igstamt").val(0);    
  });


  $(document).on("change", "#fright", function() {
    var amt = $("#subtotal").val();
    var dis = $("#discount").val();
    var gst = $("#gst").val(); 
    var igst = $("#igst").val(); 
    var fright = $("#fright").val();
    var thu = 100;   
    if (discount) {
        var amt = amt*(100-dis)/100;       
    }
    if (fright) {
      var amt = parseInt(amt)+parseInt(fright);   
      
    }
    if (gst) {
      var gstamt = amt*parseInt(gst)/100;
      var amt = amt*(parseInt(thu)+parseInt(gst))/100;
    
    }    
    $(".gstamt").val(gstamt);
    $(".grandtotal").val(amt);
    $("#igst").val(0);
    $("#igstamt").val(0);    
  });


  $(document).on("change", "#gst", function() {
    var amt = $("#subtotal").val();
    var dis = $("#discount").val();
    var fright = $("#fright").val();    
    var gst = $("#gst").val();  
    var igst = $("#igst").val();  
    var discountamt = $("#discountamt").val();
    if (dis) {
        var disamt = amt*(100-dis)/100;
        if (fright) {          
          var amt = parseInt(disamt)+parseInt(fright);
        }else{
          var amt = parseInt(disamt);          
        }
        var gstamt = amt*gst/100;
        var amt = parseInt(amt)+parseInt(gstamt);

    }else{
        var disamt = 0;
        if (fright) {          
          var amt = parseInt(amt)+parseInt(fright);
        }

        var gstamt = amt*gst/100;
        var amt = parseInt(amt)+parseInt(gstamt);
    }
     

    $(".gstamt").val(gstamt);
    $(".grandtotal").val(amt);
    $("#igst").val(0);
    $("#igstamt").val(0);    
  });


  $(document).on("change", "#igst", function() {
    var amt = $("#subtotal").val();
    var dis = $("#discount").val();
    var fright = $("#fright").val();    
    var gst = $("#gst").val();  
    var igst = $(this).val(); 
    var discountamt = $("#discountamt").val();
    var gstamt = 0;
    if (dis) {
        var disamt = amt*dis/100;
        var amt = amt*(100-dis)/100;
    }    
    if (fright) {          
      // var amt1 = parseInt(amt)+parseInt(fright);
      var amt = parseInt(amt)+parseInt(fright);
    }
    if (gst) {          
      var gstamt = amt*gst/100;
      //var amt = amt*(100+gst)/100;
    }
    var igstamt = amt*igst/100;
    var amt = parseInt(amt)+parseInt(gstamt)+parseInt(igstamt);

    $(".gstamt").val(gstamt);
    $(".grandtotal").val(amt);
    $("#igst").val(igst);
    $("#igstamt").val(igstamt);    
  });

  // $('.subtotal').on('change', function() {

  //   var discount = $(this).val(); 
  //   var price = $("#price").val();
  //   var quantity = $("#quantity").val();
  //   if (discount == 0) {
  //     if (price && quantity)  {
  //       var total = (price*quantity);
  //       $("#total").val(total);            
  //     }
  //   }else{
  //     if (price && quantity && discount)  {
  //       var total = ((price*quantity*(100-discount))/100);
  //       $("#total").val(total);            
  //     }
  //   }  
  // });

</script>
<script>
  $(document).ready(function() {
    $("#customer_name").autocomplete({
      source: [<?php echo $customer; ?>],
      minLength: 1
    });

    $('#customer_name').on('change', function() {     

      var customer_name = $(this).val(); 
      //alert(customer_name);
      if(customer_name) {
        $.ajax({
            url: "<?php echo base_url("product/customerdetails/"); ?>" + customer_name,
            type: "GET",
            dataType: "json",
            success:function(data) { 
              if (data) {
                $('#customer_name').val(data.name);
                $('#customer_number').val(data.contect);
                $('#gst_number').val(data.gstno);
                $('#address').val(data.address);
                $('#cusid').val(data.cusid);

              }else{
                $('#customer_number').val('');
                $('#gst_number').val('');
                $('#address').val('');
                $('#cusid').val(0);
              }                         
            }
        });
      }      
  });

});
</script>
<script>
$( function() {
  //$( "#date" ).datepicker();
  $( "#date" ).datepicker({dateFormat:"d-MM-yy"}).datepicker("setDate",new Date());
} );
</script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" />

</body>
</html>



