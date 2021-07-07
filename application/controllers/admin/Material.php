<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Material extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/material_model', 'material_model');
  }

  public function index()
  {

    $data['title'] = 'Material List';

    $this->load->view('admin/includes/_header', $data);

      $this->load->view('admin/material/material_list');

      $this->load->view('admin/includes/_footer');

  }

  public function get_material_list()
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

    $totalRecords = $this->material_model->get_material_all_count();
    $totalRecordwithFilter = $this->material_model->get_material_all_count_with_filter($filter_name, $filter_status, $start, $rowperpage);
    $material_list = $this->material_model->get_material_list($filter_name, $filter_status, $start, $rowperpage);
    //echo $this->db->last_query();

    $data = array();

    foreach ($material_list as $value) {
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
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_material/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_material()
  {
    $data['title'] = 'Add Material';

    $this->load->view('admin/includes/_header', $data);

    $this->load->view('admin/material/add_material');

    $this->load->view('admin/includes/_footer');
  }
  public function edit_material($id = 0)
  {

    $data['title'] = 'Edit Material';
    $data['material_info'] = $this->material_model->get_material_info($id);
    $data['edit_material_id'] = $id;

    $this->load->view('admin/includes/_header', $data);

      $this->load->view('admin/material/edit_material');

      $this->load->view('admin/includes/_footer');

  }
  public function save_material()
  {
    $material_name = $this->input->post('material_name');
    $status = $this->input->post('status');
    if($status == 'active'){
      $status = 1;
    }else{
      $status = 0;
    }
    // $target_dir = PREFIX_MODEL_PATH.MAIN_MENU_PATH;
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
      if($check !== false) {
        $res_str = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $res_str = "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //   $res_str = "Sorry, file already exists.";
    //   $uploadOk = 0;
    // }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $res_str = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if($uploadOk == 1) {
      if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        $res_str = "The file ". htmlspecialchars( basename( $_FILES["imageToUpload"]["name"])). " has been added.";
      } else {
        $res_str = "Sorry, there was an error adding your file.";
        $uploadOk = 0;
      }
    }

    if($uploadOk == 1){
      $result = $this->material_model->save_material($material_name, basename($_FILES["imageToUpload"]["name"]), $status);
    }

    $response = array('status' => $result, 'message' => $res_str);
    echo json_encode($response);
  }

  public function update_material()
  {
    $res_str = '';
    $material_name = $this->input->post('material_name');
    $flag_image = $this->input->post('flag_image');
    $status = $this->input->post('status');
    $id = $this->input->post('edit_material_id');
    if($status == 'active'){
      $status = 1;
    }else{
      $status = 0;
    }
        
    // $target_dir = PREFIX_MODEL_PATH.MAIN_MENU_PATH;
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES["edit_imageToUpload"]["name"]);

    $uploadOk = 1;
    if($flag_image == 1)
    {
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["edit_imageToUpload"]["tmp_name"]);
        if($check !== false) {
          $res_str = "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          $res_str = "File is not an image.";
          $uploadOk = 0;
        }
      }

      // Check if file already exists
      // if (file_exists($target_file)) {
      //   $res_str = "Sorry, file already exists.";
      //   $uploadOk = 0;
      // }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $res_str = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      if($uploadOk == 1) {
        if (move_uploaded_file($_FILES["edit_imageToUpload"]["tmp_name"], $target_file)) {
          $res_str = "The file ". htmlspecialchars( basename( $_FILES["edit_imageToUpload"]["name"])). " has been added.";
        } else {
          $res_str = "Sorry, there was an error adding your file.";
          $uploadOk = 0;
        }
      }

      if($uploadOk == 1){
        $data = array(
          'name' => $material_name,
          'image' => basename($_FILES["edit_imageToUpload"]["name"]),
          'status' => $status,
          'updated_at' => date('Y-m-d H:i:s')
        );
        $result = $this->material_model->update_material($id, $data);
      }
    }else{
      $data = array(
        'name' => $material_name,
        'status' => $status,
        'updated_at' => date('Y-m-d H:i:s')
      );
      $result = $this->material_model->update_material($id, $data);
      $res_str = "It is updated successfully.";
    }

    $response = array('status' => $result, 'message' => $res_str);
    echo json_encode($response);
  }

  public function delete_material()
  {
    $id = $this->input->post('id');
    $result = $this->material_model->delete_material($id);

    echo json_encode($result);
  }

}
?>  