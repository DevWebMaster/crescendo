<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Applications extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/applications_model', 'applications_model');
    $this->load->library('excel');
  }

  public function index()
  {
    $data['title'] = 'Little Mozarts';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function get_apply_little_morarts_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

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
    $audition_type = 1;

    $totalRecords = $this->applications_model->get_apply_little_morarts_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_little_morarts_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_little_morarts_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $age = $value['age'];
        $level = '';
        if(7 >= $age && $age >= 3){
          $level = 'J';
        }
        else if(8 <= $age && $age <= 13){
          $level = 'I';
        }else if($age >= 14){
          $level ='A';
        }
        if($value['evaluation']){
          $splits = explode('_', $value['evaluation']);
          $eval_str = $splits[0];
          for($i = 1; $i < count($splits)-1; $i++){
            $eval_str .= '_'.$splits[$i];
          }
          $eval_str .= '.'.explode('.', $splits[count($splits)-1])[1];
        }else{
          $eval_str = '';
        }
        
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "student_age"=>$age,
          "level"=>$level,
          "teacher_name"=>$value['teacher'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "instrument"=>$value['instrument_name'],
          "composer"=>$value['composer'],
          "title"=>$value['title'],
          "student_time"=>$value['duration'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "payment_type"=>$value['payment_type'] == 1 ? 'Paypal' : 'Order Check',
          "payment_status"=>$value['payment_type'] == 1 ? $value['transaction_id'] : $value['payment_code'],
          "special_need"=>$value['request_reason'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "evaluation"=>'<a href="'.base_url().EVALUATION_PATH.$value['evaluation'].'" download>'.$eval_str.'</a>',
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_little_morarts/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_little_morarts($apply_id = 0)
  {
    $audition_type = 1;
    $data['title'] = 'Edit Little Mozarts';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_apply()
  {
    // $target_dir = '../public/uploads/little_mozarts/';
    $target_dir = EVALUATION_PATH;
    if (!is_dir($target_dir)) {
    @mkdir("$target_dir", 0755, true);
    }
    $file_name = explode('.' ,basename($_FILES["evaluation"]["name"]))[0];
    $ext = explode('.' ,basename($_FILES["evaluation"]["name"]))[1];
    if($file_name){
      $full_name = $file_name.'_'.date('Ymd').time().'.'.$ext;
      $target_file = realpath($target_dir) . '/' . $full_name;

      $uploadOk = 1;
      $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf"
      && $FileType != "txt" && $FileType != "jpg" && $FileType != "png") {
        $res_str = "Sorry, only Doc, Docx, PDF, & TXT files are allowed.";
        $uploadOk = 0;
      }
      if($uploadOk == 1) {
        if (move_uploaded_file($_FILES["evaluation"]["tmp_name"], $target_file)) {
          $res_str = "The file ". htmlspecialchars( basename( $_FILES["evaluation"]["name"])). " has been added.";
        } else {
          $res_str = "Sorry, there was an error adding your file.";
          $uploadOk = 0;
        }
      }
    }else {
      $full_name = '';
    }
    
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'evaluation' => $full_name,
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  public function delete_little_morarts()
  {
    $id = $this->input->post('id');
    $result = $this->applications_model->delete_little_morarts($id);

    echo json_encode($result);
  }
  public function get_recital_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

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
    $audition_type = 3;

    $totalRecords = $this->applications_model->get_apply_recital_little_morarts_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_recital_little_morarts_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_recital_little_morarts_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $age = $value['age'];
        $level = '';
        if(7 >= $age && $age >= 3){
          $level = 'J';
        }
        else if(8 <= $age && $age <= 13){
          $level = 'I';
        }else if($age >= 14){
          $level ='A';
        }
        if($value['evaluation']){
          $splits = explode('_', $value['evaluation']);
          $eval_str = $splits[0];
          for($i = 1; $i < count($splits)-1; $i++){
            $eval_str .= '_'.$splits[$i];
          }
          $eval_str .= '.'.explode('.', $splits[count($splits)-1])[1];
        }else{
          $eval_str = '';
        }
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "student_age"=>$age,
          "level"=>$level,
          "teacher_name"=>$value['teacher'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "instrument"=>$value['instrument_name'],
          "composer"=>$value['composer'],
          "title"=>$value['title'],
          "student_time"=>$value['duration'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "payment_type"=>$value['payment_type'] == 1 ? 'Paypal' : 'Order Check',
          "payment_status"=>$value['payment_type'] == 1 ? $value['transaction_id'] : $value['payment_code'],
          "special_need"=>$value['request_reason'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "evaluation"=>'<a href="'.base_url().EVALUATION_PATH.$value['evaluation'].'" download>'.$eval_str.'</a>',
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_recital_little_morarts/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_recital_little_morarts($apply_id = 0)
  {
    $audition_type = 3;
    $data['title'] = 'Edit Recital Little Mozarts';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_recital_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_recital_apply()
  {
    // $target_dir = '../public/uploads/little_mozarts/';
    $target_dir = EVALUATION_PATH;
    if (!is_dir($target_dir)) {
    @mkdir("$target_dir", 0755, true);
    }
    $file_name = explode('.' ,basename($_FILES["evaluation"]["name"]))[0];
    if($file_name){
      $ext = explode('.' ,basename($_FILES["evaluation"]["name"]))[1];
      $full_name = $file_name.'_'.date('Ymd').time().'.'.$ext;
      $target_file = realpath($target_dir) . '/' . $full_name;

      $uploadOk = 1;
      $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf"
      && $FileType != "txt" && $FileType != "jpg" && $FileType != "png") {
        $res_str = "Sorry, only Doc, Docx, PDF, & TXT files are allowed.";
        $uploadOk = 0;
      }

      if($uploadOk == 1) {
        if (move_uploaded_file($_FILES["evaluation"]["tmp_name"], $target_file)) {
          $res_str = "The file ". htmlspecialchars( basename( $_FILES["evaluation"]["name"])). " has been added.";
        } else {
          $res_str = "Sorry, there was an error adding your file.";
          $uploadOk = 0;
        }
      }
    }else{
      $full_name = '';
    }
    
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'evaluation' => $full_name,
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  public function delete_recital_little_morarts()
  {
    $id = $this->input->post('id');
    $result = $this->applications_model->delete_recital_little_morarts($id);

    echo json_encode($result);
  }
  ////////////////////////////////////////////////
  public function crescendo()
  {

    $data['title'] = 'Crescendo';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/crescendo');
    $this->load->view('admin/includes/_footer');

  }
  public function get_apply_crescendo_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

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
    $audition_type = 2;

    $totalRecords = $this->applications_model->get_apply_crescendo_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_crescendo_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_crescendo_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $age = $value['age'];
        $level = '';
        if(7 >= $age && $age >= 3){
          $level = 'J';
        }
        else if(8 <= $age && $age <= 13){
          $level = 'I';
        }else if($age >= 14){
          $level ='A';
        }
        if($value['evaluation']){
          $splits = explode('_', $value['evaluation']);
          $eval_str = $splits[0];
          for($i = 1; $i < count($splits)-1; $i++){
            $eval_str .= '_'.$splits[$i];
          }
          $eval_str .= '.'.explode('.', $splits[count($splits)-1])[1];
        }else{
          $eval_str = '';
        }
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "student_age"=>$age,
          "level"=>$level,
          "teacher_name"=>$value['teacher'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "instrument"=>$value['instrument_name'],
          "composer"=>$value['composer'],
          "title"=>$value['title'],
          "student_time"=>$value['duration'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "payment_type"=>$value['payment_type'] == 1 ? 'Paypal' : 'Order Check',
          "payment_status"=>$value['payment_type'] == 1 ? $value['transaction_id'] : $value['payment_code'],
          "special_need"=>$value['request_reason'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "evaluation"=>'<a href="'.base_url().EVALUATION_PATH.$value['evaluation'].'" download>'.$eval_str.'</a>',
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_crescendo/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_crescendo($apply_id = 0)
  {
    $audition_type = 2;
    $data['title'] = 'Edit Little Mozarts';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function update_crescendo_apply()
  {
    // $target_dir = '../public/uploads/little_mozarts/';
    $target_dir = EVALUATION_PATH;
    if (!is_dir($target_dir)) {
    @mkdir("$target_dir", 0755, true);
    }
    $file_name = explode('.' ,basename($_FILES["evaluation"]["name"]))[0];
    $ext = explode('.' ,basename($_FILES["evaluation"]["name"]))[1];
    $full_name = $file_name.'_'.date('Ymd').time().'.'.$ext;
    $target_file = realpath($target_dir) . '/' . $full_name;

    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf"
    && $FileType != "txt" && $FileType != "jpg" && $FileType != "png") {
      $res_str = "Sorry, only Doc, Docx, PDF, & TXT files are allowed.";
      $uploadOk = 0;
    }

    if($uploadOk == 1) {
      if (move_uploaded_file($_FILES["evaluation"]["tmp_name"], $target_file)) {
        $res_str = "The file ". htmlspecialchars( basename( $_FILES["evaluation"]["name"])). " has been added.";
      } else {
        $res_str = "Sorry, there was an error adding your file.";
        $uploadOk = 0;
      }
    }
    $file_name = explode('.' ,basename($_FILES["evaluation"]["name"]))[0];
    $ext = explode('.' ,basename($_FILES["evaluation"]["name"]))[1];
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'evaluation' => $full_name,
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  public function delete_crescendo()
  {
    $id = $this->input->post('id');
    $result = $this->applications_model->delete_crescendo($id);

    echo json_encode($result);
  }
  public function get_recital_crescendo_list()
  {
    $role = $this->session->userdata('role_id');
    $user_id = $this->session->userdata('user_id');

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
    $audition_type = 4;

    $totalRecords = $this->applications_model->get_apply_recital_crescendo_all_count($audition_type, $role, $user_id);
    $totalRecordwithFilter = $this->applications_model->get_apply_recital_crescendo_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);
    $application_list = $this->applications_model->get_apply_recital_crescendo_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->applications_model->get_audition_info($audition_type, $value['audition_id']);
        $age = $value['age'];
        $level = '';
        if(7 >= $age && $age >= 3){
          $level = 'J';
        }
        else if(8 <= $age && $age <= 13){
          $level = 'I';
        }else if($age >= 14){
          $level ='A';
        }
        if($value['evaluation']){
          $splits = explode('_', $value['evaluation']);
          $eval_str = $splits[0];
          for($i = 1; $i < count($splits)-1; $i++){
            $eval_str .= '_'.$splits[$i];
          }
          $eval_str .= '.'.explode('.', $splits[count($splits)-1])[1];
        }else{
          $eval_str = '';
        }
        $data[] = array( 
          "id"=>$inx,
          "student_name"=>$value['student_name'],
          "student_age"=>$age,
          "level"=>$level,
          "teacher_name"=>$value['teacher'],
          "composition"=>$audition_info['audition_name'].' '.$audition_info['audition_location'],
          "instrument"=>$value['instrument_name'],
          "composer"=>$value['composer'],
          "title"=>$value['title'],
          "student_time"=>$value['duration'],
          "is_paid"=>$value['is_paid'] ? 'Paid' : 'Unpaid',
          "payment_type"=>$value['payment_type'] == 1 ? 'Paypal' : 'Order Check',
          "payment_status"=>$value['payment_type'] == 1 ? $value['transaction_id'] : $value['payment_code'],
          "special_need"=>$value['request_reason'],
          "score"=>$value['score'],
          'place'=>$value['place'],
          "evaluation"=>'<a href="'.base_url().EVALUATION_PATH.$value['evaluation'].'" download>'.$eval_str.'</a>',
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_recital_crescendo/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_recital_crescendo($apply_id = 0)
  {
    $audition_type = 4;
    $data['title'] = 'Edit Recital Crescendo';
    $data['apply_id'] = $apply_id;
    $data['apply_info'] = $this->applications_model->get_detail_info($apply_id, $audition_type);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applications/edit_recital_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function update_recital_crescendo_apply()
  {
    // $target_dir = '../public/uploads/little_mozarts/';
    $target_dir = EVALUATION_PATH;
    if (!is_dir($target_dir)) {
    @mkdir("$target_dir", 0755, true);
    }
    $file_name = explode('.' ,basename($_FILES["evaluation"]["name"]))[0];
    $ext = explode('.' ,basename($_FILES["evaluation"]["name"]))[1];
    $full_name = $file_name.'_'.date('Ymd').time().'.'.$ext;
    $target_file = realpath($target_dir) . '/' . $full_name;

    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf"
    && $FileType != "txt" && $FileType != "jpg" && $FileType != "png") {
      $res_str = "Sorry, only Doc, Docx, PDF, & TXT files are allowed.";
      $uploadOk = 0;
    }

    if($uploadOk == 1) {
      if (move_uploaded_file($_FILES["evaluation"]["tmp_name"], $target_file)) {
        $res_str = "The file ". htmlspecialchars( basename( $_FILES["evaluation"]["name"])). " has been added.";
      } else {
        $res_str = "Sorry, there was an error adding your file.";
        $uploadOk = 0;
      }
    }
    $file_name = explode('.' ,basename($_FILES["evaluation"]["name"]))[0];
    $ext = explode('.' ,basename($_FILES["evaluation"]["name"]))[1];
    $apply_id = $this->input->post('apply_id');
    $data = array(
      'score' => $this->input->post('score'),
      'place' => $this->input->post('place'),
      'evaluation' => $full_name,
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('user_id')
    );

    $result = $this->applications_model->update_apply($data, $apply_id);
    echo json_encode($result);
  }
  public function delete_recital_crescendo()
  {
    $id = $this->input->post('id');
    $result = $this->applications_model->delete_recital_crescendo($id);

    echo json_encode($result);
  }
  
  public function export_to_excel_little_morarts()
  {
    $type = 1;
    
    $file_name = 'little_mozarts_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="'.$file_name.'";');
    header("Content-Type: application/csv;");
    $file = fopen('php://output', 'w');
    $application_data = $this->applications_model->fetch_data($type);
    $header = array('No', 'Audition', 'Student Name', 'Student Email', 'Country', 'Student Address', 'Student Mobile', 'Birthday', 'Studying Year', 'Level', 'Instrument', 'Performance Type', 'Performance Price', 'Co_performers', 'Co_instrument', 'Composer', 'Title', 'Duration', 'Teacher', 'Teacher Email', 'Teacher Country', 'Teacher Address', 'Teacher Mobile', 'Payment Type', 'Payment Status', 'Late fee', 'Special Request', 'Request Time', 'Request Reason', 'Score', 'Place', 'Video link', 'Total Price'); 
    fputcsv($file, $header);
    $inx = 0;
    foreach ($application_data as $value)
    {
      $inx++;
      if($value['instrument'] == '31'){
        $instrument = $value['other_instrument'];
      }else{
        $instrument = $value['instrumentname'];
      }
      if($value['level'] == 1){
        $level = 'Intermediate';
      }else if($value['level'] == 2){
        $level = 'Junior';
      }else {
        $level = 'Advance';
      }
      if($value['co_performers']){
        if($value['co_instrument'] == 31){
          $co_instrument = $value['co_other_instrument'];
        }else{
          $co_instrument = $value['co_instrumentname'];
        }
      }else{
        $co_instrument = '';
      }
      if($value['payment_type'] == 1){
        $payment_type = 'Paypal';
      }else if($value['payment_type'] == 2){
        $payment_type = 'Order Check';
      }
      $confirm_payment = $value['confirm_payment'] == 1 ? 'Paid' : 'Unpaid';
      $special_request = $value['special_request'] == 1 ? 'Yes' : 'No';
      $performance_type = 'Solo';
      if($value['performance_type'] == 2){
        $performance_type = 'Duo';
      }else if($value['performance_type'] == 3){
        $performance_type = 'Trio';
      }else if($value['performance_type'] == 4){
        $performance_type = 'Quartet';
      }else if($value['performance_type'] == 5){
        $performance_type = 'Ensemble';
      }

      $body = array($inx, $value['audition_name'], $value['student_name'], $value['student_email'], $value['countryname'], $value['address'], $value['mobile_no'], $value['birthday'], $value['studying_year'], $level, $instrument, $performance_type, $value['performance_price'], $value['co_performers'], $co_instrument, $value['composer'], $value['title'], $value['duration'], $value['teacher'], $value['teacher_email'], $value['teacher_country'], $value['teacher_address'], $value['teacher_mobile'], $payment_type, $confirm_payment, $value['late_fee'], $special_request, $value['request_time'], $value['request_reason'], $value['score'], $value['place'], $value['video_link'], $value['total_price']);
      fputcsv($file, $body);
    }
    fclose($file); 
    exit; 
  }

  public function export_to_excel_recital_little_morarts()
  {
    $type = 3;
    
    $file_name = 'recital_little_mozarts_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="'.$file_name.'";');
    header("Content-Type: application/csv;");
    $file = fopen('php://output', 'w');
    $application_data = $this->applications_model->fetch_data($type);
    $header = array('No', 'Recital', 'Student Name', 'Student Email', 'Country', 'Student Address', 'Student Mobile', 'Birthday', 'Studying Year', 'Level', 'Instrument', 'Performance Type', 'Performance Price', 'Co_performers', 'Co_instrument', 'Composer', 'Title', 'Duration', 'Teacher', 'Teacher Email', 'Teacher Country', 'Teacher Address', 'Teacher Mobile', 'Payment Type', 'Payment Status', 'Late fee', 'Special Request', 'Request Time', 'Request Reason', 'Score', 'Place', 'Video link', 'Total Price'); 
    fputcsv($file, $header);
    $inx = 0;
    foreach ($application_data as $value)
    {
      $inx++;
      if($value['instrument'] == '31'){
        $instrument = $value['other_instrument'];
      }else{
        $instrument = $value['instrumentname'];
      }
      if($value['level'] == 1){
        $level = 'Intermediate';
      }else if($value['level'] == 2){
        $level = 'Junior';
      }else {
        $level = 'Advance';
      }
      if($value['co_performers']){
        if($value['co_instrument'] == 31){
          $co_instrument = $value['co_other_instrument'];
        }else{
          $co_instrument = $value['co_instrumentname'];
        }
      }else{
        $co_instrument = '';
      }
      if($value['payment_type'] == 1){
        $payment_type = 'Paypal';
      }else if($value['payment_type'] == 2){
        $payment_type = 'Order Check';
      }
      $confirm_payment = $value['confirm_payment'] == 1 ? 'Paid' : 'Unpaid';
      $special_request = $value['special_request'] == 1 ? 'Yes' : 'No';
      $performance_type = 'Solo';
      if($value['performance_type'] == 2){
        $performance_type = 'Duo';
      }else if($value['performance_type'] == 3){
        $performance_type = 'Trio';
      }else if($value['performance_type'] == 4){
        $performance_type = 'Quartet';
      }else if($value['performance_type'] == 5){
        $performance_type = 'Ensemble';
      }

      $body = array($inx, $value['audition_name'], $value['student_name'], $value['student_email'], $value['countryname'], $value['address'], $value['mobile_no'], $value['birthday'], $value['studying_year'], $level, $instrument, $performance_type, $value['performance_price'], $value['co_performers'], $co_instrument, $value['composer'], $value['title'], $value['duration'], $value['teacher'], $value['teacher_email'], $value['teacher_country'], $value['teacher_address'], $value['teacher_mobile'], $payment_type, $confirm_payment, $value['late_fee'], $special_request, $value['request_time'], $value['request_reason'], $value['score'], $value['place'], $value['video_link'], $value['total_price']);
      fputcsv($file, $body);
    }
    fclose($file); 
    exit; 
  }

  public function export_to_excel_crescendo()
  {
    $type = 2;
    
    $file_name = 'crescendo_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="'.$file_name.'";');
    header("Content-Type: application/csv;");
    $file = fopen('php://output', 'w');
    $application_data = $this->applications_model->fetch_data($type);
    $header = array('No', 'Audition', 'Student Name', 'Student Email', 'Country', 'Student Address', 'Student Mobile', 'Birthday', 'Studying Year', 'Level', 'Instrument', 'Performance Type', 'Performance Price', 'Co_performers', 'Co_instrument', 'Composer', 'Title', 'Duration', 'Teacher', 'Teacher Email', 'Teacher Country', 'Teacher Address', 'Teacher Mobile', 'Payment Type', 'Payment Status', 'Late fee', 'Special Request', 'Request Time', 'Request Reason', 'Score', 'Place', 'Video link', 'Total Price'); 
    fputcsv($file, $header);
    $inx = 0;
    foreach ($application_data as $value)
    {
      $inx++;
      if($value['instrument'] == '31'){
        $instrument = $value['other_instrument'];
      }else{
        $instrument = $value['instrumentname'];
      }
      if($value['level'] == 1){
        $level = 'Intermediate';
      }else if($value['level'] == 2){
        $level = 'Junior';
      }else {
        $level = 'Advance';
      }
      if($value['co_performers']){
        if($value['co_instrument'] == 31){
          $co_instrument = $value['co_other_instrument'];
        }else{
          $co_instrument = $value['co_instrumentname'];
        }
      }else{
        $co_instrument = '';
      }
      if($value['payment_type'] == 1){
        $payment_type = 'Paypal';
      }else if($value['payment_type'] == 2){
        $payment_type = 'Order Check';
      }
      $confirm_payment = $value['confirm_payment'] == 1 ? 'Paid' : 'Unpaid';
      $special_request = $value['special_request'] == 1 ? 'Yes' : 'No';
      $performance_type = 'Solo';
      if($value['performance_type'] == 2){
        $performance_type = 'Duo';
      }else if($value['performance_type'] == 3){
        $performance_type = 'Trio';
      }else if($value['performance_type'] == 4){
        $performance_type = 'Quartet';
      }else if($value['performance_type'] == 5){
        $performance_type = 'Ensemble';
      }

      $body = array($inx, $value['audition_name'], $value['student_name'], $value['student_email'], $value['countryname'], $value['address'], $value['mobile_no'], $value['birthday'], $value['studying_year'], $level, $instrument, $performance_type, $value['performance_price'], $value['co_performers'], $co_instrument, $value['composer'], $value['title'], $value['duration'], $value['teacher'], $value['teacher_email'], $value['teacher_country'], $value['teacher_address'], $value['teacher_mobile'], $payment_type, $confirm_payment, $value['late_fee'], $special_request, $value['request_time'], $value['request_reason'], $value['score'], $value['place'], $value['video_link'], $value['total_price']);
      fputcsv($file, $body);
    }
    fclose($file); 
    exit; 
  }

  public function export_to_excel_recital_crescendo()
  {
    $type = 4;
    
    $file_name = 'recital_crescendo_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="'.$file_name.'";');
    header("Content-Type: application/csv;");
    $file = fopen('php://output', 'w');
    $application_data = $this->applications_model->fetch_data($type);
    $header = array('No', 'Recital', 'Student Name', 'Student Email', 'Country', 'Student Address', 'Student Mobile', 'Birthday', 'Studying Year', 'Level', 'Instrument', 'Performance Type', 'Performance Price', 'Co_performers', 'Co_instrument', 'Composer', 'Title', 'Duration', 'Teacher', 'Teacher Email', 'Teacher Country', 'Teacher Address', 'Teacher Mobile', 'Payment Type', 'Payment Status', 'Late fee', 'Special Request', 'Request Time', 'Request Reason', 'Score', 'Place', 'Video link', 'Total Price'); 
    fputcsv($file, $header);
    $inx = 0;
    foreach ($application_data as $value)
    {
      $inx++;
      if($value['instrument'] == '31'){
        $instrument = $value['other_instrument'];
      }else{
        $instrument = $value['instrumentname'];
      }
      if($value['level'] == 1){
        $level = 'Intermediate';
      }else if($value['level'] == 2){
        $level = 'Junior';
      }else {
        $level = 'Advance';
      }
      if($value['co_performers']){
        if($value['co_instrument'] == 31){
          $co_instrument = $value['co_other_instrument'];
        }else{
          $co_instrument = $value['co_instrumentname'];
        }
      }else{
        $co_instrument = '';
      }
      
      if($value['payment_type'] == 1){
        $payment_type = 'Paypal';
      }else if($value['payment_type'] == 2){
        $payment_type = 'Order Check';
      }
      $confirm_payment = $value['confirm_payment'] == 1 ? 'Paid' : 'Unpaid';
      $special_request = $value['special_request'] == 1 ? 'Yes' : 'No';
      $performance_type = 'Solo';
      if($value['performance_type'] == 2){
        $performance_type = 'Duo';
      }else if($value['performance_type'] == 3){
        $performance_type = 'Trio';
      }else if($value['performance_type'] == 4){
        $performance_type = 'Quartet';
      }else if($value['performance_type'] == 5){
        $performance_type = 'Ensemble';
      }

      $body = array($inx, $value['audition_name'], $value['student_name'], $value['student_email'], $value['countryname'], $value['address'], $value['mobile_no'], $value['birthday'], $value['studying_year'], $level, $instrument, $performance_type, $value['performance_price'], $value['co_performers'], $co_instrument, $value['composer'], $value['title'], $value['duration'], $value['teacher'], $value['teacher_email'], $value['teacher_country'], $value['teacher_address'], $value['teacher_mobile'], $payment_type, $confirm_payment, $value['late_fee'], $special_request, $value['request_time'], $value['request_reason'], $value['score'], $value['place'], $value['video_link'], $value['total_price']);
      fputcsv($file, $body);
    }
    fclose($file); 
    exit; 
  }
  public function import_from_excel_little_morarts()
  {
    $type = 1;
    $tmp_filename = $FILES["fileToUpload"]["tmp_name"];
    $uploadOk = 1;
    $target_dir = 'uploads/';
    // $target_dir = '/var/www/crescendo/uploads/';
    if (!is_dir($target_dir)) {
    @mkdir("$target_dir", 0755, true);
    }
    $target_file = realpath($target_dir) . '/' . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($fileType != "csv") {
      $rtn_str = 'Sorry, only CSV file is allowed.';
      $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      $rtn_str = "Sorry, file already exists.";
      $uploadOk = 0;
    }

    if($uploadOk != 0) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $rtn_str = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been added.";
      } else {
        $rtn_str = "Sorry, there was an error adding your file.";
        $uploadOk = 0;
      }
    }
    $audition_id = 0;
    $file = fopen($target_file, "r");
    if($uploadOk != 0){
      while (($item = fgetcsv($file, filesize($file), ",")) !== FALSE) {
        if( trim($item[0]) != 'No' )
        { 
          continue;
        }
        $audition_id = $this->applications_model->get_audition_id($type, trim($item[1]));
        $country_id = $this->applications_model->get_country_id(trim($item[4]));
        $instrument_info = $this->applications_model->get_instrument_id(trim($item[10]));
        if($instrument_info){
          $instrument_id = $instrument_info['id'];
          $other_instrument = '';
        }else{
          $instrument_id = 31;
          $other_instrument = trim($item[10]);
        }

        $co_instrument_info = $this->applications_model->get_instrument_id(trim($item[14]));
        if($co_instrument_info){
          $co_instrument_id = $co_instrument_info['id'];
          $co_other_ins_val = '';
        }else{
          $co_instrument_id = 31;
          $co_other_ins_val = trim($item[14]);
        }

        if(trim($item[11]) == 'Solo'){
          $performance_type = 1;
          $co_performers = '';
          $co_instrument = '';
        }else if(trim($item[11]) == 'Duo'){
          $performance_type = 2;
          $co_performers = trim($item[13]);
          $co_instrument = $co_instrument_id;
          $co_other_instrument = $co_other_ins_val;
        }else if(trim($item[11]) == 'Trio'){
          $performance_type = 3;
          $co_performers = trim($item[13]);
          $co_instrument = $co_instrument_id;
          $co_other_instrument = $co_other_ins_val;
        }else if(trim($item[11]) == 'Quartet'){
          $performance_type = 4;
          $co_performers = trim($item[13]);
          $co_instrument = $co_instrument_id;
          $co_other_instrument = $co_other_ins_val;
        }else if(trim($item[11]) == 'Ensemble'){
          $performance_type = 5;
          $co_performers = trim($item[13]);
          $co_instrument = $co_instrument_id;
          $co_other_instrument = $co_other_ins_val;
        }
        $teacher_country_id = $this->applications_model->get_country_id(trim($item[20]));
        $row_data = array(
          "audition_type" => 4,
          "audition_id" => $audition_id['id'],
          "student_name" => trim($item[2]),
          "student_email" => trim($item[3]),
          "country_id" => $country_id['id'],
          "address" => trim($item[5]),
          'mobile_no' => trim($item[6]),
          "birthday" => trim($item[7]),
          "studying_year" => trim($item[8]),
          "level" => trim($item[9]),
          "instrument" => $instrument_id,
          "other_instrument" => $other_instrument,
          "performance_type" => $performance_type,
          "performance_price" => trim($item[12]),
          "co_performers" => $co_performers,
          "co_instrument" => $co_instrument,
          "co_other_instrument" => $co_other_instrument,
          "composer" => trim($item[15]),
          "title" => trim($item[16]),
          "duration" => trim($item[17]),
          "teacher" => trim($item[18]),
          "teacher_email" => trim($item[19]),
          "teacher_country_id" => $teacher_country_id,
          "teacher_address" => trim($item[21]),
          "teacher_mobile" => trim($item[22]),
          "payment_type" => trim($item[23]) == 'Paypal' ? 1 : 2,
          "is_paid" => trim($item[24]) == 'Paid' ? 1 : 0,
          "late_fee" => trim($item[25]),
          "special_request" => trim($item[26]) == 'No' ? 0 : 1,
          "request_time" => trim($item[27]),
          "request_reason" => trim($item[28]),
          "score" => trim($item[29]),
          "place" => trim($item[30]),
          "video_link" => trim($item[31]),
          "total_price" => trim($item[32]),
          "created_at" => date('Y-m-d H:i:s'),
          "created_by" => $this->session->userdata('user_id'),
        );
        // $this->applications_model->save_csv_data($row_data);
      } // end of while loop
    }

    $response_data = array('status' => $uploadOk, 'message' => $rtn_str);
    
    fclose($file);
    echo json_encode(trim($item[1]).'--'.$audition_id);
  }
}

?>