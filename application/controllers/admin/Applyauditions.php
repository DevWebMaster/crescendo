<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Applyauditions extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/applyauditions_model', 'applyauditions_model');
  }

  public function index()
  {

    $data['title'] = 'Little Morarts';

    $data['little_morarts'] = $this->applyauditions_model->get_little_morarts(0);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function apply_little_morarts($audition_id = 0)
  {
    $data['title'] = 'Apply Little Morarts';

    $data['little_morart'] = $this->applyauditions_model->get_little_morarts($audition_id);

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['students'] = $this->applyauditions_model->get_students($user_id, $role_id);

    $data['instruments'] = $this->applyauditions_model->get_instruments();

    $data['teachers'] = $this->applyauditions_model->get_teachers($user_id, $role_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/apply_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
}

?>