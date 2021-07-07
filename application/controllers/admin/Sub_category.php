<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Sub_category extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/sub_category_model', 'sub_category_model');
  }

  public function index()
  {

    $data['title'] = 'Sub Category List';

    $data['parent_category'] = $this->sub_category_model->get_parent_category();

    $this->load->view('admin/includes/_header', $data);

    $this->load->view('admin/sub_category/sub_category_list');

    $this->load->view('admin/includes/_footer');

  }

  public function get_sub_category_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $search_key = $_POST['search']['value'];
    $filter_name = $_POST['filter_name'];
    $filter_category = $_POST['filter_category'];

    $totalRecords = $this->sub_category_model->get_sub_category_all_count();
    $totalRecordwithFilter = $this->sub_category_model->get_sub_category_all_count_with_filter($filter_name, $filter_category, $start, $rowperpage);
    $sub_category_list = $this->sub_category_model->get_sub_category_list($filter_name, $filter_category, $start, $rowperpage);
    //echo $this->db->last_query();

    $data = array();

    foreach ($sub_category_list as $value) {
        $data[] = array( 
          "id"=>$value['id'],
          "name"=>$value['name'],
          "parent_category"=>$value['parent_category'],
          "image"=>'<img src="'.site_url().'uploads/'.$value['image'].'" width="50px;" height="50px;">',
          
          "created_date"=>$value['created_at'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_sub_category/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_sub_category()
  {
    $data['title'] = 'Add Sub Category';

    $data['parent_category'] = $this->sub_category_model->get_parent_category();

    $this->load->view('admin/includes/_header', $data);

    $this->load->view('admin/sub_category/add_sub_category');

    $this->load->view('admin/includes/_footer');
  }
  public function edit_sub_category($id = 0)
  {

    $data['title'] = 'Edit Sub Category';
    $data['parent_category'] = $this->sub_category_model->get_parent_category();
    $data['sub_category_info'] = $this->sub_category_model->get_sub_category_info($id);
    $data['edit_sub_category_id'] = $id;

    $this->load->view('admin/includes/_header', $data);

      $this->load->view('admin/sub_category/edit_sub_category');

      $this->load->view('admin/includes/_footer');

  }
  public function save_sub_category()
  {
    $sub_category_name = $this->input->post('sub_category_name');
    $parent_category = $this->input->post('parent_category');
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
      $result = $this->sub_category_model->save_sub_category($sub_category_name, basename($_FILES["imageToUpload"]["name"]), $parent_category);
    }

    $response = array('status' => $result, 'message' => $res_str);
    echo json_encode($response);
  }

  public function update_sub_category()
  {
    $res_str = '';
    $sub_category_name = $this->input->post('sub_category_name');
    $flag_image = $this->input->post('flag_image');
    $parent_category = $this->input->post('parent_category');
    $id = $this->input->post('edit_sub_category_id');
    
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
          'name' => $sub_category_name,
          'image' => basename($_FILES["edit_imageToUpload"]["name"]),
          'category_id' => $parent_category,
          'updated_at' => date('Y-m-d H:i:s')
        );
        $result = $this->sub_category_model->update_sub_category($id, $data);
      }
    }else{
      $data = array(
        'name' => $sub_category_name,
        'category_id' => $parent_category,
        'updated_at' => date('Y-m-d H:i:s')
      );
      $result = $this->sub_category_model->update_sub_category($id, $data);
      $res_str = "It is updated successfully.";
    }

    $response = array('status' => $result, 'message' => $res_str);
    echo json_encode($response);
  }

  public function delete_sub_category()
  {
    $id = $this->input->post('id');
    $result = $this->sub_category_model->delete_sub_category($id);

    echo json_encode($result);
  }

}
?>  