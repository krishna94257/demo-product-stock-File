<nav class="navbar navbar-inverse">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url('product');?>">Product's Management</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Home</a></li> -->
        <!--<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('book');?>">Property<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('book');?>">Property</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url('Product/productList');?>">Product</a></li>
        
        <li><a href="<?php echo base_url('Product/bill');?>">Bill</a></li>
 
        
          <li><a href="<?php echo base_url('Product/product_import');?>">Imort</a></li>
        
         
      
     


      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
         <li><a href="<?php echo base_url('user/user_logout');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>

</nav>

