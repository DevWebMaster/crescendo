<?php defined('BASEPATH') OR exit('No direct script access allowed');



class View_list extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/view_list_model', 'view_list_model');
  }

  public function index()
  {

    $data['title'] = 'Request List';

    $this->load->view('admin/includes/_header', $data);

      $this->load->view('admin/view_list/view_list');

      $this->load->view('admin/includes/_footer');

  }

  public function get_view_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $search_key = $_POST['search']['value'];
    $filter_name = $_POST['filter_name'];
    $filter_status = $_POST['filter_status'];

    $totalRecords = $this->view_list_model->get_view_all_count();
    $totalRecordwithFilter = $this->view_list_model->get_view_all_count_with_filter($filter_name, $filter_status, $start, $rowperpage);
    $point_list = $this->view_list_model->get_view_list($filter_name, $filter_status, $start, $rowperpage);
    //echo $this->db->last_query();

    $data = array();

    foreach ($point_list as $value) {
        if($value['status'] == 1){
          $status = '<span class="label label-success px-2 py-1">Active</span>';
        }else{
          $status = '<span class="label label-warning px-2 py-1">Inactive</span>';
        }
        $data[] = array( 
          "id"=>$value['id'],
          "name"=>$value['name'],
          "image"=>'<img src="'.site_url().'uploads/'.$value['image'].'" width="50px;" height="50px;">',
          "status"=>$status,
          "created_date"=>$value['created_at'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_view/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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