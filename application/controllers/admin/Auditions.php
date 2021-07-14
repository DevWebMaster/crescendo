<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Auditions extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/auditions_model', 'auditions_model');
  }

  public function index()
  {

    $data['title'] = 'Little Morarts List';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/auditions/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function get_little_morarts_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->auditions_model->get_little_morarts_all_count();
    $totalRecordwithFilter = $this->auditions_model->get_little_morarts_all_count_with_filter($search_key, $start, $rowperpage);
    $little_morarts_list = $this->auditions_model->get_little_morarts_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($little_morarts_list as $value) {
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
  public function add_little_morarts()
  {
    $data['title'] = 'Add Little Morarts';
    $data['local_admins'] = $this->auditions_model->get_all_localadmins();

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/auditions/add_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function save_little_morarts()
  {
    $data = array(
      'local_admin'=>$this->input->post('localadmin_name'),
      'audition_name'=>$this->input->post('audition_name'),
      'audition_location'=>$this->input->post('audition_location'),
      'audition_date'=>$this->input->post('audition_date'),
      'fee_solo'=>$this->input->post('fee_solo'),
      'fee_duet'=>$this->input->post('fee_duet'),
      'fee_trio'=>$this->input->post('fee_trio'),
      'fee_quartet'=>$this->input->post('fee_quartet'),
      'fee_ensemble'=>$this->input->post('fee_ensemble'),
      'audition_deadline'=>$this->input->post('audition_deadline'),
      'late_fee'=>$this->input->post('late_fee'),
      'duration'=>$this->input->post('duration'),
      'remain_duration'=>$this->input->post('duration'),
      'is_active'=>$this->input->post('status'),
      'created_at'=>date('Y-m-d H:i:s'),
    );
    $result = $this->auditions_model->save_little_morarts($data);

    echo json_encode($result);
  }
  public function edit_little_morarts()
  {

  }
  public function update_little_morarts()
  {

  }
  public function crescendo_list()
  {
    $data['title'] = 'Crescendo List';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/auditions/crescendo_list');
    $this->load->view('admin/includes/_footer');
  }
  public function get_crescendo_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->auditions_model->get_crescendo_all_count();
    $totalRecordwithFilter = $this->auditions_model->get_crescendo_all_count_with_filter($search_key, $start, $rowperpage);
    $crescendo_list = $this->auditions_model->get_crescendo_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($crescendo_list as $value) {
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
  public function add_crescendo()
  {
    $data['title'] = 'Add Crescendo';
    $data['local_admins'] = $this->auditions_model->get_all_localadmins();

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/auditions/add_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function save_crescendo()
  {
    $data = array(
      'local_admin'=>$this->input->post('localadmin_name'),
      'audition_name'=>$this->input->post('audition_name'),
      'audition_location'=>$this->input->post('audition_location'),
      'audition_date'=>$this->input->post('audition_date'),
      'fee_solo'=>$this->input->post('fee_solo'),
      'fee_duet'=>$this->input->post('fee_duet'),
      'fee_trio'=>$this->input->post('fee_trio'),
      'fee_quartet'=>$this->input->post('fee_quartet'),
      'fee_ensemble'=>$this->input->post('fee_ensemble'),
      'audition_deadline'=>$this->input->post('audition_deadline'),
      'late_fee'=>$this->input->post('late_fee'),
      'duration'=>$this->input->post('duration'),
      'remain_duration'=>$this->input->post('duration'),
      'is_active'=>$this->input->post('status'),
      'created_at'=>date('Y-m-d H:i:s'),
    );
    $result = $this->auditions_model->save_crescendo($data);

    echo json_encode($result);
  }
  public function edit_crescendo()
  {

  }
  public function update_crescendo()
  {

  }
}

?>