<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Product extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/product_model', 'product_model');
  }

  public function index()
  {

    $data['title'] = 'Product List';

    $data['parent_category'] = $this->product_model->get_parent_category();

    $this->load->view('admin/includes/_header', $data);

    $this->load->view('admin/product/product_list');

    $this->load->view('admin/includes/_footer');

  }
  public function get_sub_category_ids()
  {
    $category_id = $this->input->post('category_id');
    $sub_category_ids = $this->product_model->get_sub_category_ids($category_id);
    echo json_encode($sub_category_ids);
  }
  public function get_sub_sub_category_ids()
  {
    $category_id = $this->input->post('category_id');
    $sub_category_id = $this->input->post('sub_category_id');
    $sub_sub_category_ids = $this->product_model->get_sub_sub_category_ids($category_id, $sub_category_id);
    echo json_encode($sub_sub_category_ids);
  }

  public function get_product_list()
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
    $filter_sub_category = $_POST['filter_sub_category'];
    $filter_sub_sub_category = $_POST['filter_sub_sub_category'];

    $totalRecords = $this->product_model->get_product_all_count();
    $totalRecordwithFilter = $this->product_model->get_product_all_count_with_filter($filter_name, $filter_category, $filter_sub_category, $filter_sub_sub_category, $start, $rowperpage);
    $product_list = $this->product_model->get_product_list($filter_name, $filter_category, $filter_sub_category, $filter_sub_sub_category, $start, $rowperpage);
    //echo $this->db->last_query();

    $data = array();

    foreach ($product_list as $value) {
    	if($value['status'] == 1){
          $status = '<span class="label label-success px-2 py-1">Active</span>';
        }else{
          $status = '<span class="label label-warning px-2 py-1">Inactive</span>';
        }
        $data[] = array( 
          "id"=>$value['id'],
          "image"=>'<img src="'.site_url().'uploads/'.$value['image'].'" width="50px;" height="50px;">',
          "name"=>$value['name'],
          "sub_sub_category"=>$value['sub_sub_category'],
          "sub_category"=>$value['sub_category'],
          "category"=>$value['parent_category'],
          "status"=>$status,
          "created_date"=>$value['created_at'],
          "action"=>'<div style="display: inline-flex;"><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_product/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function add_product()
  {
    $benefits_arr =  ( isset($_POST) && is_array($this->input->post('benefits_ids')) ) ? $this->input->post('benefits_ids') : array();
    $data['benefits_ids'] = select_option_multiple('tbl_benefits','id', 'name', $benefits_arr,array('status'=>'1') );
    $sustainability_arr =  ( isset($_POST) && is_array($this->input->post('sustainability_ids')) ) ? $this->input->post('sustainability_ids') : array();
    $data['sustainability_ids'] = select_option_multiple('tbl_sustainability','id', 'name', $sustainability_arr,array('status'=>'1') );

    $data['title'] = 'Add Sub Sub Category';

    $data['parent_category'] = $this->product_model->get_parent_category();
    $data['material'] = $this->product_model->get_material();

    $data_header='';
    $script['js'] = array( base_url().'assets/plugins/select2/select2.full.min.js'  );
    $data_header = array( 'script'=>$script );

    $this->load->view('admin/includes/_header', $data_header);

    $this->load->view('admin/product/add_product', $data);

    $this->load->view('admin/includes/_footer');
  }
  public function edit_product($id = 0)
  {
    $benefits_arr =  ( isset($_POST) && is_array($this->input->post('benefits_ids')) ) ? $this->input->post('benefits_ids') : array();
    $data['benefits_ids'] = select_option_multiple('tbl_benefits','id', 'name', $benefits_arr,array('status'=>'1') );
    $sustainability_arr =  ( isset($_POST) && is_array($this->input->post('sustainability_ids')) ) ? $this->input->post('sustainability_ids') : array();
    $data['sustainability_ids'] = select_option_multiple('tbl_sustainability','id', 'name', $sustainability_arr,array('status'=>'1') );

    $data['title'] = 'Edit Sub Sub Category';
    $data['parent_category'] = $this->product_model->get_parent_category();
    $data['sustainability'] = $this->product_model->get_sustainability();
    $data['benefits'] = $this->product_model->get_benefits();
    $data['material'] = $this->product_model->get_material();
    $data['product_info'] = $this->product_model->get_product_info($id);
    $data['sub_category'] = $this->product_model->get_sub_category($data['product_info']['category_id']);
    $data['sub_sub_category'] = $this->product_model->get_sub_sub_category($data['product_info']['category_id'], $data['product_info']['sub_category_id']);
    $data['edit_product_id'] = $id;

    $data_header='';
    $script['js'] = array( base_url().'assets/plugins/select2/select2.full.min.js'  );
    $data_header = array( 'script'=>$script );

    $this->load->view('admin/includes/_header', $data_header);

      $this->load->view('admin/product/edit_product', $data);

      $this->load->view('admin/includes/_footer');

  }
  public function save_product()
  {

    $product_name = $this->input->post('product_name');
    $parent_category = $this->input->post('parent_category');
    $sub_category = $this->input->post('sub_category_ids');
    $sub_sub_category = $this->input->post('sub_sub_category_ids');
    $sustainability_arr = ( isset($_POST) && is_array($this->input->post('sustainability_ids')) ) ? $this->input->post('sustainability_ids') : array();
    $benefits_arr =  ( isset($_POST) && is_array($this->input->post('benefits_ids')) ) ? $this->input->post('benefits_ids') : array();
    $material = $this->input->post('material_ids');
    $description = $this->input->post('description');
    $product_idea_for = $this->input->post('product_idea_for');
    $status = $this->input->post('status');
    if($status == 'active'){
      $status = 1;
    }else{
      $status = 0;
    }
    $item_code = $this->input->post('item_code');
    $product_short_description = $this->input->post('product_short_description');
    $product_pieces = $this->input->post('product_pieces');
    $length = $this->input->post('length');
    $width = $this->input->post('width');
    $height = $this->input->post('height');
    $unit = $this->input->post('size_unit');
    $size_oz = $this->input->post('size_oz');
    $is_lid = $this->input->post('is_lid');
    if($is_lid == 'on'){
      $is_lid = 1;
    }else{
      $is_lid = 0;
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
      $result = $this->product_model->save_product($product_name, basename($_FILES["imageToUpload"]["name"]), $parent_category, $sub_category, $sub_sub_category, $sustainability_arr, $benefits_arr, $material, $description, $product_idea_for, $status, $item_code, $product_short_description, $product_pieces, $length, $width, $height, $unit, $size_oz, $is_lid);
    }

    $response = array('status' => $result, 'message' => $res_str);
    echo json_encode($response);
  }

  public function update_product()
  {
    $res_str = '';
    $product_name = $this->input->post('product_name');
    $flag_image = $this->input->post('flag_image');
    $parent_category = $this->input->post('parent_category');
    $sub_category = $this->input->post('sub_category_ids');
    $sub_sub_category = $this->input->post('sub_sub_category_ids');
    $sustainability_arr = ( isset($_POST) && is_array($this->input->post('sustainability_ids')) ) ? $this->input->post('sustainability_ids') : array();
    $benefits_arr =  ( isset($_POST) && is_array($this->input->post('benefits_ids')) ) ? $this->input->post('benefits_ids') : array();
    $material = $this->input->post('material');
    $description = $this->input->post('description');
    $product_idea_for = $this->input->post('product_idea_for');
    $status = $this->input->post('status');
    if($status == 'active'){
      $status = 1;
    }else{
      $status = 0;
    }
    $item_code = $this->input->post('item_code');
    $product_short_description = $this->input->post('product_short_description');
    $product_pieces = $this->input->post('product_pieces');
    $length = $this->input->post('length');
    $width = $this->input->post('width');
    $height = $this->input->post('height');
    $unit = $this->input->post('size_unit');
    $size_oz = $this->input->post('size_oz');
    $is_lid = $this->input->post('is_lid');
    if($is_lid == 'on'){
      $is_lid = 1;
    }else{
      $is_lid = 0;
    }
    $id = $this->input->post('edit_product_id');
    
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
          'name' => $product_name,
          'image' => basename($_FILES["edit_imageToUpload"]["name"]),
          'category_id' => $parent_category,
          'sub_category_id' => $sub_category,
          'sub_sub_category_id' => $sub_sub_category,
    		  'sustainability_ids' => json_encode($sustainability_arr),
    		  'benefits_ids' => json_encode($benefits_arr),
    		  'material_id' => $material,
    		  'description' => $description,
    		  'idea_for' => $product_idea_for,
    		  'item_code' => $item_code,
    		  'short_desc' => $product_short_description,
    		  'pieces' => $product_pieces,
    		  's_unit' => $unit,
          'size_oz' => $size_oz,
          'length' => $length,
          'width' => $width,
          'height' => $height,
          'is_lid' => $is_lid,
    		  'status' => $status, 
          'updated_at' => date('Y-m-d H:i:s')
        );
        $result = $this->product_model->update_product($id, $data);
      }
    }else{
      $data = array(
        'name' => $product_name,
        'category_id' => $parent_category,
        'sub_category_id' => $sub_category,
        'sub_sub_category_id' => $sub_sub_category,
    		'sustainability_ids' => json_encode($sustainability_arr),
    		'benefit_ids' => json_encode($benefits_arr),
    		'material_id' => $material,
    		'description' => $description,
    		'idea_for' => $product_idea_for,
    		'item_code' => $item_code,
    		'short_desc' => $product_short_description,
    		'pieces' => $product_pieces,
    		's_unit' => $unit,
        'size_oz' => $size_oz,
        'length' => $length,
        'width' => $width,
        'height' => $height,
        'is_lid' => $is_lid,
    		'status' => $status, 
        'updated_at' => date('Y-m-d H:i:s')
      );
      $result = $this->product_model->update_product($id, $data);
      $res_str = "It is updated successfully.";
    }

    $response = array('status' => $result, 'message' => $res_str);
    echo json_encode($response);
  }

  public function delete_product()
  {
    $id = $this->input->post('id');
    $result = $this->product_model->delete_product($id);

    echo json_encode($result);
  }

}
?>  