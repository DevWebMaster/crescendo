<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Recital_location extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/recital_location_model', 'recital_location_model');
  }

  public function index()
  {

    $data['title'] = 'Recital Venue';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital_location/recital_location');
    $this->load->view('admin/includes/_footer');

  }
  public function get_recital_location_list()
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

    $totalRecords = $this->recital_location_model->get_recital_location_all_count();
    $totalRecordwithFilter = $this->recital_location_model->get_recital_location_all_count_with_filter($search_key, $start, $rowperpage);
    $recital_location_list = $this->recital_location_model->get_recital_location_list($search_key, $start, $rowperpage);

    $data = array();
    $inx = 0;
    foreach ($recital_location_list as $value) {
        $inx++;
        $data[] = array( 
          "id"=>$inx,
          "location"=>$value['location'],
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
  public function add_recital_location()
  {
    $data['title'] = 'Add New Location';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/recital_location/add_recital_location');
    $this->load->view('admin/includes/_footer');
  }
  public function save_location()
  {
    $data = array(
      "location"=>$this->input->post('location'),
      "created_by"=>1,
      "created_at"=>date('Y-m-d H:i:s')
    );

    $result = $this->recital_location_model->save_recital_location($data);

    echo json_encode($result);
  }
  public function update_location()
  {
    $location_id = $this->input->post('m_location_id');
    $location = $this->input->post('m_location');

    $data = array(
      "location" => $this->input->post('m_location'),
      "updated_at" => date('Y-m-d H:i:s'),
      "updated_by" => $this->session->userdata('user_id')
    );

    $result = $this->recital_location_model->update_location($data, $location_id);

    echo json_encode($result);
  }
  public function delete_recital_location()
  {
    $id = $this->input->post('id');
    $result = $this->recital_location_model->delete_recital_location($id);

    echo json_encode($result);
  }
  
}

?>