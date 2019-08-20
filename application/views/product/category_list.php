





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

                                  <h4 class="m-t-0 header-title"> CATEGORY </h4>





                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="m-b-30">

                                                <!-- <a href="<?php echo base_url("product/product_add");?>" >

                                                    <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></button>

                                                </a> -->

                                                <button type="button" class="btn btn-pink btn-rounded waves-effect waves-light" onclick="add_book()">Add</button>

                                            </div>

                                        </div>



                                       

                                        

                                    </div>



                                    <table class="table table-striped add-edit-table" id="datatable-editable">

                                        <thead>

                                        <tr>

                                            <th> S No. </th>                   

                                            <th> Category Name </th>
                                            <!-- <th> Category Value </th> -->

                                           

                                            <th>Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>



                                        <?php  $i=1; foreach($list as $book){?>

                                        <tr>

                                            <td><?php echo $i;?></td>               

                                            <td><?php echo $book->category;?></td>
                                            <!-- <td><?php echo $book->size;?></td> -->

                                            



                                            <td class="actions">

                                                <a onclick="edit_book(<?php echo $book->id;?>)" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>



                                                <a onclick="delete_book(<?php echo $book->id;?>)" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>



                                               <!--  <a href="#" class="hidden on-editing save-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save"><i class="fa fa-save"></i></a>



                                                <a href="#" class="hidden on-editing cancel-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel"><i class="fa fa-times"></i></a> -->

                                            </td>

                                         

                                          </tr>

                                         <?php $i++; }?>



                                        

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <!-- end: page -->



                        </div> <!-- end Panel -->







                    </div> <!-- container -->



                </div> <!-- content -->



                <footer class="footer text-right">

                    &copy; 2016 - 2018. All rights reserved.

                </footer>



            </div>





            



            <div id="CenterModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CenterModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h4 class="modal-title" id="CenterModalLabel">CATEGORY</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                        </div>

                        <div class="modal-body">

                          <form action="#" id="form" class="form-horizontal">
                            <div>
                          <input id="id" name="id" type="hidden" value="">
                          <input id="category" name="category" type="text" class="form-control" placeholder="Category Name" value="">
                          <input id="size" name="size" type="hidden" class="form-control" placeholder="Category Value" value="">

                          <span  id="error_mess1" style="color: red; text-align: center;"></span>
                          </div>
                          <!-- <div>
                          

                          <span  id="error_mess2" style="color: red; text-align: center;"></span>
                          </div>
                          </form> -->

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary btn-rounded waves-effect waves-light" data-dismiss="modal">Close</button>





                            <button type="button" onclick="save()" class="btn btn-pink btn-rounded waves-effect waves-light">Save</button>

                        </div>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div>





            <!-- ============================================================== -->

            <!-- End Right content here -->

            <!-- ============================================================== -->





            



        </div>


<script type="text/javascript">
  $(document).ready( function () {
    $(document).on("change", "#category", function() {
      var category = $(this).val().toUpperCase();    
      //alert(category);
      if (category) {
        var res = category.split("X");
        var mult = 1;
        for (var i = 0; i < res.length; i++) {       
           mult =  mult*res[i];
       }
        
      }
      $("#category").val(category);
      $("#size").val(mult);    
    });
  });
</script>

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

      $('#CenterModal').modal('show'); // show bootstrap modal

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

      //alert("hi");

      //Ajax Load data from ajax

      $.ajax({

        url : "<?php echo site_url('product/category_get')?>/" + id,

        type: "GET",

        dataType: "JSON",

        success: function(data)

        {

          //alert(data);

            $('[name="id"]').val(data.id);

            //$('[name="book_isbn"]').val(data.book_isbn);

            $('[name="category"]').val(data.category);
            $('[name="size"]').val(data.size);

            





            $('#CenterModal').modal('show'); // show bootstrap modal when complete loaded

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

        url = "<?php echo site_url('product/category_add')?>";

      }else{

        url = "<?php echo site_url('product/category_update')?>";

      }

      var category = $("#category").val();

      // var title = $("#title").val();

      // var address = $("#address").val();

      // var cont = $("#cont").val();

      

      //alert(category);

      $("#error_mess1").html('');

      

      if (category== "") {

        $("#error_mess1").html("Category fields required");

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

                 $('#CenterModal').modal('hide');

                location.reload();// for reload a page

              },

              error: function (jqXHR, textStatus, errorThrown)

              {

                  alert('Error adding / update data');

              }

          });

        }

      }

    



    function delete_book(id)

    {

      if(confirm('Are you sure delete this data?'))

      {

        // ajax delete data from database

          $.ajax({

            url : "<?php echo site_url('product/category_delete')?>/"+id,

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





