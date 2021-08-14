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
        $age = date('Y') - explode('-', $value['birthday'])[0];
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
        $age = date('Y') - explode('-', $value['birthday'])[0];
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
        $age = date('Y') - explode('-', $value['birthday'])[0];
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
        $age = date('Y') - explode('-', $value['birthday'])[0];
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
  
}

?>