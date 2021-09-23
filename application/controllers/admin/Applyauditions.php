<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Applyauditions extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();

    $this->load->model('admin/applyauditions_model', 'applyauditions_model');
  }

  public function index()
  {

    $data['title'] = 'Little Mozarts';

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['little_morarts'] = $this->applyauditions_model->get_little_morarts(0, $user_id, $role_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function apply_little_morarts($audition_id = 0)
  {
    $data['title'] = 'Apply Little Mozarts';

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['little_morart'] = $this->applyauditions_model->get_little_morarts($audition_id, $user_id, $role_id);

    $data['user_info'] = $this->applyauditions_model->get_user_info($user_id, $role_id);
    $data['role_id'] = $role_id;
    $data['countries'] = $this->applyauditions_model->get_countries();

    $data['instruments'] = $this->applyauditions_model->get_instruments();

    $data['teachers'] = $this->applyauditions_model->get_teachers($user_id, $role_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/apply_little_morarts');
    $this->load->view('admin/includes/_footer');
  }
  public function save_little_morarts()
  {
    $student_time = $this->input->post('student_time');
    $performance_type = $this->input->post('performance_type');
    if($performance_type == 1){
      $performance_price = $this->input->post('solo_price');
    }else if($performance_type == 2){
      $performance_price = $this->input->post('duet_price');
    }else if($performance_type == 3){
      $performance_price = $this->input->post('trio_price');
    }else if($performance_type == 4){
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
    if($payment_code != ''){
      $paid_amount = $this->input->post('order_paid_amount');
    }else {
      $paid_amount = $this->input->post('paid_amount');
    }
    if(($transaction_id != '' && $transaction_date != '') || $payment_code != ''){
      $is_paid = 1;
    }else {
      $is_paid = 0;
    }
    $co_extra_data = array();
    $co_inx = $this->input->post('inx');
    for ($i=0; $i < $co_inx-3; $i++) { 
      $index = $i+4;
      $co_obj = array(
        'co_performer' => $this->input->post('co_performers'.$index),
        'co_instrument' => $this->input->post('co_instrument'.$index),
        'co_other_instrument' => $this->input->post('co_other_instrument'.$index)
      );
      array_push($co_extra_data, $co_obj);
    }

    // $remain_duration = $this->applyauditions_model->get_remain_duration($this->input->post('audition_id'));

    // if($remain_duration['remain_duration'] >= $this->input->post('student_time')){
      $data = array(
        'audition_type'=>1, //1:little_morarts, 2:crescendo, 3:recital_little_morarts, 4:recital_crescendo
        'audition_id'=>$this->input->post('audition_id'),
        'student_name'=>$this->input->post('student_name'),
        'student_email'=>$this->input->post('student_email'),
        'country_id'=>$this->input->post('country_id'),
        'address'=>$this->input->post('student_address'),
        'mobile_no'=>$this->input->post('student_mobile_no'),
        'birthday'=>$this->input->post('student_birthday'),
        'age'=>$this->input->post('student_age'),
        'studying_year'=>$this->input->post('studying_year'),
        'level'=>$this->input->post('level'),
        'instrument'=>$this->input->post('instrument'),
        'other_instrument'=>$this->input->post('other_instrument'),
        'duration'=>$student_time,
        'performance_type'=>$performance_type,
        'performance_price'=>$performance_price,
        'co_performers'=>$this->input->post('co_performers'),
        'co_instrument'=>$this->input->post('co_instrument'),
        'co_other_instrument'=>$this->input->post('co_other_instrument'),
        'co_performers2'=>$this->input->post('co_performers2'),
        'co_instrument2'=>$this->input->post('co_instrument2'),
        'co_other_instrument2'=>$this->input->post('co_other_instrument2'),
        'co_performers3'=>$this->input->post('co_performers3'),
        'co_instrument3'=>$this->input->post('co_instrument3'),
        'co_other_instrument3'=>$this->input->post('co_other_instrument3'),
        'co_performers4'=>$this->input->post('co_performers4'),
        'co_instrument4'=>$this->input->post('co_instrument4'),
        'co_other_instrument4'=>$this->input->post('co_other_instrument4'),
        'co_extra_data'=>json_encode($co_extra_data),
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
        'paid_amount'=>$paid_amount,
        'islate'=>$islate,
        'late_fee'=>$late_fee,
        'special_request'=>$this->input->post('special_request') == 'on' ? 1 : 0,
        'request_time'=>$this->input->post('request_time'),
        'request_reason'=>$this->input->post('request_reason'),
        // 'request_answer'=>$this->input->post('request_need'),
        'isonline'=>$this->input->post('isonline') == 'on' ? 1 : 0,
        'video_link'=>$this->input->post('video_link'),
        'token'=>$this->session->userdata('token'),
        'role_id'=>$this->session->userdata('admin_role_id'),
        'created_at'=>date('Y-m-d H:i:s'),
        'created_by'=>$this->session->userdata('user_id'),
      );

      $result = $this->applyauditions_model->save_apply($data);
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
  public function crescendo()
  {

    $data['title'] = 'Crescendo';

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['crescendo_list'] = $this->applyauditions_model->get_crescendo(0, $user_id, $role_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/crescendo');
    $this->load->view('admin/includes/_footer');

  }
  public function apply_crescendo($audition_id = 0)
  {
    $data['title'] = 'Apply Crescendo';

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['crescendo'] = $this->applyauditions_model->get_crescendo($audition_id, $user_id, $role_id);

    $data['user_info'] = $this->applyauditions_model->get_user_info($user_id, $role_id);
    $data['role_id'] = $role_id;
    $data['countries'] = $this->applyauditions_model->get_countries();

    $data['instruments'] = $this->applyauditions_model->get_instruments();

    $data['teachers'] = $this->applyauditions_model->get_teachers($user_id, $role_id);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/apply_crescendo');
    $this->load->view('admin/includes/_footer');
  }
  public function save_crescendo()
  {
    $student_time = $this->input->post('student_time');
    $performance_type = $this->input->post('performance_type');
    if($performance_type == 1){
      $performance_price = $this->input->post('solo_price');
    }else if($performance_type == 2){
      $performance_price = $this->input->post('duet_price');
    }else if($performance_type == 3){
      $performance_price = $this->input->post('trio_price');
    }else if($performance_type == 4){
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
    if($payment_code != ''){
      $paid_amount = $this->input->post('order_paid_amount');
    }else {
      $paid_amount = $this->input->post('paid_amount');
    }
    if(($transaction_id != '' && $transaction_date != '') || $payment_code != ''){
      $is_paid = 1;
    }else {
      $is_paid = 0;
    }
    $co_extra_data = array();
    $co_inx = $this->input->post('inx');
    for ($i=0; $i < $co_inx-3; $i++) { 
      $index = $i+4;
      $co_obj = array(
        'co_performer' => $this->input->post('co_performers'.$index),
        'co_instrument' => $this->input->post('co_instrument'.$index),
        'co_other_instrument' => $this->input->post('co_other_instrument'.$index)
      );
      array_push($co_extra_data, $co_obj);
    }
    // $remain_duration = $this->applyauditions_model->get_remain_duration_crescendo($this->input->post('audition_id'));

    // if($remain_duration['remain_duration'] >= $this->input->post('student_time')){
      $data = array(
        'audition_type'=>2, //1:little_morarts, 2:crescendo, 3:recital_little_morarts, 4:recital_crescendo
        'audition_id'=>$this->input->post('audition_id'),
        'student_name'=>$this->input->post('student_name'),
        'student_email'=>$this->input->post('student_email'),
        'country_id'=>$this->input->post('country_id'),
        'address'=>$this->input->post('student_address'),
        'mobile_no'=>$this->input->post('student_mobile_no'),
        'birthday'=>$this->input->post('student_birthday'),
        'age'=>$this->input->post('student_age'),
        'studying_year'=>$this->input->post('studying_year'),
        'level'=>$this->input->post('studying_year'),
        'instrument'=>$this->input->post('instrument'),
        'other_instrument'=>$this->input->post('other_instrument'),
        'duration'=>$student_time,
        'performance_type'=>$performance_type,
        'performance_price'=>$performance_price,
        'co_performers'=>$this->input->post('co_performers'),
        'co_instrument'=>$this->input->post('co_instrument'),
        'co_other_instrument'=>$this->input->post('co_other_instrument'),
        'co_performers2'=>$this->input->post('co_performers2'),
        'co_instrument2'=>$this->input->post('co_instrument2'),
        'co_other_instrument2'=>$this->input->post('co_other_instrument2'),
        'co_performers3'=>$this->input->post('co_performers3'),
        'co_instrument3'=>$this->input->post('co_instrument3'),
        'co_other_instrument3'=>$this->input->post('co_other_instrument3'),
        'co_performers4'=>$this->input->post('co_performers4'),
        'co_instrument4'=>$this->input->post('co_instrument4'),
        'co_other_instrument4'=>$this->input->post('co_other_instrument4'),
        'co_extra_data'=>json_encode($co_extra_data),
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
        'paid_amount'=>$paid_amount,
        'islate'=>$islate,
        'late_fee'=>$late_fee,
        'special_request'=>$this->input->post('special_request') == 'on' ? 1 : 0,
        'request_time'=>$this->input->post('request_time'),
        'request_reason'=>$this->input->post('request_reason'),
        // 'request_answer'=>$this->input->post('request_need'),
        'isonline'=>$this->input->post('isonline') == 'on' ? 1 : 0,
        'video_link'=>$this->input->post('video_link'),
        'token'=>$this->session->userdata('token'),
        'role_id'=>$this->session->userdata('admin_role_id'),
        'created_at'=>date('Y-m-d H:i:s'),
        'created_by'=>$this->session->userdata('user_id'),
      );

      $result = $this->applyauditions_model->save_apply($data);
      // if($result){
      //   //update the audition duration based on student time.
      //   $remain_duration = $remain_duration['remain_duration'] - $student_time;
      //   $this->applyauditions_model->update_audition_duration_crescendo($this->input->post('audition_id'), $remain_duration);
      // }
    // }else{
    //   $result = 'closed';
    // }

    echo json_encode($result);
  }
}

?>