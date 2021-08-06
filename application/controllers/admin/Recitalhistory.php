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
    $token = $this->session->userdata('token');
    $audition_type = 1;
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

    $totalRecords = $this->recitalhistory_model->get_application_all_count($audition_type);
    $totalRecordwithFilter = $this->recitalhistory_model->get_application_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type);
    $application_list = $this->recitalhistory_model->get_application_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $token);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->recitalhistory_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "title"=>$value['title'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
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
    $token = $this->session->userdata('token');
    $audition_type = 2;
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

    $totalRecords = $this->recitalhistory_model->get_application_all_count($audition_type);
    $totalRecordwithFilter = $this->recitalhistory_model->get_application_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type);
    $application_list = $this->recitalhistory_model->get_application_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $token);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->recitalhistory_model->get_audition_info($audition_type, $value['audition_id']);
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "title"=>$value['title'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "student_time"=>$value['duration'],
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