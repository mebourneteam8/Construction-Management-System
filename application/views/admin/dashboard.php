<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs === ===================== -->
 <title><?=$this->user_model->sitename?> :: Admin Dashboard</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php $this->load->view("admin/include_headlinks.php"); ?>

 </head>

 <body>
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("admin/include_header.php"); ?>
 <!-- Header Container / End -->

    <!--  main content starts -->
    <div id="dashboard" class="gradient" style="background:#555 url('<?=base_url()?>img/pbg10.jpg') repeat; background-attachment:fixed;">

    <!-- Content
    ================================================== -->
    <div class="container   margin-top-60">
    	<div class="row">

    		<!-- Sidebar
    		================================================== -->
    		<div class="col-lg-4 col-md-4">
          <div class="box3d">
                <h5 class="cblue"> WELCOME <b><i class="fa fa-user"></i> <?=$this->session->admin_data->full_name?></b></h5>
                <div class="star-rating">
                  <h6 class="">
                    <b>No.Of Times Visits:</b> <?=$this->session->admin_data->visits + 1?> 
                    <br/>
                    <br/><b>Last Logged In: </b> <?php if($this->session->admin_data->last_login <> '0000-00-00 00:00:00') echo date('d-M-Y h:i A', strtotime($this->session->admin_data->last_login))?></h6>
                </div>
            </div>


    			<!-- Contact -->
    			<div class="boxed-widget margin-top-20 margin-bottom-30 box3d2">

              <center><h4 style=""><b><i class="fa fa-book"></i> Account Menu </b></h4></center>

              <div class="" style="color:darkblue; text-align:left; padding:3px 8px; margin-bottom:5px; font-size: 16px; ">
            <div class="col_head" style="margin-top:5px; background-color: purple; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/staff" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-users"></i> &nbsp; Manage Staff </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: blue; text-align: left; color: #fff;">  
<a href="<?=base_url()?>admin/new_staff" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; &raquo;&raquo; <i class="fa fa-plus"></i> Add New Staff </a>
</div>

            <div class="col_head" style="margin-top:5px; background-color: brown; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/orders" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp;  <i class="fa fa-calendar"></i> &nbsp; Manage Orders </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: blue; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/new_order" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; &raquo;&raquo; <i class="fa fa-plus"></i>  Add New Order </a>
</div>

            <div class="col_head" style="margin-top:5px; background-color: red; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/machinery" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-cubes"></i> &nbsp; Manage Machinery </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: blue; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/new_machinery" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; &raquo;&raquo; <i class="fa fa-plus"></i>  Add New machinery </a>
</div>

            <div class="col_head" style="margin-top:5px; background-color: orange; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/sites" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-tags"></i> &nbsp; Manage Sites </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: blue; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/new_site" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; &raquo;&raquo; <i class="fa fa-plus"></i>  Add New site </a>
</div>

            <div class="col_head" style="margin-top:5px; background-color: green; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/edit_profile" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-file-o"></i> &nbsp; Edit Profile </a>
</div>

<div class="col_head" style="margin-top:5px; background-color: grey; text-align: left; color: #fff;">
 <a href="<?=base_url()?>admin/logout" class="gplus-profile"  style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-users"></i> &nbsp; Logout</a>
</div>

              </div>

    			</div>
    			<!-- Contact / End-->

    		</div>
    		<!-- Sidebar / End -->


    		<!-- Content
    		================================================== -->
    		<div class="col-lg-8 col-md-8 padding-left-30">

<?=$this->session->flashdata('messagePr')?>


      <div class="row">
      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-1">
          <div class="dashboard-stat-content"><h4><?=$tstaf?></h4> <span>Total Staff</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-users"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/staff"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-3">
          <div class="dashboard-stat-content"><h4><?=$torde?></h4> <span>Total Orders</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-cubes"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/orders"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
<p>&nbsp;</p>
    </div>
      <div class="row">

      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-4">
          <div class="dashboard-stat-content"><h4><?=$tmach?></h4> <span>Total Machinery</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-hourglass-1"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/machinery"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-2">
          <div class="dashboard-stat-content"><h4><?=$tsite?></h4> <span>Total Sites</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-check-square-o"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/sites"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <p>&nbsp;</p>


    </div>

         <div class="clearfix">&nbsp;</div>

          <!-- row Listings Container ends -->

</div>

</div>


</div>
<!--  main content ends -->

</div>


    <!-- Copyrights -->
      <div class="row">
      <div class="copyrights" style="color:#fff;"><em><?=$this->user_model->copyright?></em></div>
      </div>

</div>


    <!-- Scripts
    ==================================================
    <script type="text/javascript" src="<?=base_url()?>scripts/jquery-2.2.0.min.js"></script>-->
    <script type="text/javascript" src="<?=base_url()?>scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/chosen.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/slick.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/rangeslider.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/counterup.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/custom.js"></script>



 </body>

 </html>
