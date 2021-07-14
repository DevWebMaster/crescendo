<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Activeapplication extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/activeapplication_model', 'activeapplication_model');
  }

  public function index()
  {

    $data['title'] = 'Little Morarts';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function crescendo()
  {
    $data['title'] = 'Crescendo';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/crescendo');
    $this->load->view('admin/includes/_footer');
  }
}

?>