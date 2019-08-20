
  <script src="<?php echo base_url('assests/jquery/jquery-3.1.0.min.js')?>"></script>
  <script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>
  <link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">


<style>

  #datatable-editable_paginate ul.pagination {
   width: 460px
  }


  #datatable-editable_wrapper {
      display: inherit !important;
  }

  .form-inline {
      display: block !important;
  }

  .pagination > li > a {
    float: left !important;
  }

</style>


            <!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container-fluid">



                        <div class="row">



                            <div class="col-sm-12">



                                <div class="card-box">
                                  <h4 class="m-t-0 header-title"> PDF</h4>
                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="m-b-30">

                                                <a href="<?php echo base_url("product/pdf");?>" >

                                                    <button id="addToTable" class="btn btn-pink btn-rounded waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></button>

                                                </a>

                                            </div>

                                        </div>

                                    </div>


									<div class="table-responsive">
                                    <table class="table table-striped add-edit-table" id="datatable-editable">

                                        <thead>

                                        <tr>

                                            <th> S NO. </th> 
                                                              
                                            <th> Address </th> 
                                            
                                            <th>Telephone</th>

                                            <th>GSTIN No</th>

                                            <th>Bank Detail</th>

                                            <th> A/C No.</th>

                                            <th>IFSC No</th>

                                            <th> Branch</th>

                                            <th>Auth. Distributer </th>
                                            
                                            <th>Terms & Conditions</th>
                                            
                                            <th>Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>



                                        <?php $i=1; foreach($list as $book){?>

                                        <tr>

                                            <td><?php echo $i;?></td>
                                             <?php
                                               //~ $query = $this->db->query("select * from user where user_id = ".$book->user_id."");
                                               //~ $r = $query->result_array();
                                               //~ foreach($r as $n)
                                               //~ {
                                             ?>
                                             <td><?php echo $book->address; ?></td>
                                             <?php
										      //  }
										    ?>

                                            <td><?php echo $book->telephone;?></td>

                                            <td><?php echo $book->gstin_no;?></td>

                                            <td><?php echo $book->bank_detail;?></td>

                                            <td><?php echo $book->ac_no;?></td>

                                            <td><?php echo $book->ifsc_no;?></td>

                                            <td><?php echo $book->branch;?></td>

                                             <td><?php echo $book->auth_distributor;?></td>
                                              
                                              <td><?php echo $book->terms;?></td>
                                              

                                            <td class="actions">

                                                <a href="<?php echo base_url("product/pdfedit/$book->id");?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>



                                                <a onclick="delete_book(<?php echo $book->id;?>)" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>



                                               <!--  <a href="#" class="hidden on-editing save-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save"><i class="fa fa-save"></i></a>



                                                <a href="#" class="hidden on-editing cancel-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel"><i class="fa fa-times"></i></a> -->

                                            </td>

                                            <!-- <td>

                                    <a href="<?php echo base_url("product/product_add/$book->id");?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>



                                    <button class="btn btn-danger" onclick="delete_book(<?php echo $book->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>





                                        </td> -->

                      </tr>

                     <?php $i++; } ?>



                                        <!-- <tr class="gradeX">

                                            <td>Trident</td>

                                            <td>Internet

                                                Explorer 4.0

                                            </td>

                                            <td>Win 95+</td>

                                            <td class="actions">

                                                <a href="#" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

                                                <a href="#" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>

                                                <a href="#" class="hidden on-editing save-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save"><i class="fa fa-save"></i></a>

                                                <a href="#" class="hidden on-editing cancel-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel"><i class="fa fa-times"></i></a>

                                            </td>

                                        </tr> -->

                                        

                                        </tbody>

                                    </table>
                                    </div>

                                </div>

                            </div>

                            <!-- end: page -->



                        </div> <!-- end Panel -->







                    </div> <!-- container -->



                </div> <!-- content -->



                <footer class="footer text-right">
                   <?php
                     $year = date("Y");
                     
                   ?>
                    &copy; <?php echo $year; ?>. All rights reserved.

                </footer>



            </div>





            <!-- ============================================================== -->

            <!-- End Right content here -->

            <!-- ============================================================== -->





            



        </div>



        <script type="text/javascript">

  $(document).ready( function () {

      $('#datatable-editable').DataTable();

  } );

    var save_method; //for save method string

    var table;





    function add_book()

    {

      save_method = 'add';

      $('#form')[0].reset(); // reset form on modals

      $('#modal_form').modal('show'); // show bootstrap modal

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title

    }





    function add_multiple()

    {

      save_method = 'add';

      $('#form')[0].reset(); // reset form on modals

      $('#uploadModal').modal('show'); // show bootstrap modal

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title

    }



    function edit_book(id)

    {

      save_method = 'update';

      $('#form')[0].reset(); // reset form on modals



      //Ajax Load data from ajax

      $.ajax({

        url : "<?php echo site_url('index.php/book/ajax_edit/')?>/" + id,

        type: "GET",

        dataType: "JSON",

        success: function(data)

        {



            $('[name="book_id"]').val(data.book_id);

            //$('[name="book_isbn"]').val(data.book_isbn);

            $('[name="book_title"]').val(data.book_title);

            $('[name="book_author"]').val(data.book_author);

            $('[name="book_category"]').val(data.book_category);





            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded

            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title



        },

        error: function (jqXHR, textStatus, errorThrown)

        {

            alert('Error get data from ajax');

        }

    });

    }







    function save()

    {

      var url;



     

      if(save_method == 'add')

      {

          url = "<?php echo site_url('index.php/book/book_add')?>";

      }

      else

      {

        url = "<?php echo site_url('index.php/book/book_update')?>";

      }

      var name = $("#name").val();

      var title = $("#title").val();

      var address = $("#address").val();

      var cont = $("#cont").val();

      cont = cont.replace(/[^0-9]/g,'');

      

      $("#error_mess1").html('');

      $("#error_mess2").html('');

      $("#error_mess3").html('');

      if (title== "" || address== "" || cont== "") {

       if (title== "") {

          $("#error_mess1").html("Title fields required");

        }

        if(address== ""){

          $("#error_mess2").html("Address fields required");

        }

        if(cont== ""){

          $("#error_mess3").html("Contact number fields required");          

        }        

        

        return false;

      }else{

        if (cont.length != 10)

        {

          $("#error_mess3").html("Contact number must be 10 digits.");             

            return false;

        }else{

         // ajax adding data to database

            $.ajax({

              url : url,

              type: "POST",

              data: $('#form').serialize(),

              dataType: "JSON",

              success: function(data)

              {

                 //if success close modal and reload ajax table

                 $('#modal_form').modal('hide');

                location.reload();// for reload a page

              },

              error: function (jqXHR, textStatus, errorThrown)

              {

                  alert('Error adding / update data');

              }

          });

        }

      }

    }



    function delete_book(id)

    {

      if(confirm('Are you sure delete this data?'))

      {

        // ajax delete data from database

          $.ajax({

            url : "<?php echo site_url('product/deletepdf')?>/"+id,

            type: "POST",

            dataType: "JSON",

            success: function(data)

            {

               

               location.reload();

            },

            error: function (jqXHR, textStatus, errorThrown)

            {

                alert('Error deleting data');

            }

        });



      }

    }



  </script>





