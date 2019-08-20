<?php
  $user_id = $_SESSION['user_id'];
?>





            <!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container-fluid">





                        <!-- Page-Title -->

                        <div class="row">

                            <div class="col-sm-12">

                                <!-- <div class="btn-group pull-right m-t-15">

                                    <button type="button" class="btn btn-pink dropdown-toggle waves-effect waves-light">Settings</button>
                                </div> -->



                                <h4 class="page-title">Dashboard</h4>

                                <p class="text-muted page-title-alt">Welcome to Sell Product.</p>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <a href="<?php echo base_url();?>product/productList"><div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-description text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo countWhere("product",array('user_id'=>$user_id)); ?></h2>
                                    <div class="text-muted m-t-5">Total Product</div>
                                </div></a>
                            </div>
                            
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <a href="<?php echo base_url();?>product/product_more"><div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-description text-info"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo countWhere("product", array('quantity >=' => 100,'user_id' => $user_id )); ?></h2>
                                    <div class="text-muted m-t-5">More then 100 Product </div>
                                </div></a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <a href="<?php echo base_url();?>product/product_less"><div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-equalizer text-info"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo countWhere("product", array('quantity <' => 10,'user_id' => $user_id) ); ?></h2>
                                    <div class="text-muted m-t-5">Less then 10 Product</div>
                                </div></a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <a href="<?php echo base_url();?>product/bill"><div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-add-shopping-cart text-pink"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo countWhere("bill_add",array('user_id' => $user_id)); ?></h2>
                                    <div class="text-muted m-t-5">Sales</div>
                                </div></a>
                            </div>
                        </div>



                        <div class="row">

                            <!-- <div class="col-md-6 col-lg-6 col-xl-3">

                                 <a href="<?php echo base_url();?>product/productList"><div class="widget-bg-color-icon card-box fadeInDown animated">

                                    <div class="bg-icon bg-icon-info pull-left">

                                        <i class="md md-description text-info"></i>

                                    </div>

                                    <div class="text-right">

                                        <h3 class="text-dark"><b class="counter"><?php echo countData("product"); ?></b></h3>

                                        <a href="#"><p class="text-muted mb-0">Total Product's</p></a>

                                    </div>

                                    <div class="clearfix"></div>

                                </div></a>

                            </div>



                            <div class="col-md-6 col-lg-6 col-xl-3">

                                <a href="<?php echo base_url();?>product/product_more"><div class="widget-bg-color-icon card-box">

                                    <div class="bg-icon bg-icon-purple pull-left">

                                        <i class="md md-description text-purple"></i>

                                    </div>

                                    <div class="text-right">

                                        <h3 class="text-dark"><b class="counter"><?php echo countWhere("product", array('quantity >=' => 100 )); ?></b></h3>

                                        <p class="text-muted mb-0">More then 100 Product's</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div></a>

                            </div>



                            <div class="col-md-6 col-lg-6 col-xl-3">

                                <a href="<?php echo base_url();?>product/product_less"><div class="widget-bg-color-icon card-box">

                                    <div class="bg-icon bg-icon-info pull-left">

                                        <i class="md md-equalizer text-info"></i>

                                    </div>

                                    <div class="text-right">

                                        <h3 class="text-dark"><b class="counter"><?php echo countWhere("product", array('quantity <' => 10) ); ?></b></h3>

                                        <p class="text-muted mb-0">Less then 10 Product's</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div></a>

                            </div>



                            <div class="col-md-6 col-lg-6 col-xl-3">

                                 <a href="<?php echo base_url();?>product/bill"><div class="widget-bg-color-icon card-box">

                                    <div class="bg-icon bg-icon-purple pull-left">

                                        <i class="md md-add-shopping-cart text-pink"></i>

                                    </div>

                                    <div class="text-right">

                                        <h3 class="text-dark"><b class="counter"><?php echo countData("bill_add"); ?></b></h3>

                                        <p class="text-muted mb-0">Total Billing</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                            </div></a> -->

                        </div>



                        <!-- <div class="row">



                            <div class="col-lg-4">

                                <div class="card-box">

                                    <h4 class="text-dark header-title m-t-0 m-b-30">Total Sell </h4>



                                    <div class="widget-chart text-center">

                                        <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#34d3eb" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>

                                        <h5 class="text-muted m-t-20 font-16">Total Solved Complaint today</h5>

                                        <h2 class="font-600">75</h2>

                                        <ul class="list-inline m-t-15">

                                            <li class="list-inline-item">

                                                <h5 class="text-muted m-t-20 font-16">Target</h5>

                                                <h4 class="m-b-0">1000</h4>

                                            </li>

                                            <li class="list-inline-item">

                                                <h5 class="text-muted m-t-20 font-16">Last week</h5>

                                                <h4 class="m-b-0">523</h4>

                                            </li>

                                            <li class="list-inline-item">

                                                <h5 class="text-muted m-t-20 font-16">Last Month</h5>

                                                <h4 class="m-b-0">965</h4>

                                            </li>

                                        </ul>



                                    </div>

                                </div>



                            </div>



                            <div class="col-lg-8">

                                <div class="card-box">

                                    <h4 class="text-dark header-title m-t-0">Work Progress</h4>

                                    <div class="text-center">

                                        <ul class="list-inline chart-detail-list">

                                            <li>

                                                <h5><i class="fa fa-circle m-r-5" style="color:#7e57c2;"></i>Desktops</h5>

                                            </li>

                                            <li>

                                                <h5><i class="fa fa-circle m-r-5" style="color:#34d3eb;"></i>Tablets</h5>

                                            </li>

                                        </ul>

                                    </div>

                                    <div id="morris-line-example" style="height: 300px;"></div>

                                </div>

                            </div>

                        </div> -->

                        <!-- end row -->







                        <div class="row">


<!-- 
                            <div class="col-lg-6">



                                <div class="card-box">

                                    <h4 class="text-dark header-title m-t-0">Work Analytics</h4>

                                    <p class="text-muted m-b-10 font-13">

                                        Your awesome text goes here.

                                    </p>

                                    <div class="text-center">

                                        <ul class="list-inline chart-detail-list">

                                            <li class="list-inline-item">

                                                <h5><i class="fa fa-circle m-r-5" style="color: #7e57c2;"></i>Road</h5>

                                            </li>

                                            <li class="list-inline-item">

                                                <h5><i class="fa fa-circle m-r-5" style="color: #b39ddb;"></i>Water</h5>

                                            </li>

                                            <li class="list-inline-item">

                                                <h5><i class="fa fa-circle m-r-5" style="color: #ede7f6;"></i>Hospitals</h5>

                                            </li>

                                        </ul>

                                    </div>

                                    <div id="morris-bar-stacked" style="height: 303px;"></div>

                                </div>



                            </div> -->



                            <!-- col -->



                            <div class="col-lg-12">

                                <div class="card-box">

                                    <a href="<?php echo base_url(); ?>product/bill" class="pull-right btn btn-pink btn-sm waves-effect waves-light">View All</a>

                                    <h4 class="text-dark header-title m-t-0">Recent Sell Product's</h4>

                                    <p class="text-muted m-b-30 font-13">

                                        <!-- Your awesome text goes here. -->

                                    </p>



                                    <div class="table-responsive">

                                        <table class="table table-actions-bar mb-0">

                                            <thead>

                                            <tr>
                                                <th>S NO.</th>

                                                <th>CUSTOMER NAME</th>

                                                <th> BILL DATE </th>

                                                <th> AMOUNT </th>



                                                <!-- <th style="min-width: 80px;">Action</th> -->

                                            </tr>

                                            </thead>

                                            <tbody>                                           
                                            <?php $list = array_reverse($list);
                                            $count = count($list);
                                            if ($count >= 5) {
                                               $count = 5;
                                            }
                                            for ($i=0; $i< $count; $i++) { //foreach($list as $book){?>
                                            <tr>
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $list[$i]->customer_name;?></td>
                                            <td><?php echo date("jS F, Y", strtotime($list[$i]->created));?></td>
                                            <td><?php echo $list[$i]->grandtotal;?></td>

                                            </tr>
                                        <?php } ?>
                                            <!-- <tr>

                                                <td><img src="<?php echo base_url();?>/assets/images/products/water.png" class="thumb-sm" alt=""> </td>

                                                <td>08/10/2015</td>

                                                <td><a href="#">UB#160924</a></td>

                                                <td>

                                                    <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>

                                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>

                                                </td>

                                            </tr>



                                            <tr>

                                                <td><img src="<?php echo base_url();?>/assets/images/products/garbage.png" class="thumb-sm" alt=""> </td>

                                                <td>08/10/2015</td>

                                                <td><a href="#">UB#160923</a></td>

                                                <td>

                                                    <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>

                                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>

                                                </td>

                                            </tr>



                                            <tr>

                                                <td><img src="<?php echo base_url();?>/assets/images/products/road.png" class="thumb-sm" alt=""> </td>

                                                <td>08/10/2015</td>

                                                <td><a href="#">UB#160922</a></td>

                                                <td>

                                                    <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>

                                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>

                                                </td>

                                            </tr>



                                            <tr>

                                                <td><img src="<?php echo base_url();?>/assets/images/products/steet-light.png" class="thumb-sm" alt=""> </td>

                                                <td>07/10/2015</td>

                                                <td><a href="#">UB#160921</a></td>

                                                <td>

                                                    <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>

                                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>

                                                </td>

                                            </tr>



                                            <tr>

                                                <td><img src="<?php echo base_url();?>/assets/images/products/water.png" class="thumb-sm" alt=""> </td>

                                                <td>07/10/2015</td>

                                                <td><a href="#">UB#160920</a></td>

                                                <td>

                                                    <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>

                                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>

                                                </td>

                                            </tr> -->



                                            </tbody>

                                        </table> 

                                    </div>



                                </div>

                            </div>

                            <!-- end col -->



                        </div>

                        <!-- end row -->

            

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        

                        <div class="row">

                        

                        

                        <div id="map"></div>

              <script>

                              var customLabel = {

                                restaurant: {

                                  label: 'R'

                                },

                                bar: {

                                  label: 'B'

                                }

                              };

                        

                                function initMap() {

                                var map = new google.maps.Map(document.getElementById('map'), {

                                  center: new google.maps.LatLng(-33.863276, 151.207977),

                                  zoom: 12

                                });

                                var infoWindow = new google.maps.InfoWindow;

                        

                                  // Change this depending on the name of your PHP or XML file

                                  downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {

                                    var xml = data.responseXML;

                                    var markers = xml.documentElement.getElementsByTagName('marker');

                                    Array.prototype.forEach.call(markers, function(markerElem) {

                                      var id = markerElem.getAttribute('id');

                                      var name = markerElem.getAttribute('name');

                                      var address = markerElem.getAttribute('address');

                                      var type = markerElem.getAttribute('type');

                                      var point = new google.maps.LatLng(

                                          parseFloat(markerElem.getAttribute('lat')),

                                          parseFloat(markerElem.getAttribute('lng')));

                        

                                      var infowincontent = document.createElement('div');

                                      var strong = document.createElement('strong');

                                      strong.textContent = name

                                      infowincontent.appendChild(strong);

                                      infowincontent.appendChild(document.createElement('br'));

                        

                                      var text = document.createElement('text');

                                      text.textContent = address

                                      infowincontent.appendChild(text);

                                      var icon = customLabel[type] || {};

                                      var marker = new google.maps.Marker({

                                        map: map,

                                        position: point,

                                        label: icon.label

                                      });

                                      marker.addListener('click', function() {

                                        infoWindow.setContent(infowincontent);

                                        infoWindow.open(map, marker);

                                      });

                                    });

                                  });

                                }

                        

                        

                        

                              function downloadUrl(url, callback) {

                                var request = window.ActiveXObject ?

                                    new ActiveXObject('Microsoft.XMLHTTP') :

                                    new XMLHttpRequest;

                        

                                request.onreadystatechange = function() {

                                  if (request.readyState == 4) {

                                    request.onreadystatechange = doNothing;

                                    callback(request, request.status);

                                  }

                                };

                        

                                request.open('GET', url, true);

                                request.send(null);

                              }

                        

                              function doNothing() {}

                            </script>

                            <script async defer

                            src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">

                            </script>

                        

                        </div>

                        

                        

                        

                        

                        



                    </div> <!-- container -->



                </div> <!-- content -->



                <footer class="footer text-right">

                    &copy; 2016 - 2018. All rights reserved.

                </footer>



            </div>





            <!-- ============================================================== -->

            <!-- End Right content here -->

            <!-- ============================================================== -->





            <!-- Right Sidebar -->

            <div class="side-bar right-bar nicescroll">

                <h4 class="text-center">Chat</h4>

                <div class="contact-list nicescroll">

                    <ul class="list-group contacts-list">

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-1.jpg" alt="">

                                </div>

                                <span class="name">Chadengle</span>

                                <i class="fa fa-circle online"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-2.jpg" alt="">

                                </div>

                                <span class="name">Tomaslau</span>

                                <i class="fa fa-circle online"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-3.jpg" alt="">

                                </div>

                                <span class="name">Stillnotdavid</span>

                                <i class="fa fa-circle online"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-4.jpg" alt="">

                                </div>

                                <span class="name">Kurafire</span>

                                <i class="fa fa-circle online"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-5.jpg" alt="">

                                </div>

                                <span class="name">Shahedk</span>

                                <i class="fa fa-circle away"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-6.jpg" alt="">

                                </div>

                                <span class="name">Adhamdannaway</span>

                                <i class="fa fa-circle away"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-7.jpg" alt="">

                                </div>

                                <span class="name">Ok</span>

                                <i class="fa fa-circle away"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-8.jpg" alt="">

                                </div>

                                <span class="name">Arashasghari</span>

                                <i class="fa fa-circle offline"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-9.jpg" alt="">

                                </div>

                                <span class="name">Joshaustin</span>

                                <i class="fa fa-circle offline"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                        <li class="list-group-item">

                            <a href="#">

                                <div class="avatar">

                                    <img src="<?php echo base_url();?>/assets/images/users/avatar-10.jpg" alt="">

                                </div>

                                <span class="name">Sortino</span>

                                <i class="fa fa-circle offline"></i>

                            </a>

                            <span class="clearfix"></span>

                        </li>

                    </ul>

                </div>

            </div>

            <!-- /Right-bar -->



        </div>

        <!-- END wrapper -->







       
