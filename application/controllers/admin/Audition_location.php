<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Audition_location extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/audition_location_model', 'audition_location_model');
  }

  public function index()
  {

    $data['title'] = 'Audition Location';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/audition_location/audition_location');
    $this->load->view('admin/includes/_footer');

  }
  public function get_audition_location_list()
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

    $totalRecords = $this->audition_location_model->get_audition_location_all_count();
    $totalRecordwithFilter = $this->audition_location_model->get_audition_location_all_count_with_filter($search_key, $start, $rowperpage);
    $audition_location_list = $this->audition_location_model->get_audition_location_list($search_key, $start, $rowperpage);

    $data = array();
    $inx = 0;
    foreach ($audition_location_list as $value) {
        $inx++;
        $data[] = array( 
          "id"=>$inx,
          "location"=>$value['location'],
          "ticket_price"=>$value['ticket_price'],
          "discounted_price"=>$value['discounted_price'],
          "discounted_quantity"=>$value['discounted_quantity'],
          "action"=>'<a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" data-toggle="modal" data-target="#edit_location_modal"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a>'
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
  public function add_audition_location()
  {
    $data['title'] = 'Add New Location';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/audition_location/add_audition_location');
    $this->load->view('admin/includes/_footer');
  }
  public function save_location()
  {
    $data = array(
      "location"=>$this->input->post('location'),
      "ticket_price"=>$this->input->post('ticket_price'),
      "discounted_price"=>$this->input->post('discounted_price'),
      "discounted_quantity"=>$this->input->post('discounted_quantity'),
      "created_by"=>1,
      "created_at"=>date('Y-m-d H:i:s')
    );

    $result = $this->audition_location_model->save_audition_location($data);

    echo json_encode($result);
  }
  public function update_location()
  {
    $location_id = $this->input->post('m_location_id');
    $location = $this->input->post('m_location');

    $data = array(
      "location" => $this->input->post('m_location'),
      "ticket_price"=>$this->input->post('ticket_price'),
      "discounted_price"=>$this->input->post('discounted_price'),
      "discounted_quantity"=>$this->input->post('discounted_quantity'),
      "updated_at" => date('Y-m-d H:i:s'),
      "updated_by" => $this->session->userdata('user_id')
    );

    $result = $this->audition_location_model->update_location($data, $location_id);

    echo json_encode($result);
  }
  public function delete_audition_location()
  {
    $id = $this->input->post('id');
    $result = $this->audition_location_model->delete_audition_location($id);

    echo json_encode($result);
  }
  
}

?>