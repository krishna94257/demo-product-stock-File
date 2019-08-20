<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">



        <title>PRODUCT</title>

        

        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->

        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/detect.js"></script>

        <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url();?>assets/js/waves.js"></script>

        <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>



<!--
        <script src="../plugins/peity/jquery.peity.min.js"></script>
-->

        

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />



        <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>













    <!-- <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <meta name="author" content="Coderthemes">



    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.ico">



    <title>SELL PRODUCT</title>







    <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>/assets/css/icons.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



      <script src="<?php echo base_url()?>assests/jquery/jquery-3.1.0.min.js"></script>

  <script src="<?php echo base_url();?>assests/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url();?>assests/datatables/js/jquery.dataTables.min.js"></script>

  <script src="<?php echo base_url();?>assests/datatables/js/dataTables.bootstrap.js"></script> -->





    </head>





    <body class="fixed-left">



        <!-- Begin page -->

        <div id="wrapper">



            <!-- Top Bar Start -->

            <div class="topbar">



                <!-- LOGO -->

                <div class="topbar-left">

                    <div class="text-center">

                        <a href="<?php echo base_url();?>product" class="logo"><span> PRODUCT STOCK</span></a>

                        <!-- Image Logo here -->

                        <!--<a href="index.html" class="logo">-->

                            <i class="icon-c-logo"> <img src="<?php echo base_url();?>/assets/images/logo_sm.png" height="42"/> </i>

                            <!--<span><img src="<?php echo base_url();?>/assets/images/logo_light.png" height="20"/></span>-->

                        <!--</a>-->

                    </div>

                </div>



                <!-- Button mobile view to collapse sidebar menu -->

                <nav class="navbar-custom">



                    <ul class="list-inline float-right mb-0">

                        



                        <li class="list-inline-item notification-list">

                            <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">

                                <i class="dripicons-expand noti-icon"></i>

                            </a>

                        </li>

                         <?php
                                     $user_id = $_SESSION['user_id'];
                                      $query = $this->db->query("select * from user where user_id = '".$user_id."'");
								         $c = $query->result_array();
								         foreach($c as $user)
								         {
								   
                                   ?>

                  
                        <li class="list-inline-item dropdown notification-list">
                             
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"

                               aria-haspopup="false" aria-expanded="false">
                                 <?php
                                   if(!empty($user['user_profilepicture']))
                                   {
                                 ?>
                                <img src="<?php echo base_url();?>/application/libraries/tcpdf/examples/images/<?php echo $user['user_profilepicture'];?>" alt="user" class="rounded-circle">
                                 <?php
							      }
							      else
							      {
						    	 ?>
						    	    <img src="<?php echo base_url();?>/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
						    	 <?php
							      }
						    	 ?>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

                                <!-- item-->

                                <div class="dropdown-item noti-title">
                                   
                                    <h5 class="text-overflow"><small>Hello!<?php echo"<br>".$user['user_name']; ?></small> </h5>
                                   <?php
									}
                                   ?>
                                </div>



                                <!-- item-->
                                  <?php
                                   if($user['user_type'] == 0)
                                   {
                                 ?>
                                 <a href="<?php echo base_url('user/profile');?>" class="dropdown-item notify-item">

                                    <i class="md md-account-circle"></i> <span>Profile</span>

                                </a> 
                                <?php
							     }
                                ?>


                                <!-- item-->

                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">

                                    <i class="md md-settings"></i> <span>Settings</span>

                                </a> -->



                                <!-- item-->

                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">

                                    <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>

                                </a> -->



                                <!-- item-->

                                <a href="<?php echo base_url('product/logout');?>" class="dropdown-item notify-item">

                                    <i class="md md-settings-power"></i> <span>Logout</span>

                                </a>



                            </div>

                        </li>



                    </ul>



                    <ul class="list-inline menu-left mb-0">

                        <li class="float-left">

                            <button class="button-menu-mobile open-left waves-light waves-effect">

                                <i class="dripicons-menu"></i>

                            </button>

                        </li>

<!--
                        <li class="hide-phone app-search">

                            <form role="search" class="">

                                <input type="text" placeholder="Search..." class="form-control">

                                <a href=""><i class="fa fa-search"></i></a>

                            </form>

                        </li>
-->

                    </ul>



                </nav>



            </div>

            <!-- Top Bar End -->





            <!-- ========== Left Sidebar Start ========== -->



            <div class="left side-menu">

                <div class="sidebar-inner slimscrollleft">

                    <!--- Divider -->

                    <div id="sidebar-menu">

                        <ul>



                          <li class="text-muted menu-title"><!-- Navigation --></li>



                            <li class="has_sub">

                                <!-- <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a> -->

                                <a href="<?php echo base_url('product');?>" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <!-- <li><a href="index.html">Dashboard 1</a></li>

                                    <li><a href="dashboard_2.html">Dashboard 2</a></li>

                                    <li><a href="dashboard_3.html">Dashboard 3</a></li>

                                    <li><a href="dashboard_4.html">Dashboard 4</a></li> -->

                                </ul>

                            </li>

                             
                              <?php
                                   if($user['user_type'] == 0)
                                   {
									  // $subscribe = $user['created']+30;
									  
                                 ?>

                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span> Products </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url('product/product_add');?>"> Add </a></li>

                                    

                                    <li><a href="<?php echo base_url('product/productList');?>"> List </a></li>



                                    <li><a href="<?php echo base_url('Product/product_import');?>"> Import </a></li>                                  

                                </ul>

                            </li>

                           <?php
					   } else{
					   ?>
                             <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span>Users</span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url('user/useradd');?>"> Add </a></li>

                                    

                                    <li><a href="<?php echo base_url('user/userlist');?>"> List </a></li>



                                                                 

                                </ul>

                            </li>
                            <?php
						   }
						   ?>
                                <?php
                                   if($user['user_type'] == 0)
                                   {
                                 ?>
                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ion-ios7-paper"></i><span class="label label-primary pull-right"></span><span> Bill </span><span class="menu-arrow"></span> </a>

                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url('product/bill_add');?>">New Billing</a></li>

                                    <li><a href="<?php echo base_url('product/bill');?>"> Billing List</a></li>

                                    

                                </ul>

                            </li>

                              <?php
					            }
					        
                                   if($user['user_type'] == 0)
                                   {
                                 
					           ?>
                        
                            <li class="has_sub">

                                <a href="<?php echo base_url('product/category_list');?>" class="waves-effect"><i class="md-list"></i><span> Category </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <!-- <li><a href="<?php echo base_url('product/category_add');?>"> Add </a></li>

                                    <li><a href="<?php echo base_url('product/category_list');?>"> List </a></li> -->

                                </ul>

                            </li>
                            <?php
						   }
						   
						     
                                   if($user['user_type'] == 0)
                                   {
                                
						   ?>
        
                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect" class="waves-effect"><i class="ion-ios7-gear"></i><span> Setting </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <!-- <li><a href="<?php echo base_url('product/category_add');?>"> Add </a></li> -->

                                    <!-- <li><a href="<?php echo base_url('product/logo');?>"> Logo </a></li>
                                    <li><a href="<?php echo base_url('product/title');?>"> Title </a></li> -->
                                    <li><a href="<?php echo base_url('product/deals');?>"> Deals in </a></li>

                                </ul>
                                

                            </li>
                            <?php
						    
						    }    
                                   if($user['user_type'] == 0)
                                   {
                                 ?>
                            
                            <li class="has_sub">

                                <a href="<?php echo base_url('product/pdf');?>" class="waves-effect" class="waves-effect"><i class="ion-ios7-gear"></i><span>Pdf Setting </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <!-- <li><a href="<?php echo base_url('product/category_add');?>"> Add </a></li> -->

                                    <!-- <li><a href="<?php echo base_url('product/logo');?>"> Logo </a></li>
                                    <li><a href="<?php echo base_url('product/title');?>"> Title </a></li> -->
<!--
                                    <li><a href="<?php echo base_url('product/deals');?>"> Deals in </a></li>
-->

                                </ul>
                                

                            </li>
                            <?php
						}
						?>
                            
                            <li class="text-muted menu-title"><!-- Navigation --></li>




                             <li class="has_sub">

                                <a href="<?php echo base_url('product/logout');?>" class="waves-effect" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span> <span class="menu-arrow"></span></a>

                                
                                

                            </li>








                            <!-- <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-paint-bucket"></i> <span>All Citizen Services</span> <span class="menu-arrow"></span> </a>

                                <ul class="list-unstyled">

                                    <li><a href="ui-buttons.html">Buttons</a></li>

                                    <li><a href="ui-loading-buttons.html">Loading Buttons</a></li>

                                    <li><a href="ui-cards.html">Cards</a></li>

                                    <li><a href="ui-portlets.html">Portlets</a></li>

                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>

                                    <li><a href="ui-tabs.html">Tabs</a></li>

                                    <li><a href="ui-modals.html">Modals</a></li>

                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>

                                    <li><a href="ui-notification.html">Notification</a></li>

                                    <li><a href="ui-images.html">Images</a></li>

                                    <li><a href="ui-carousel.html">Carousel</a>

                                    <li><a href="ui-video.html">Video</a>

                                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>

                                    <li><a href="ui-typography.html">Typography</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-light-bulb"></i><span class="label label-primary pull-right">10</span><span> Complaints </span> </a>

                                <ul class="list-unstyled">

                                    <li><a href="components-grid.html">Grid</a></li>

                                    <li><a href="components-widgets.html">Widgets</a></li>

                                    <li><a href="components-nestable-list.html">Nesteble</a></li>

                                    <li><a href="components-range-sliders.html">Range sliders</a></li>

                                    <li><a href="components-masonry.html">Masonry</a></li>

                                    <li><a href="components-animation.html">Animation</a></li>

                                    <li><a href="components-sweet-alert.html">Sweet Alert</a></li>

                                    <li><a href="components-sweet-alert_2.html">Sweet Alert 2</a></li>

                                    <li><a href="components-treeview.html">Treeview</a></li>

                                    <li><a href="components-tour.html">Tour</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-spray"></i> <span> News & Updates </span> <span class="menu-arrow"></span> </a>

                                <ul class="list-unstyled">

                                    <li><a href="icons-materialdesign.html">Material Design</a></li>

                                    <li><a href="icons-ionicons.html">Ion Icons</a></li>

                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>

                                    <li><a href="icons-themifyicon.html">Themify Icons</a></li>

                                    <li><a href="icons-simple-line.html">Simple line Icons</a></li>

                                    <li><a href="icons-weather.html">Weather Icons</a></li>

                                    <li><a href="icons-typicons.html">Typicons</a></li>

                                    <li><a href="icons-dripicons.html">Dripicons</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span> Traffic & Parking </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="form-elements.html">General Elements</a></li>

                                    <li><a href="form-advanced.html">Advanced Form</a></li>

                                    <li><a href="form-validation.html">Form Validation</a></li>

                                    <li><a href="form-pickers.html">Form Pickers</a></li>

                                    <li><a href="form-wizard.html">Form Wizard</a></li>

                                    <li><a href="form-mask.html">Form Masks</a></li>

                                    <li><a href="form-summernote.html">Summernote</a></li>

                                    <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>

                                    <li><a href="form-code-editor.html">Code Editor</a></li>

                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>

                                    <li><a href="form-xeditable.html">X-editable</a></li>

                                    <li><a href="form-image-crop.html">Image Crop</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>e-Waste </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="tables-basic.html">Basic Tables</a></li>

                                    <li><a href="tables-datatable.html">Data Table</a></li>

                                    <li><a href="tables-editable.html">Editable Table</a></li>

                                    <li><a href="tables-responsive.html">Responsive Table</a></li>

                                    <li><a href="tables-foo-tables.html">FooTable</a></li>

                                    <li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>

                                    <li><a href="tables-tablesaw.html">Tablesaw Tables</a></li>

                                    <li><a href="tables-jsgrid.html">JsGrid Tables</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-bar-chart"></i><span class="label label-pink pull-right">Employee Corner</span><span> Charts </span></a>

                                <ul class="list-unstyled">

                                  <li><a href="chart-flot.html">Flot Chart</a></li>

                                    <li><a href="chart-morris.html">Morris Chart</a></li>

                                    <li><a href="chart-chartjs.html">Chartjs</a></li>

                                    <li><a href="chart-peity.html">Peity Charts</a></li>

                                    <li><a href="chart-chartist.html">Chartist Charts</a></li>

                                    <li><a href="chart-c3.html">C3 Charts</a></li>

                                    <li><a href="chart-nvd3.html"> Nvd3 Charts</a></li>

                                    <li><a href="chart-sparkline.html">Sparkline charts</a></li>

                                    <li><a href="chart-radial.html">Radial charts</a></li>

                                    <li><a href="chart-other.html">Other Chart</a></li>

                                    <li><a href="chart-ricksaw.html">Ricksaw Chart</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-location-pin"></i><span> e-Hospital </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="map-google.html"> Google Map</a></li>

                                    <li><a href="map-vector.html"> Vector Map</a></li>

                                </ul>

                            </li>



                            <li class="text-muted menu-title">More</li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Important Information </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                  <li><a href="page-starter.html">Starter Page</a></li>

                                    <li><a href="page-login.html">Login</a></li>

                                    <li><a href="page-login-v2.html">Login v2</a></li>

                                    <li><a href="page-register.html">Register</a></li>

                                    

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-gift"></i><span> Extras </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="extra-profile.html">Profile</a></li>

                                    <li><a href="extra-timeline.html">Timeline</a></li>

                                    <li><a href="extra-sitemap.html">Site map</a></li>

                                    <li><a href="extra-invoice.html">Invoice</a></li>

                                    <li><a href="extra-email-template.html">Email template</a></li>

                                    <li><a href="extra-maintenance.html">Maintenance</a></li>

                                    <li><a href="extra-coming-soon.html">Coming-soon</a></li>

                                    <li><a href="extra-faq.html">FAQ</a></li>

                                    <li><a href="extra-search-result.html">Search result</a></li>

                                    <li><a href="extra-gallery.html">Gallery</a></li>

                                    <li><a href="extra-gallery_2.html">Gallery 2</a></li>

                                    <li><a href="extra-pricing.html">Pricing</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-crown"></i><span class="label label-success pull-right">3</span><span> Apps </span></a>

                                <ul class="list-unstyled">

                                    <li><a href="apps-calendar.html"> Calendar</a></li>

                                    <li><a href="apps-contact.html"> Contact</a></li>

                                    <li><a href="apps-taskboard.html"> Taskboard</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-email"></i><span> Email </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="email-inbox.html"> Inbox</a></li>

                                    <li><a href="email-read.html"> Read Mail</a></li>

                                    <li><a href="email-compose.html"> Compose Mail</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-widget"></i><span> Layouts </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="layout-leftbar_2.html"> Leftbar with User</a></li>

                                    <li><a href="layout-menu-collapsed.html"> Menu Collapsed</a></li>

                                    <li><a href="layout-menu-small.html"> Small Menu</a></li>

                                    <li><a href="layout-header_2.html"> Header style</a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-share"></i><span>Multi Level </span> <span class="menu-arrow"></span></a>

                                <ul>

                                    <li class="has_sub">

                                        <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span>  <span class="menu-arrow"></span></a>

                                        <ul>

                                            <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>

                                            <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>

                                            <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>

                                        </ul>

                                    </li>

                                    <li>

                                        <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>

                                    </li>

                                </ul>

                            </li>



                            <li class="text-muted menu-title">Extra</li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Crm </span> <span class="menu-arrow"></span></a>

                                <ul class="list-unstyled">

                                    <li><a href="crm-dashboard.html"> Dashboard </a></li>

                                    <li><a href="crm-contact.html"> Contacts </a></li>

                                    <li><a href="crm-opportunities.html"> Opportunities </a></li>

                                    <li><a href="crm-leads.html"> Leads </a></li>

                                    <li><a href="crm-customers.html"> Customers </a></li>

                                </ul>

                            </li>



                            <li class="has_sub">

                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart"></i><span class="label label-warning pull-right">6</span><span> eCommerce </span></a>

                                <ul class="list-unstyled">

                                    <li><a href="ecommerce-dashboard.html"> Dashboard</a></li>

                                    <li><a href="ecommerce-products.html"> Products</a></li>

                                    <li><a href="ecommerce-product-detail.html"> Product Detail</a></li>

                                    <li><a href="ecommerce-product-edit.html"> Product Edit</a></li>

                                    <li><a href="ecommerce-orders.html"> Orders</a></li>

                                    <li><a href="ecommerce-sellers.html"> Sellers</a></li>

                                </ul>

                            </li> -->



                        </ul>

                        <div class="clearfix"></div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

            <!-- Left Sidebar End -->

