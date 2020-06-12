<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs
 ================================================== -->
 <title><?=$this->user_model->sitename?> :   Machinery Details</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <?php $this->load->view("admin/include_headlinks.php"); ?>

 </head>

 <body>
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("admin/include_header.php"); ?>
 <!-- Header Container / End -->
 <div id="dashboard" style="background:#f1f1f1 url('<?=base_url()?>img/pbg10.jpg') repeat;">

   <div class="container   margin-top-10">
  <!-- Content
  ================================================== -->

    <!-- Titlebar -->
    <div id="titlebar">
      <div class="col-md-10 col-md-offset-1">
          <h2><b> <i class="fa fa-cubes"></i>  Machinery Details</b></h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul style="float: right;">
              <li><b><a href="<?=base_url()?>admin/dashboard"><i class="sl sl-icon-grid"></i> Dashboard</a></b></li>
            </ul>
          </nav>
      </div>
    </div>


    <!-- body content st -->
      <div class="col-md-8 col-md-offset-2" >
        <div class="row">
          <div id="add-listing">
<br/>
    <?=$this->session->flashdata('messagePr')?>

                    <!-- Section -->
                    <div class="add-listing-section">

                      <!-- Headline -->
                      <div class="add-listing-headline">
                        <h3><i class="list-box-icon fa fa-edit"></i> Update Machinery Details</h3>
                      </div>

                      <!-- Row -->
                      <form method="post" action="<?=base_url()?>admin/edit_machinery_sub/<?=md5($res->id)?>" enctype="multipart/form-data">
                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><b> Name of the Machinery: * </b></h5>
                              <input type="Text" name="machinery_name" required value="<?=$res->machinery_name?>" />
                        </div>
                      </div>

                          <div class="row with-forms">                                
                                  <div class="col-md-6">
                                    <h5><b>Type of Machinery:  *</b></h5>
                                    <input type="text" name="type" required  value="<?=$res->type?>"/>
                                  </div>
                                  <div class="col-md-6">
                                    <h5><b>Owner Name: *</b></h5>
                                    <input type="text" name="owner" required  value="<?=$res->owner?>"/>
                                  </div>
                           </div>

                          <div class="row with-forms">                                
                                  <div class="col-md-6">
                                    <h5><b>Client :  *</b></h5>
                                    <input type="text" name="client" required  value="<?=$res->client?>"/>
                                  </div>
                                  <div class="col-md-6">
                                    <h5><b>Rented: *<small>(if owner name is company then N, else Y)</small></b></h5>
                                          <select name="rented" required>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                          </select>                          
                                  </div>
                           </div>

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Monthly EMI:  *</b></h5>
                                          <input type="text" name="monthly_emi" required  value="<?=$res->monthly_emi?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Place of Deployment: *</b></h5>
                                          <input type="text" name="place_of_deployment" required  value="<?=$res->place_of_deployment?>"/>
                                        </div>
                                  </div>                 
 
                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Rental Starting Date:  </b></h5>
                                          <input type="date" name="rental_st_dt"   value="<?=$res->rental_st_dt?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Rental Closing Date: </b></h5>
                                          <input type="date" name="rental_cl_dt"   value="<?=$res->rental_cl_dt?>"/>
                                        </div>                                     
                                  </div>  

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Monthly Rental Amount: <small>(as per agreement)</small>  *</b></h5>
                                          <input type="text" name="mon_amount"   value="<?=$res->mon_amount?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Operator Helper Expense: <small>(optional)</small></b></h5>
                                          <input type="text" name="expense"   value="<?=$res->expense?>"/>
                                        </div>
                                  </div>    

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Monthly Maintenance Cost:  </b></h5>
                                          <input type="text" name="maintenance"   value="<?=$res->maintenance?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Total Fuel Consumption: </b></h5>
                                          <input type="text" name="fuel_consum"   value="<?=$res->fuel_consum?>"/>
                                        </div>
                                  </div>  

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Starting Meter Reading: <small>(first working day of month)</small>  </b></h5>
                                          <input type="text" name="first_workingday"   value="<?=$res->first_workingday?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Closing Meter Reading: <small>(last working day of month)</small>  </b></h5>
                                          <input type="text" name="last_workingday"   value="<?=$res->last_workingday?>"/>
                                        </div>
                                  </div> 

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Total no.of Running Hours: <small>(closing - starting meter reading)</small>  </b></h5>
                                        </div>
                                        <div class="col-md-6">
                                          <input type="text" name="running_hrs"   value="<?=$res->running_hrs?>"/>
                                        </div> 
                                  </div>  
                                        

                                      <div class="clearfix"></div>

    <center>
    <br/>

    <button type="submit" class="button round" onclick="this.innerHTML+=' &nbsp; &nbsp; <i class=\'fa fa-spinner fa-spin\' style=\'color:yellow;\'></i>';"> SUBMIT <i class="fa fa-paper-plane"></i> </button>
    <br/><br/>
    </center>
    </form>

                        </div>
                    </div>

 
                      <!-- Row -->
                  
                    </div>
                    <!-- Section / End -->

          </div>
                  </div>


      </div>
          <!-- body content ends -->


  </div>
  <!-- dashboard Content / End -->

 </div>
 <!-- Dashboard / End -->
 </div>
 <!-- Wrapper / End -->

 <!-- Copyrights -->
 <div class="row">
   <div class="copyrights" style="text-align:right; border-top:1px solid #bcbcbc; padding-top:5px;"><small><?=$this->user_model->copyright?></small></div>
 </div>

 <!-- Scripts
 ================================================== -->
 <script type="text/javascript" src="<?=base_url()?>scripts/jquery-2.2.0.min.js"></script>
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

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="<?=base_url()?>scripts/dropzone.js"></script>
    <script src="<?php echo base_url();?>scripts/sweetalert.js"></script>
  <script src="<?php echo base_url();?>scripts/sweetalert.min.js"></script>


 </body>

 </html>
