<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Account extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/account_model', 'account_model');
    $this->load->model('admin/auth_model', 'auth_model');
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

  public function get_student_list()
  {
    $role = $this->session->userdata('admin_role_id');
    $user_id = $this->session->userdata('user_id');
    $student = 4;

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->account_model->get_student_all_count($student, $user_id, $role);
    $totalRecordwithFilter = $this->account_model->get_student_all_count_with_filter($search_key, $start, $rowperpage, $student, $user_id, $role);
    $student_list = $this->account_model->get_student_list($search_key, $start, $rowperpage, $student, $user_id, $role);

    $data = array();

    foreach ($student_list as $value) {
        $data[] = array( 
          "id"=>$value['id'],
          "name"=>$value['username'],
          "email"=>$value['email'],
          "birthday"=>$value['birthday'],
          "country"=>$value['countryname'],
          'supervisor'=>$value['creator'],
          "teachername"=>$value['teachername'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_student/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_teacher_of_student()
  {
    $m_teacher_name = $this->input->post('m_teacher_name');
    $m_teacher_address = $this->input->post('m_teacher_address');
    $m_teacher_phone_num = $this->input->post('m_teacher_phone_num');
    $m_teacher_email = $this->input->post('m_teacher_email');
    $m_teacher_description = $this->input->post('m_teacher_description');

    $data = array(
      'username' => $m_teacher_name,
      'address' => $m_teacher_address,
      'mobile_no' => $m_teacher_phone_num,
      
    );

    $result = $this->account_model->add_teacher_of_student();
  }

  public function add_student()
  {
    $data['title'] = 'Add New Student';
    $data['countries'] = $this->auth_model->get_countries();
    $data['teachers'] = $this->account_model->get_teacher_list_of_student();

    $this->load->view('admin/includes/_header');
    $this->load->view('admin/account/add_student', $data);
    $this->load->view('admin/includes/_footer');
  }
  public function save_student()
  {

  }
  public function edit_student()
  {
    $data['title'] = 'Edit Student';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/edit_student');
    $this->load->view('admin/includes/_footer', $data);

  }
  public function update_student()
  {

  }
  public function teacher_list()
  {
    $data['title'] = 'Teacher List';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/teacher_list');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function get_teacher_list()
  {
    $role = $this->session->userdata('admin_role_id');
    $user_id = $this->session->userdata('user_id');
    $teacher = 3;

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->account_model->get_teacher_all_count($teacher, $user_id, $role);
    $totalRecordwithFilter = $this->account_model->get_teacher_all_count_with_filter($search_key, $start, $rowperpage, $teacher, $user_id, $role);
    $teacher_list = $this->account_model->get_teacher_list($search_key, $start, $rowperpage, $teacher, $user_id, $role);

    $data = array();

    foreach ($teacher_list as $value) {
        $data[] = array( 
          "id"=>$value['id'],
          "name"=>$value['username'],
          "email"=>$value['email'],
          "country"=>$value['countryname'],
          'supervisor'=>$value['creator'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_teacher/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_teacher()
  {
    $data['title'] = 'Add New Teacher';
    $data['countries'] = $this->auth_model->get_countries();
    $data['students'] = $this->account_model->get_student_list_of_teacher();

    $this->load->view('admin/includes/_header');
    $this->load->view('admin/account/add_teacher', $data);
    $this->load->view('admin/includes/_footer');
  }
  public function save_teacher()
  {

  }
  public function edit_teacher()
  {
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/edit_teacher');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function update_teacher()
  {

  }
  public function parent_list()
  {
    $data['title'] = 'Parent List';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/parent_list');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function get_parent_list()
  {
    $role = $this->session->userdata('admin_role_id');
    $user_id = $this->session->userdata('user_id');
    $parent = 5;

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->account_model->get_parent_all_count($parent, $user_id, $role);
    $totalRecordwithFilter = $this->account_model->get_parent_all_count_with_filter($search_key, $start, $rowperpage, $parent, $user_id, $role);
    $parent_list = $this->account_model->get_parent_list($search_key, $start, $rowperpage, $parent, $user_id, $role);

    $data = array();

    foreach ($parent_list as $value) {
        $data[] = array( 
          "id"=>$value['id'],
          "name"=>$value['username'],
          "email"=>$value['email'],
          "country"=>$value['countryname'],
          'supervisor'=>$value['creator'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_parent/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_parent()
  {
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/add_parent');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function save_parent()
  {

  }
  public function edit_parent()
  {
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/edit_parent');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function update_parent()
  {

  }
  public function local_admin()
  {
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/localadmin_list');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function get_localadmin_list()
  {

    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->account_model->get_localadmin_all_count();
    $totalRecordwithFilter = $this->account_model->get_localadmin_all_count_with_filter($search_key, $start, $rowperpage);
    $localadmin_list = $this->account_model->get_localadmin_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($localadmin_list as $value) {
        $data[] = array( 
          "id"=>$value['id'],
          "name"=>$value['name'],
          "email"=>$value['email'],
          "address"=>$value['address'],
          'mobile_no'=>$value['mobile_no'],
          "note"=>$value['note'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_localadmin/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_localadmin()
  {
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/account/add_localadmin');
    $this->load->view('admin/includes/_footer', $data);
  }
  public function save_localadmin()
  {
    $data = array(
      'name'=>$this->input->post('localadmin_name'),
      'email'=>$this->input->post('localadmin_email'),
      'address'=>$this->input->post('localadmin_address'),
      'mobile_no'=>$this->input->post('localadmin_phone_num'),
      'note'=>$this->input->post('localadmin_note'),
      'created_at'=>date('Y-m-d H:i:s')
    );

    $result = $this->account_model->save_localadmin($data);

    echo json_encode($result);
  }
  public function edit_localadmin()
  {

  }
  public function update_localadmin()
  {

  }

}
?>  