<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Activeapplication extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/activeapplication_model', 'activeapplication_model');
    $this->load->model('admin/applyauditions_model', 'applyauditions_model');
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
  public function get_little_morarts_application_list()
  {
    $audition_type = 1;
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->activeapplication_model->get_application_all_count($audition_type);
    $totalRecordwithFilter = $this->activeapplication_model->get_application_all_count_with_filter($search_key, $start, $rowperpage, $audition_type);
    $application_list = $this->activeapplication_model->get_application_list($search_key, $start, $rowperpage, $audition_type);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->activeapplication_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_little_morarts_application/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
       );
    }

    $result = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
    );

    echo json_encode($result);
  }
  public function get_crescendo_application_list()
  {
    $audition_type = 2;
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->activeapplication_model->get_application_all_count($audition_type);
    $totalRecordwithFilter = $this->activeapplication_model->get_application_all_count_with_filter($search_key, $start, $rowperpage, $audition_type);
    $application_list = $this->activeapplication_model->get_application_list($search_key, $start, $rowperpage, $audition_type);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->activeapplication_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_application/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
       );
    }

    $result = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
    );

    echo json_encode($result);
  }
  public function edit_little_morarts_application($audition_id)
  {
    $data['title'] = 'Edit Little Morarts';
    $audition_type = 1;

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['students'] = $this->applyauditions_model->get_students($user_id, $role_id);

    $data['instruments'] = $this->applyauditions_model->get_instruments();

    $data['teachers'] = $this->applyauditions_model->get_teachers($user_id, $role_id);

    $data['little_morarts'] = $this->activeapplication_model->get_application_info($audition_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/edit_apply_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_little_morarts_application()
  {

  }
}

?>