<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
    }

//=========================================

     public function index() {

       $this->load->view('admin/index');
    }

//======******************************=====
  
    public function dashboard() {
     $uid = $this->is_login();

    $data['tstaf'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `staff_details`;");
    $data['tmach'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `machinery`;");
    $data['torde'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `order_details`;");
    $data['tsite'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `site_details`;");

//    $data['tpend']=@$this->user_model->getValue('count(*)', 'tasks', 'status', 'Pending');

   $this->load->view('admin/dashboard', $data);
  }

//***********************************************

        public function machinery() {
         $id = $this->is_login();

         $response=$this->user_model->getData('machinery');
         $data['res']=$response;
         $this->load->view('admin/machinery', $data);
    }

    // ---------------------------------------------

        public function new_machinery() {
         $id = $this->is_login();

         $this->load->view('admin/new_machinery');
    }

    // ------------------------------------------

        public function new_machinery_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['machinery_name']=strip_tags(trim($this->input->post('machinery_name')));
         $data['type']=strip_tags(trim($this->input->post('type')));
         $data['owner']=strip_tags(ucwords(trim($this->input->post('owner'))));
         $data['client']=strip_tags(trim($this->input->post('client')));
         $data['monthly_emi']=strip_tags(trim($this->input->post('monthly_emi')));
         $data['place_of_deployment']=strip_tags(trim($this->input->post('place_of_deployment')));
         $data['rented']=strip_tags(trim($this->input->post('rented')));
         $data['rental_st_dt']=strip_tags(trim($this->input->post('rental_st_dt')));
         $data['rental_cl_dt']=strip_tags(trim($this->input->post('rental_cl_dt')));
         $data['mon_amount']=strip_tags(trim($this->input->post('mon_amount')));
         $data['expense']=strip_tags(trim($this->input->post('expense')));
         $data['maintenance']=strip_tags(trim($this->input->post('maintenance')));
         $data['first_workingday']=strip_tags(trim($this->input->post('first_workingday')));
         $data['last_workingday']=strip_tags(trim($this->input->post('last_workingday')));
         $data['running_hrs']=strip_tags(trim($this->input->post('running_hrs')));
         $data['fuel_consum']=strip_tags(trim($this->input->post('fuel_consum')));

           $this->user_model->insertRow('machinery', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New machinery Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/machinery','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/new_machinery','refresh');
        }
    }

// ----------------------------------------------

        public function machinery_details($id='') {
         $this->is_login();

         $data['res'] = $this->user_model->getDataByid('machinery', 'md5(id)', $id);

         $this->load->view('admin/machinery_details',$data);
    }

    // ------------------------------------------

        public function edit_machinery_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['machinery_name']=strip_tags(trim($this->input->post('machinery_name')));
         $data['type']=strip_tags(trim($this->input->post('type')));
         $data['owner']=strip_tags(ucwords(trim($this->input->post('owner'))));
         $data['client']=strip_tags(trim($this->input->post('client')));
         $data['monthly_emi']=strip_tags(trim($this->input->post('monthly_emi')));
         $data['place_of_deployment']=strip_tags(trim($this->input->post('place_of_deployment')));
         $data['rented']=strip_tags(trim($this->input->post('rented')));
         $data['rental_st_dt']=strip_tags(trim($this->input->post('rental_st_dt')));
         $data['rental_cl_dt']=strip_tags(trim($this->input->post('rental_cl_dt')));
         $data['mon_amount']=strip_tags(trim($this->input->post('mon_amount')));
         $data['expense']=strip_tags(trim($this->input->post('expense')));
         $data['maintenance']=strip_tags(trim($this->input->post('maintenance')));
         $data['first_workingday']=strip_tags(trim($this->input->post('first_workingday')));
         $data['last_workingday']=strip_tags(trim($this->input->post('last_workingday')));
         $data['running_hrs']=strip_tags(trim($this->input->post('running_hrs')));
         $data['fuel_consum']=strip_tags(trim($this->input->post('fuel_consum')));

           $this->user_model->updateRow('machinery', 'md5(id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> Machinery Details Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/machinery','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/machinery','refresh');
        }
    }

// ----------------------------------------------

        public function del_machinery($id='') {
         $this->is_login();

         $this->user_model->delete_id('machinery', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  machinery Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/machinery','refresh'); exit;
    }

//***********************************************

        public function orders() {
         $id = $this->is_login();

         $response=$this->user_model->getData('order_details');
         $data['res']=$response;
         $this->load->view('admin/orders', $data);
    }

    // ---------------------------------------------

        public function new_order() {
         $id = $this->is_login();

         $this->load->view('admin/new_order');
    }

    // ------------------------------------------

        public function new_order_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['order_no']=strip_tags(trim($this->input->post('order_no')));
         $data['order_received']=strip_tags(trim($this->input->post('order_received')));
         $data['place']=strip_tags(ucwords(trim($this->input->post('place'))));
         $data['p_client']=strip_tags(trim($this->input->post('p_client')));
         $data['s_client']=strip_tags(trim($this->input->post('s_client')));
         $data['work_type']=strip_tags(trim($this->input->post('work_type')));
         $data['tender_value']=strip_tags(trim($this->input->post('tender_value')));
         $data['ntp_received']=strip_tags(trim($this->input->post('ntp_received')));
         $data['work_commence']=strip_tags(trim($this->input->post('work_commence')));
         $data['project_handover']=strip_tags(trim($this->input->post('project_handover')));
         $data['work_ongoing']=strip_tags(trim($this->input->post('work_ongoing')));

         // --------- file upload
          foreach($_FILES as $name => $fileInfo)
                 if($_FILES[$name]['size']>0){
                $filename=$_FILES[$name]['name'];
              $exp=explode('.', $filename);
              $ext=strtolower(end($exp));
                      if( $ext === 'pdf' ){

                        $newname=  $exp[0].'_'.uniqid().".".$ext;
                        $tmpname=$_FILES[$name]['tmp_name'];

                         if(move_uploaded_file($tmpname,"uploads/".$newname)) {
                         $data['order_copy']=$newname;
                       }
                     }
                   }
            // ----------- file upload end
           $this->user_model->insertRow('order_details', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Order Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/orders','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/new_order','refresh');
        }
    }

// ----------------------------------------------

        public function order_details($id='') {
         $this->is_login();

         $data['res'] = $this->user_model->getDataByid('order_details', 'md5(id)', $id);

         $this->load->view('admin/order_details',$data);
    }

    // ------------------------------------------

        public function edit_order_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['order_no']=strip_tags(trim($this->input->post('order_no')));
         $data['order_received']=strip_tags(trim($this->input->post('order_received')));
         $data['place']=strip_tags(ucwords(trim($this->input->post('place'))));
         $data['p_client']=strip_tags(trim($this->input->post('p_client')));
         $data['s_client']=strip_tags(trim($this->input->post('s_client')));
         $data['work_type']=strip_tags(trim($this->input->post('work_type')));
         $data['tender_value']=strip_tags(trim($this->input->post('tender_value')));
         $data['ntp_received']=strip_tags(trim($this->input->post('ntp_received')));
         $data['work_commence']=strip_tags(trim($this->input->post('work_commence')));
         $data['project_handover']=strip_tags(trim($this->input->post('project_handover')));
         $data['work_ongoing']=strip_tags(trim($this->input->post('work_ongoing')));

         // --------- file upload
          foreach($_FILES as $name => $fileInfo)
                 if($_FILES[$name]['size']>0){
                $filename=$_FILES[$name]['name'];
              $exp=explode('.', $filename);
              $ext=strtolower(end($exp));
                      if( $ext === 'pdf' ){

                        $newname=  $exp[0].'_'.uniqid().".".$ext;
                        $tmpname=$_FILES[$name]['tmp_name'];

                         if(move_uploaded_file($tmpname,"uploads/".$newname)) {
                         $data['order_copy']=$newname;
                       }
                     }
                   }

           $this->user_model->updateRow('order_details', 'md5(id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> Order Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/orders','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/orders','refresh');
        }
    }

// ----------------------------------------------

        public function del_order($id='') {
         $this->is_login();

         $this->user_model->delete_id('order_details', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Order Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/orders','refresh'); exit;
    }

//***********************************************
        public function staff() {
         $id = $this->is_login();

         $response=$this->user_model->getData('staff_details');
         $data['res']=$response;
         $this->load->view('admin/staff', $data);
    }

    // ---------------------------------------------

        public function new_staff() {
         $id = $this->is_login();

         $this->load->view('admin/new_staff');
    }

    // ------------------------------------------

        public function new_staff_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['name']=strip_tags(strtoupper(trim($this->input->post('name'))));
         $data['designation']=strip_tags(trim($this->input->post('designation')));
         $data['qlfy']=strip_tags(trim($this->input->post('qlfy')));
         $data['experience']=strip_tags(trim($this->input->post('experience')));
         $data['posting_at']=strip_tags(ucwords(trim($this->input->post('posting_at'))));
         $data['last_posted_at']=strip_tags(ucwords(trim($this->input->post('last_posted_at'))));
         $data['sal_pa']=strip_tags(ucwords(trim($this->input->post('sal_pa'))));
         $data['doj']=strip_tags(ucwords(trim($this->input->post('doj'))));

           $this->user_model->insertRow('staff_details', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Staff Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/staff','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/new_staff','refresh');
        }
    }

// ----------------------------------------------

        public function edit_staff($id='') {
         $this->is_login();

         $data['res'] = $this->user_model->getDataByid('staff_details', 'md5(id)', $id);

         $this->load->view('admin/edit_staff',$data);
    }

    // ------------------------------------------

        public function edit_staff_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['name']=strip_tags(strtoupper(trim($this->input->post('name'))));
         $data['designation']=strip_tags(trim($this->input->post('designation')));
         $data['qlfy']=strip_tags(trim($this->input->post('qlfy')));
         $data['experience']=strip_tags(trim($this->input->post('experience')));
         $data['posting_at']=strip_tags(ucwords(trim($this->input->post('posting_at'))));
         $data['last_posted_at']=strip_tags(ucwords(trim($this->input->post('last_posted_at'))));
         $data['sal_pa']=strip_tags(ucwords(trim($this->input->post('sal_pa'))));
         $data['doj']=strip_tags(ucwords(trim($this->input->post('doj'))));

           $this->user_model->updateRow('staff_details', 'md5(id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Staff Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/staff','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/staff','refresh');
        }
    }

// ----------------------------------------------

        public function del_staff($id='') {
         $this->is_login();

         $this->user_model->delete_id('staff_details', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Staff Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/staff','refresh'); exit;
    }

//***********************************************

        public function sites() {
         $id = $this->is_login();

         $response=$this->user_model->getData('site_details');
         $data['res']=$response;
         $this->load->view('admin/sites', $data);
    }

    // ---------------------------------------------

        public function new_site() {
         $id = $this->is_login();

         $this->load->view('admin/new_site');
    }

    // ------------------------------------------

        public function new_site_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['place']=strip_tags(ucwords(trim($this->input->post('place'))));
         $data['work_description']=strip_tags(trim($this->input->post('work_description')));
         $data['quantity']=strip_tags(trim($this->input->post('quantity')));
         $data['unit']=strip_tags(trim($this->input->post('unit')));
         $data['site_date']=strip_tags(trim($this->input->post('site_date')));
         $data['others']=strip_tags(trim($this->input->post('others')));

           $this->user_model->insertRow('site_details', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Site Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/sites','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/new_site','refresh');
        }
    }

// ----------------------------------------------

        public function site_details($id='') {
         $this->is_login();

         $data['res'] = $this->user_model->getDataByid('site_details', 'md5(id)', $id);

         $this->load->view('admin/site_details',$data);
    }

    // ------------------------------------------

        public function edit_site_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['place']=strip_tags(ucwords(trim($this->input->post('place'))));
         $data['work_description']=strip_tags(trim($this->input->post('work_description')));
         $data['quantity']=strip_tags(trim($this->input->post('quantity')));
         $data['unit']=strip_tags(trim($this->input->post('unit')));
         $data['site_date']=strip_tags(trim($this->input->post('site_date')));
         $data['others']=strip_tags(trim($this->input->post('others')));

           $this->user_model->updateRow('site_details', 'md5(id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Site Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/sites','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/sites','refresh');
        }
    }

// ----------------------------------------------

        public function del_site($id='') {
         $this->is_login();

         $this->user_model->delete_id('site_details', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Site Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/sites','refresh'); exit;
    }

//***********************************************

        public function edit_profile() {
         $id = $this->is_login();

         $sql="SELECT * FROM `admin` WHERE a_id = '$id';";
         $response=$this->user_model->run_query($sql);
         foreach ($response->result() as $data['res']);

         $this->load->view('admin/edit_profile',$data);
    }

    // ---------------------------------------------

        public function edit_profile_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['full_name']=strip_tags(strtoupper(trim($this->input->post('full_name'))));
         $data['aunm']=strip_tags(trim($this->input->post('aunm')));
         $data['email']=strip_tags(trim($this->input->post('email')));
         $data['phno']=strip_tags(trim($this->input->post('phno')));
         $data['apwd']=strip_tags(ucwords(trim($this->input->post('apwd'))));


           $this->user_model->updateRow('admin', 'a_id', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> Your Profile Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect(base_url().'admin/dashboard','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect(base_url().'admin/edit_profile','refresh');
        }
    }


// ******************************************

public function login() {

    $this->session->unset_userdata('admin_data');
    $data='';
  $this->load->view('admin/',$data);
}

// ******************************************

   public function login_auth(){
       $return = $this->user_model->auth_admin();

       if(!empty($return)) {

             $this->session->set_userdata('admin_data',$return);
               $uid = $return->a_id;
               $dt = date('Y-m-d H:i:s');
               $qry="update admin set visits = (visits+1), last_login = '$dt' WHERE a_id = '$uid';";
               $this->user_model->run_query($qry);
               redirect(base_url().'admin/dashboard', 'refresh');
             } else {
           $this->session->set_flashdata("messagePr", '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Invalid Login Credentials..!</p><a class="close" href="#"></a></div>');

         redirect( base_url().'admin/', 'refresh' );
        }
   }

// *******************************************

     public function is_login(){
            if(!empty($this->session->admin_data->a_id)){

          $uid = $this->session->admin_data->a_id;
          return $uid;
              
            } else {
               redirect( base_url().'admin', 'refresh');
            }
  }

  // ===========================================================

    /**
     * This function is used to logout user
     */
   public function logout(){

       $this->session->unset_userdata('admin_data');
      redirect( base_url().'admin', 'refresh');
   }



//##################################################
//################ END class ###############################    

}

?>