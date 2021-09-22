<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Recitalhistory extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/recitalhistory_model', 'recitalhistory_model');
  }

  public function index()
  {

    $data['title'] = 'Little Mozarts';
    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recitalhistory/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function crescendo()
  {
    $data['title'] = 'Crescendo';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recitalhistory/crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function get_little_morarts_application_list()
  {
    $role = $this->session->userdata('admin_role_id');
    $user_id = $this->session->userdata('user_id');
    $token = $this->session->userdata('token');
    $audition_type = 3;
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');
    $greater = $this->input->post('greater');
    $less = $this->input->post('less');

    $totalRecords = $this->recitalhistory_model->get_application_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->recitalhistory_model->get_application_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->recitalhistory_model->get_application_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $token, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->recitalhistory_model->get_audition_info($audition_type, $value['audition_id']);
        $age = $value['age'];
        $level = '';
        // if(7 >= $age && $age >= 3){
        if($value['level'] == 1){
          // $level = 'J';
          $level = 'I';
        }
        // else if(8 <= $age && $age <= 13){
        else if($value['level'] == 2){
          // $level = 'I';
          $level = 'J';
        }
        // else if($age >= 14){
        else if($value['level'] == 3){
          $level ='A';
        }
        
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "student_age"=>$age,
          "level"=>$level,
          "teacher_name"=>$value['teacher'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "instrument"=>$value['instrument_name'],
          "composer"=>$value['composer'],
          "title"=>$value['title'],
          "student_time"=>$value['duration'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "payment_type"=>$value['payment_type'] == 1 ? 'Paypal' : 'Order Check',
          "payment_status"=>$value['payment_type'] == 1 ? $value['transaction_id'] : $value['payment_code'],
          "special_need"=>$value['request_reason'],
          "score"=>$value['score'],
          'place'=>$value['place'],
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
    $role = $this->session->userdata('admin_role_id');
    $user_id = $this->session->userdata('user_id');
    $token = $this->session->userdata('token');
    $audition_type = 4;
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');
    $greater = $this->input->post('greater');
    $less = $this->input->post('less');

    $totalRecords = $this->recitalhistory_model->get_application_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->recitalhistory_model->get_application_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->recitalhistory_model->get_application_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $token, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->recitalhistory_model->get_audition_info($audition_type, $value['audition_id']);
        $age = $value['age'];
        $level = '';
        // if(7 >= $age && $age >= 3){
        if($value['level'] == 1){
          // $level = 'J';
          $level = 'I';
        }
        // else if(8 <= $age && $age <= 13){
        else if($value['level'] == 2){
          // $level = 'I';
          $level = 'J';
        }
        // else if($age >= 14){
        else if($value['level'] == 3){
          $level ='A';
        }

        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "student_age"=>$age,
          "level"=>$level,
          "teacher_name"=>$value['teacher'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "instrument"=>$value['instrument_name'],
          "composer"=>$value['composer'],
          "title"=>$value['title'],
          "student_time"=>$value['duration'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "payment_type"=>$value['payment_type'] == 1 ? 'Paypal' : 'Order Check',
          "payment_status"=>$value['payment_type'] == 1 ? $value['transaction_id'] : $value['payment_code'],
          "special_need"=>$value['request_reason'],
          "score"=>$value['score'],
          'place'=>$value['place'],
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
}

?>