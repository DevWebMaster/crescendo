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

    $data['title'] = 'Little Morarts';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function get_audition_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->applications_model->get_audition_all_count();
    $totalRecordwithFilter = $this->applications_model->get_audition_all_count_with_filter($search_key, $start, $rowperpage);
    $audition_list = $this->applications_model->get_audition_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($audition_list as $value) {
        $audition_fee = '';
        if($value['fee_solo'] != ''){
          $audition_fee = 'Solo: '.$value['fee_solo'].',';
        }
        if($value['fee_duet'] != ''){
          $audition_fee .= 'Duet: '.$value['fee_duet'].',';
        }
        if($value['fee_trio'] != ''){
          $audition_fee = 'Trio: '.$value['fee_trio'].',';
        }
        if($value['fee_quartet'] != ''){
          $audition_fee = 'Quartet: '.$value['fee_quartet'].',';
        }
        if($value['fee_ensemble'] != ''){
          $audition_fee = 'Ensemble: '.$value['fee_ensemble'].',';
        }
        $data[] = array( 
          "id"=>$value['id'],
          "local_admin"=>$value['localadmin'],
          "audition_name"=>$value['audition_name'],
          "audition_location"=>$value['audition_location'],
          "audition_date"=>$value['audition_date'],
          "audition_fee"=>$audition_fee,
          'audition_deadline'=>$value['audition_deadline'],
          "late_fee"=>$value['late_fee'],
          "duration"=>$value['duration'],
          "is_active"=>$value['is_active'] ? 'Active' : 'Close',
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_audition/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function get_recital_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->applications_model->get_recital_all_count();
    $totalRecordwithFilter = $this->applications_model->get_recital_all_count_with_filter($search_key, $start, $rowperpage);
    $recital_list = $this->applications_model->get_recital_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($recital_list as $value) {
        $audition_fee = '';
        if($value['fee_solo'] != ''){
          $audition_fee = 'Solo: '.$value['fee_solo'].',';
        }
        if($value['fee_duet'] != ''){
          $audition_fee .= 'Duet: '.$value['fee_duet'].',';
        }
        if($value['fee_trio'] != ''){
          $audition_fee = 'Trio: '.$value['fee_trio'].',';
        }
        if($value['fee_quartet'] != ''){
          $audition_fee = 'Quartet: '.$value['fee_quartet'].',';
        }
        if($value['fee_ensemble'] != ''){
          $audition_fee = 'Ensemble: '.$value['fee_ensemble'].',';
        }
        $data[] = array( 
          "id"=>$value['id'],
          "local_admin"=>$value['localadmin'],
          "audition_name"=>$value['audition_name'],
          "audition_location"=>$value['audition_location'],
          "audition_date"=>$value['audition_date'],
          "audition_fee"=>$audition_fee,
          'audition_deadline'=>$value['audition_deadline'],
          "late_fee"=>$value['late_fee'],
          "duration"=>$value['duration'],
          "is_active"=>$value['is_active'] ? 'Active' : 'Close',
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_recital/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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