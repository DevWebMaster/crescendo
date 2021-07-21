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

    $data['title'] = 'Little Mozarts';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function get_apply_little_morarts_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');
    $audition_type = 1;

    $totalRecords = $this->applications_model->get_apply_little_morarts_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_little_morarts_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_little_morarts_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "title"=>$value['title'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_little_morarts/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_little_morarts($apply_id = 0)
  {
    $audition_type = 1;
    $data['title'] = 'Edit Little Mozarts';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_apply()
  {
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  public function get_recital_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');
    $audition_type = 3;

    $totalRecords = $this->applications_model->get_apply_recital_little_morarts_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_recital_little_morarts_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_recital_little_morarts_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "title"=>$value['title'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_recital_little_morarts/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_recital_little_morarts($apply_id = 0)
  {
    $audition_type = 3;
    $data['title'] = 'Edit Recital Little Mozarts';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_recital_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_recital_apply()
  {
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  ////////////////////////////////////////////////
  public function crescendo()
  {

    $data['title'] = 'Crescendo';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/crescendo');
    $this->load->view('admin/includes/_footer');

  }
  public function get_apply_crescendo_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');
    $audition_type = 2;

    $totalRecords = $this->applications_model->get_apply_crescendo_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_crescendo_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_crescendo_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "title"=>$value['title'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_crescendo/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_crescendo($apply_id = 0)
  {
    $audition_type = 2;
    $data['title'] = 'Edit Little Mozarts';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function update_crescendo_apply()
  {
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  public function get_recital_crescendo_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');
    $audition_type = 4;

    $totalRecords = $this->applications_model->get_apply_recital_crescendo_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_recital_crescendo_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_recital_crescendo_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "title"=>$value['title'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_recital_crescendo/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_recital_crescendo($apply_id = 0)
  {
    $audition_type = 4;
    $data['title'] = 'Edit Recital Crescendo';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_recital_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function update_recital_crescendo_apply()
  {
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  
}

?>