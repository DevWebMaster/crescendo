<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Recital extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/recital_model', 'recital_model');
  }

  public function index()
  {

    $data['title'] = 'Little Mozarts List';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital/little_morarts');
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

    $totalRecords = $this->recital_model->get_little_morarts_all_count();
    $totalRecordwithFilter = $this->recital_model->get_little_morarts_all_count_with_filter($search_key, $start, $rowperpage);
    $little_morarts_list = $this->recital_model->get_little_morarts_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($little_morarts_list as $value) {
        $audition_fee = '';
        if($value['fee_solo'] != ''){
          $audition_fee = 'Solo: USD'.$value['fee_solo'].',';
        }
        if($value['fee_duet'] != ''){
          $audition_fee .= ' Duet: USD'.$value['fee_duet'].',';
        }
        if($value['fee_trio'] != ''){
          $audition_fee .= ' Trio: USD'.$value['fee_trio'].',';
        }
        if($value['fee_quartet'] != ''){
          $audition_fee .= ' Quartet: USD'.$value['fee_quartet'].',';
        }
        if($value['fee_ensemble'] != ''){
          $audition_fee .= ' Ensemble: USD'.$value['fee_ensemble'].',';
        }
        $data[] = array( 
          "id"=>$value['id'],
          "local_admin"=>$value['localadmin'],
          "audition_name"=>$value['audition_name'],
          "audition_location"=>$value['auditionlocation'],
          "audition_date"=>$value['audition_date'],
          "audition_fee"=>$audition_fee,
          'audition_deadline'=>$value['audition_deadline'],
          "late_fee"=>$value['late_fee'],
          "duration"=>$value['duration'],
          "prize"=>$value['prize'],
          "ticket_price"=>$value['ticket_price'],
          "tickets_quantity"=>$value['tickets_quantity'],
          "remained_tickets"=>$value['remained_tickets'],
          "discounted_price"=>$value['discounted_price'],
          "discounted_quantity"=>$value['discounted_quantity'],
          "is_active"=>$value['is_active'] == 2 ? 'Open' : 'Close',
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
    $data['title'] = 'Add Recital Little Mozarts';
    $data['local_admins'] = $this->recital_model->get_all_localadmins();
    $data['audition_locations'] = $this->recital_model->get_audition_locations();

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital/add_little_morarts');
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
      'ticket_price'=>$this->input->post('ticket_price'),
      'tickets_quantity'=>$this->input->post('tickets_quantity'),
      'remained_tickets'=>$this->input->post('tickets_quantity'),
      'discounted_price'=>$this->input->post('discounted_price'),
      'discounted_quantity'=>$this->input->post('discounted_quantity'),
      'late_fee'=>$this->input->post('late_fee'),
      'duration'=>$this->input->post('duration'),
      'remain_duration'=>$this->input->post('duration'),
      'prize'=>$this->input->post('prize'),
      'is_active'=>$this->input->post('status'),
      'created_at'=>date('Y-m-d H:i:s'),
    );
    $result = $this->recital_model->save_little_morarts($data);

    echo json_encode($result);
  }
  public function edit_little_morarts($audition_id = 0)
  {
    $data['title'] = 'Edit Little Mozarts';
    $data['local_admins'] = $this->recital_model->get_all_localadmins();
    $data['audition_locations'] = $this->recital_model->get_audition_locations();
    $data['audition_id'] = $audition_id;
    $data['audition_info'] = $this->recital_model->get_little_morarts_info($audition_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital/edit_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_little_morarts()
  {
    $audition_id = $this->input->post('audition_id');
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
      'ticket_price'=>$this->input->post('ticket_price'),
      'tickets_quantity'=>$this->input->post('tickets_quantity'),
      // 'remained_tickets'=>$this->input->post('tickets_quantity'),
      'discounted_price'=>$this->input->post('discounted_price'),
      'discounted_quantity'=>$this->input->post('discounted_quantity'),
      'late_fee'=>$this->input->post('late_fee'),
      'duration'=>$this->input->post('duration'),
      'remain_duration'=>$this->input->post('duration'),
      'prize'=>$this->input->post('prize'),
      'is_active'=>$this->input->post('status'),
      'updated_at'=>date('Y-m-d H:i:s'),
    );
    $result = $this->recital_model->update_little_morarts($data, $audition_id);

    echo json_encode($result);
  }
  public function delete_little_morarts()
  {
    $recital_id = $this->input->post('id');
    $result = $this->recital_model->delete_little_morarts($recital_id);

    echo json_encode($result);
  }
  public function crescendo_list()
  {
    $data['title'] = 'Crescendo List';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital/crescendo_list');
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

    $totalRecords = $this->recital_model->get_crescendo_all_count();
    $totalRecordwithFilter = $this->recital_model->get_crescendo_all_count_with_filter($search_key, $start, $rowperpage);
    $crescendo_list = $this->recital_model->get_crescendo_list($search_key, $start, $rowperpage);

    $data = array();

    foreach ($crescendo_list as $value) {
        $audition_fee = '';
        if($value['fee_solo'] != ''){
          $audition_fee = 'Solo: USD'.$value['fee_solo'].',';
        }
        if($value['fee_duet'] != ''){
          $audition_fee .= ' Duet: USD'.$value['fee_duet'].',';
        }
        if($value['fee_trio'] != ''){
          $audition_fee .= ' Trio: USD'.$value['fee_trio'].',';
        }
        if($value['fee_quartet'] != ''){
          $audition_fee .= ' Quartet: USD'.$value['fee_quartet'].',';
        }
        if($value['fee_ensemble'] != ''){
          $audition_fee .= ' Ensemble: USD'.$value['fee_ensemble'].',';
        }
        $data[] = array( 
          "id"=>$value['id'],
          "local_admin"=>$value['localadmin'],
          "audition_name"=>$value['audition_name'],
          "audition_location"=>$value['auditionlocation'],
          "audition_date"=>$value['audition_date'],
          "audition_fee"=>$audition_fee,
          'audition_deadline'=>$value['audition_deadline'],
          "late_fee"=>$value['late_fee'],
          "duration"=>$value['duration'],
          "prize"=>$value['prize'],
          "ticket_price"=>$value['ticket_price'],
          "tickets_quantity"=>$value['tickets_quantity'],
          "remained_tickets"=>$value['remained_tickets'],
          "discounted_price"=>$value['discounted_price'],
          "discounted_quantity"=>$value['discounted_quantity'],
          "is_active"=>$value['is_active'] == 2 ? 'Open' : 'Close',
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
    $data['title'] = 'Add Recital Crescendo';
    $data['local_admins'] = $this->recital_model->get_all_localadmins();
    $data['audition_locations'] = $this->recital_model->get_audition_locations();

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital/add_crescendo');
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
      'ticket_price'=>$this->input->post('ticket_price'),
      'tickets_quantity'=>$this->input->post('tickets_quantity'),
      'remained_tickets'=>$this->input->post('tickets_quantity'),
      'discounted_price'=>$this->input->post('discounted_price'),
      'discounted_quantity'=>$this->input->post('discounted_quantity'),
      'late_fee'=>$this->input->post('late_fee'),
      'duration'=>$this->input->post('duration'),
      'remain_duration'=>$this->input->post('duration'),
      'prize'=>$this->input->post('prize'),
      'is_active'=>$this->input->post('status'),
      'created_at'=>date('Y-m-d H:i:s'),
    );
    $result = $this->recital_model->save_crescendo($data);

    echo json_encode($result);
  }
  public function edit_crescendo($audition_id = 0)
  {
    $data['title'] = 'Edit Crescendo';
    $data['local_admins'] = $this->recital_model->get_all_localadmins();
    $data['audition_locations'] = $this->recital_model->get_audition_locations();
    $data['audition_id'] = $audition_id;
    $data['audition_info'] = $this->recital_model->get_crescendo_info($audition_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital/edit_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function update_crescendo()
  {
    $audition_id = $this->input->post('audition_id');
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
      'ticket_price'=>$this->input->post('ticket_price'),
      'tickets_quantity'=>$this->input->post('tickets_quantity'),
      'discounted_price'=>$this->input->post('discounted_price'),
      'discounted_quantity'=>$this->input->post('discounted_quantity'),
      'late_fee'=>$this->input->post('late_fee'),
      'duration'=>$this->input->post('duration'),
      'remain_duration'=>$this->input->post('duration'),
      'prize'=>$this->input->post('prize'),
      'is_active'=>$this->input->post('status'),
      'updated_at'=>date('Y-m-d H:i:s'),
    );
    $result = $this->recital_model->update_crescendo($data, $audition_id);

    echo json_encode($result);
  }
  public function delete_crescendo()
  {
    $recital_id = $this->input->post('id');
    $result = $this->recital_model->delete_crescendo($recital_id);

    echo json_encode($result);
  }
}

?>