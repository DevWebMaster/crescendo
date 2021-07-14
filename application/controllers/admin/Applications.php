<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Applications extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/applications_model', 'applications_model');
  }

  public function index()
  {

    $data['title'] = 'Auditions';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/auditions');
    $this->load->view('admin/includes/_footer');

  }
}

?>