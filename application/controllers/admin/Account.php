<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Account extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    // $this->load->model('admin/account_model', 'account_model');
  }

  public function index()
  {

  	$role = $this->session->userdata('admin_role_id');

  	if($role == 4){
  		$data['title'] = 'Teacher List';

	    $this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/account/teacher_list');
		$this->load->view('admin/includes/_footer');
  	}else{
  		$data['title'] = 'Student List';

	    $this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/account/student_list');
		$this->load->view('admin/includes/_footer');
  	}
  }

  

}
?>  