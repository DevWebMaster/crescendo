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

    $data['title'] = 'Little Morarts';

    $data['little_morarts'] = $this->applyauditions_model->get_little_morarts(0);

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/applyauditions/little_morarts');
    $this->load->view('admin/includes/_footer');

  }
  public function apply_little_morarts($audition_id = 0)
  {
    $data['title'] = 'Apply Little Morarts';

    $data['little_morart'] = $this->applyauditions_model->get_little_morarts($audition_id);

    $user_id = $this->session->userdata('user_id');
    $role_id = $this->session->userdata('admin_role_id');

    $data['students'] = $this->applyauditions_model->get_students($user_id, $role_id);

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

    $remain_duration = $this->applyauditions_model->get_remain_duration($this->input->post('audition_id'));

    if($remain_duration['remain_duration'] >= $this->input->post('student_time')){
      $data = array(
        'audition_type'=>1, //1:little_morarts, 2:crescendo, 3:recital_little_morarts, 4:recital_crescendo
        'audition_id'=>$this->input->post('audition_id'),
        'student_name'=>$this->input->post('student_name'),
        'instrument'=>$this->input->post('instrument'),
        'duration'=>$student_time,
        'performance_type'=>$performance_type,
        'performance_price'=>$performance_price,
        'co_performers'=>$this->input->post('co_performers'),
        'composer'=>$this->input->post('composer'),
        'title'=>$this->input->post('title'),
        'teacher'=>$this->input->post('teacher'),
        'payment_type'=>$this->input->post('payment_type'),
        'transaction_id'=>$transaction_id,
        'transaction_date'=>$transaction_date,
        'payment_code'=>$payment_code,
        'is_paid'=>$is_paid,
        'islate'=>$islate,
        'late_fee'=>$late_fee,
        'special_request'=>$this->input->post('special_request') == 'on' ? 1 : 0,
        'request_date'=>$this->input->post('request_date'),
        'request_reason'=>$this->input->post('request_reason'),
        'request_answer'=>$this->input->post('request_need'),
        'isonline'=>$this->input->post('isonline') == 'on' ? 1 : 0,
        'video_link'=>$this->input->post('video_link'),
        'created_at'=>date('Y-m-d H:i:s'),
        'created_by'=>$this->session->userdata('user_id'),
      );

      $result = $this->applyauditions_model->save_apply($data);
      if($result){
        //update the audition duration based on student time.
        $remain_duration = $remain_duration['remain_duration'] - $student_time;
        $this->applyauditions_model->update_audition_duration($this->input->post('audition_id'), $remain_duration);
      }
    }else{
      $result = 'closed';
    }

    echo json_encode($result);
  }
}

?>