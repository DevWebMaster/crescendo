<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Activeapplication extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/activeapplication_model', 'activeapplication_model');
    $this->load->model('admin/applyauditions_model', 'applyauditions_model');
  }

  public function index()
  {
    $data['title'] = 'Little Mozarts';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function crescendo()
  {
    $data['title'] = 'Crescendo';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function get_little_morarts_application_list()
  {
    $token = $this->session->userdata('token');
    $audition_type = 1;
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->activeapplication_model->get_application_all_count($audition_type);
    $totalRecordwithFilter = $this->activeapplication_model->get_application_all_count_with_filter($search_key, $start, $rowperpage, $audition_type);
    $application_list = $this->activeapplication_model->get_application_list($search_key, $start, $rowperpage, $audition_type, $token);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->activeapplication_model->get_audition_info($audition_type, $value['audition_id']);
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
          "evaluation"=>'<a href="'.base_url().EVALUATION_PATH.$value['evaluation'].'" download>'.$value['evaluation'].'</a>',
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_little_morarts_application/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function get_crescendo_application_list()
  {
    $token = $this->session->userdata('token');
    $audition_type = 2;
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->activeapplication_model->get_application_all_count($audition_type);
    $totalRecordwithFilter = $this->activeapplication_model->get_application_all_count_with_filter($search_key, $start, $rowperpage, $audition_type);
    $application_list = $this->activeapplication_model->get_application_list($search_key, $start, $rowperpage, $audition_type, $token);

    $data = array();
    $inx = 0;
    foreach ($application_list as $value) {
        $inx++;
        $audition_info = $this->activeapplication_model->get_audition_info($audition_type, $value['audition_id']);
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
          "evaluation"=>'<a href="'.base_url().EVALUATION_PATH.$value['evaluation'].'" download>'.$value['evaluation'].'</a>',
          "action"=>'<div style="display: inline-flex;"><a h_id="'.$value['audition_type'].'" id="'.$value['id'].'" class="mr-1 btn-sm btn btn-info edit-row" href="edit_little_morarts_application/'.$value['id'].'"><i class="fa fa-edit"></i></a><a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a></div>'
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
  public function edit_little_morarts_application($apply_id = 0)
  {
    $data['title'] = 'Edit Little Mozarts';
    $audition_type = 1;

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    // $data['students'] = $this->applyauditions_model->get_students($user_id, $role_id);

    $data['instruments'] = $this->applyauditions_model->get_instruments();

    $data['countries'] = $this->applyauditions_model->get_countries();

    $data['teachers'] = $this->applyauditions_model->get_teachers($user_id, $role_id);

    $data['little_morart'] = $this->activeapplication_model->get_application_info($apply_id, $audition_type);
    $data['apply_id'] = $apply_id;

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/edit_apply_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function update_little_morarts_application()
  {
    $apply_id = $this->input->post('apply_id');
    $student_time = $this->input->post('student_time');
    $performance_type = $this->input->post('performance_type');
    if($performance_type == 1){
      $performance_price = $this->input->post('solo_price');
    }else if($performance_type == 2){
      $performance_price = $this->input->post('duet_price');
    }else if($performance_type == 3){
      $performance_price = $this->input->post('trio_price');
    }else if($performance_type == 4){
      $performance_price = $this->input->post('quartet_price');
    }else if($performance_type == 5){
      $performance_price = $this->input->post('ensemble_price');
    }

    $audition_deadline = date_create($this->input->post('audition_deadline'));
    $current_date = date_create(date());
    $diff = date_diff($audition_deadline, $current_date);
    if($diff < 0){
      $islate = 1;
      $late_fee = $this->input->post('late_fee');
    }else {
      $islate = 0;
    }

    $transaction_id = $this->input->post('transaction_id');
    $transaction_date = $this->input->post('transaction_date');
    $payment_code = $this->input->post('payment_code');
    if(($transaction_id != '' && $transaction_date != '') || $payment_code != ''){
      $is_paid = 1;
    }else {
      $is_paid = 0;
    }

    // $remain_duration = $this->applyauditions_model->get_remain_duration($this->input->post('audition_id'));

    // if($remain_duration['remain_duration'] >= $this->input->post('student_time')){
      $data = array(
        'audition_type'=>1, //1:little_morarts, 2:crescendo, 3:recital_little_morarts, 4:recital_crescendo
        // 'audition_id'=>$this->input->post('audition_id'),
        'student_name'=>$this->input->post('student_name'),
        'student_email'=>$this->input->post('student_email'),
        'country_id'=>$this->input->post('country_id'),
        'address'=>$this->input->post('student_address'),
        'mobile_no'=>$this->input->post('student_mobile_no'),
        'birthday'=>$this->input->post('student_birthday'),
        'instrument'=>$this->input->post('instrument'),
        'other_instrument'=>$this->input->post('other_instrument'),
        // 'duration'=>$student_time,
        'performance_type'=>$performance_type,
        'performance_price'=>$performance_price,
        'co_performers'=>$this->input->post('co_performers'),
        'composer'=>$this->input->post('composer'),
        'title'=>$this->input->post('title'),
        'teacher'=>$this->input->post('teacher_name'),
        'teacher_email'=>$this->input->post('teacher_email'),
        'teacher_country_id'=>$this->input->post('teacher_country_id'),
        'teacher_address'=>$this->input->post('teacher_address'),
        'teacher_mobile'=>$this->input->post('teacher_mobile_no'),
        'payment_type'=>$this->input->post('payment_type'),
        'transaction_id'=>$transaction_id,
        'transaction_date'=>$transaction_date,
        'payment_code'=>$payment_code,
        'is_paid'=>$is_paid,
        // 'islate'=>$islate,
        // 'late_fee'=>$late_fee,
        'special_request'=>$this->input->post('special_request') == 'on' ? 1 : 0,
        'request_time'=>$this->input->post('request_time'),
        'request_reason'=>$this->input->post('request_reason'),
        // 'request_answer'=>$this->input->post('request_need'),
        'isonline'=>$this->input->post('isonline') == 'on' ? 1 : 0,
        'video_link'=>$this->input->post('video_link'),
        'updated_at'=>date('Y-m-d H:i:s'),
        'updated_by'=>$this->session->userdata('user_id'),
      );

      $result = $this->activeapplication_model->update_apply($data, $apply_id);
      // if($result){
      //   //update the audition duration based on student time.
      //   $remain_duration = $remain_duration['remain_duration'] - $student_time;
      //   $this->applyauditions_model->update_audition_duration($this->input->post('audition_id'), $remain_duration);
      // }
    // }else{
    //   $result = 'closed';
    // }

    echo json_encode($result);
  }
  public function delete_little_morarts()
  {
    $id = $this->input->post('id');
    $result = $this->activeapplication_model->delete_little_morarts($id);

    echo json_encode($result);
  }
  public function edit_crescendo_application($apply_id = 0)
  {
    $data['title'] = 'Edit Crescendo';
    $audition_type = 2;

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['instruments'] = $this->applyauditions_model->get_instruments();

    $data['countries'] = $this->applyauditions_model->get_countries();

    $data['teachers'] = $this->applyauditions_model->get_teachers($user_id, $role_id);

    $data['crescendo'] = $this->activeapplication_model->get_application_info($apply_id, $audition_type);
    $data['apply_id'] = $apply_id;

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/activeapplication/edit_apply_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function update_crescendo_application()
  {
    $apply_id = $this->input->post('apply_id');
    $student_time = $this->input->post('student_time');
    $performance_type = $this->input->post('performance_type');
    if($performance_type == 1){
      $performance_price = $this->input->post('solo_price');
    }else if($performance_type == 2){
      $performance_price = $this->input->post('duet_price');
    }else if($performance_type == 3){
      $performance_price = $this->input->post('trio_price');
    }else if($performance_type == 4){
      $performance_price = $this->input->post('quartet_price');
    }else if($performance_type == 5){
      $performance_price = $this->input->post('ensemble_price');
    }

    $audition_deadline = date_create($this->input->post('audition_deadline'));
    $current_date = date_create(date());
    $diff = date_diff($audition_deadline, $current_date);
    if($diff < 0){
      $islate = 1;
      $late_fee = $this->input->post('late_fee');
    }else {
      $islate = 0;
    }

    $transaction_id = $this->input->post('transaction_id');
    $transaction_date = $this->input->post('transaction_date');
    $payment_code = $this->input->post('payment_code');
    if(($transaction_id != '' && $transaction_date != '') || $payment_code != ''){
      $is_paid = 1;
    }else {
      $is_paid = 0;
    }

    // $remain_duration = $this->applyauditions_model->get_remain_duration($this->input->post('audition_id'));

    // if($remain_duration['remain_duration'] >= $this->input->post('student_time')){
      $data = array(
        'audition_type'=>2, //1:little_morarts, 2:crescendo, 3:recital_little_morarts, 4:recital_crescendo
        // 'audition_id'=>$this->input->post('audition_id'),
        'student_name'=>$this->input->post('student_name'),
        'student_email'=>$this->input->post('student_email'),
        'country_id'=>$this->input->post('country_id'),
        'address'=>$this->input->post('student_address'),
        'mobile_no'=>$this->input->post('student_mobile_no'),
        'birthday'=>$this->input->post('student_birthday'),
        'instrument'=>$this->input->post('instrument'),
        'other_instrument'=>$this->input->post('other_instrument'),
        // 'duration'=>$student_time,
        'performance_type'=>$performance_type,
        'performance_price'=>$performance_price,
        'co_performers'=>$this->input->post('co_performers'),
        'composer'=>$this->input->post('composer'),
        'title'=>$this->input->post('title'),
        'teacher'=>$this->input->post('teacher_name'),
        'teacher_email'=>$this->input->post('teacher_email'),
        'teacher_country_id'=>$this->input->post('teacher_country_id'),
        'teacher_address'=>$this->input->post('teacher_address'),
        'teacher_mobile'=>$this->input->post('teacher_mobile_no'),
        'payment_type'=>$this->input->post('payment_type'),
        'transaction_id'=>$transaction_id,
        'transaction_date'=>$transaction_date,
        'payment_code'=>$payment_code,
        'is_paid'=>$is_paid,
        // 'islate'=>$islate,
        // 'late_fee'=>$late_fee,
        'special_request'=>$this->input->post('special_request') == 'on' ? 1 : 0,
        'request_time'=>$this->input->post('request_time'),
        'request_reason'=>$this->input->post('request_reason'),
        // 'request_answer'=>$this->input->post('request_need'),
        'isonline'=>$this->input->post('isonline') == 'on' ? 1 : 0,
        'video_link'=>$this->input->post('video_link'),
        'updated_at'=>date('Y-m-d H:i:s'),
        'updated_by'=>$this->session->userdata('user_id'),
      );

      $result = $this->activeapplication_model->update_apply($data, $apply_id);
      // if($result){
      //   //update the audition duration based on student time.
      //   $remain_duration = $remain_duration['remain_duration'] - $student_time;
      //   $this->applyauditions_model->update_audition_duration($this->input->post('audition_id'), $remain_duration);
      // }
    // }else{
    //   $result = 'closed';
    // }

    echo json_encode($result);
  }
  public function delete_crescendo()
  {
    $id = $this->input->post('id');

    $result = $this->activeapplication_model->delete_crescendo($id);

    echo json_encode($result);
  }
}

?>