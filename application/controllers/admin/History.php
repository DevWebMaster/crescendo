<?php defined('BASEPATH') OR exit('No direct script access allowed');



class History extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/history_model', 'history_model');
  }

  public function index()
  {

    $data['title'] = 'Little Morarts';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/history/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function crescendo()
  {
    $data['title'] = 'Crescendo';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/history/crescendo');
    $this->load->view('admin/includes/_footer');
  }
}

?>