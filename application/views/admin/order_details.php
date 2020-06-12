<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs
 ================================================== -->
 <title><?=$this->user_model->sitename?> :   Order Details </title>
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
          <h2><b> <i class="fa fa-edit"></i> Order Details</b></h2>
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
                        <h3><i class="list-box-icon im im-icon-User"></i> Update Order Details</h3>
                      </div>

                      <!-- Row -->
                      <form method="post" action="<?=base_url()?>admin/edit_order_sub/<?=md5($res->id)?>" enctype="multipart/form-data">
                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><b> Place: * <small>Ex. Kaniha, Angul, Odisha</small></b></h5>
                              <input type="Text" name="place" required value="<?=$res->place?>" />
                        </div>
                      </div>

                          <div class="row with-forms">                                
                                  <div class="col-md-6">
                                    <h5><b>Primary Client:  *</b></h5>
                                    <input type="text" name="p_client" required  value="<?=$res->p_client?>"/>
                                  </div>
                                  <div class="col-md-6">
                                    <h5><b>Secondery Client: *</b></h5>
                                    <input type="text" name="s_client" required  value="<?=$res->s_client?>"/>
                                  </div>
                           </div>

                          <div class="row with-forms">                                
                                  <div class="col-md-6">
                                    <h5><b>Type of Work:  *</b></h5>
                                    <input type="text" name="work_type" required  value="<?=$res->work_type?>"/>
                                  </div>
                                  <div class="col-md-6">
                                    <h5><b>Tender Value: *</b></h5>
                                    <input type="text" name="tender_value" required  value="<?=$res->tender_value?>"/>
                                  </div>
                           </div>

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Order Received Date:  *</b></h5>
                                          <input type="date" name="order_received" required  value="<?=$res->order_received?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Order Number: *</b></h5>
                                          <input type="text" name="order_no" required  value="<?=$res->order_no?>"/>
                                        </div>
                                  </div>                 
 
                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Work Commencement Date:  </b></h5>
                                          <input type="date" name="work_commence"   value="<?=$res->work_commence?>"/>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>Project Handover Date: </b></h5>
                                          <input type="date" name="project_handover"   value="<?=$res->project_handover?>"/>
                                        </div>
                                  </div>  

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Work Ongoing:  *</b></h5>
                                          <select name="work_ongoing" required>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                          </select>
                                        </div>
                                        <div class="col-md-6">
                                          <h5><b>NTP Received Date: <small>(optional)</small></b></h5>
                                          <input type="date" name="ntp_received"   value="<?=$res->ntp_received?>"/>
                                        </div>
                                  </div>    

                                 <div class="row with-forms">                                      
                                        <div class="col-md-6">
                                          <h5><b>Change Order Copy: <small>(soft copy of order in pdf format)</small></b></h5>
                                        </div>
                                        <div class="col-md-6">
                                          <input type="file" name="order_copy" />
                                        </div>
                                  </div>  

                                      <div class="clearfix"></div>

    <center>
    <br/>

    <button type="submit" class="button round" onclick="this.innerHTML+=' &nbsp; &nbsp; <i class=\'fa fa-spinner fa-spin\' style=\'color:yellow;\'></i>';"> SAVE <i class="fa fa-paper-plane"></i> </button>
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
