<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('admin/auth_model', 'auth_model');
	}

	//--------------------------------------------------------------
	public function index(){

		if($this->session->has_userdata('is_admin_login')){
			redirect('admin/account');
		}
		else{
			redirect('admin/auth/login');
		}
	}

	//--------------------------------------------------------------
	public function login(){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', $data['errors']);
					redirect(base_url('admin/auth/login'),'refresh');
				}
				else {
					$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
					$is_localadmin = $this->input->post('islocaladmin');
					$result = $this->auth_model->login($data, $is_localadmin);
					if($result){
							if($result['is_verify'] == 0){
								$this->session->set_flashdata('error', 'Please verify your email address!');
								redirect(base_url('admin/auth/login'));
								exit();
							}
							if($result['is_active'] == 0){
								$this->session->set_flashdata('error', 'Account is disabled by Admin!');
								redirect(base_url('admin/auth/login'));
								exit();
							}
							if($result['is_admin'] == 1){
								$admin_data = array(
									'user_id' => $result['id'],
									'username' => $result['username'],
									'admin_role_id' => $result['admin_role_id'],
									'admin_role' => $result['title'],
									'is_super' => $result['is_super'],
									'is_admin_login' => TRUE
								);
								$this->session->set_userdata($admin_data);
								$this->rbac->set_access_in_session(); // set access in session

								if($result['is_super'])
									redirect(base_url('admin/account/index'), 'refresh');
								else
									redirect(base_url('admin/account/index'), 'refresh');
								}
							}
						else{
							$this->session->set_flashdata('errors', 'Invalid Username or Password!');
							redirect(base_url('admin/auth/login'));
						}
					}
				}
			else{
				$data['title'] = 'Login';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;

				

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/login');
				$this->load->view('admin/includes/_footer', $data);
			}
		}	

		//-------------------------------------------------------------------------
		public function register(){

			if($this->input->post('submit')){

				// for google recaptcha
				if ($this->recaptcha_status == true) {
		            if (!$this->recaptcha_verify_request()) {
		                $this->session->set_flashdata('form_data', $this->input->post());
		                $this->session->set_flashdata('error', 'reCaptcha Error');
		                redirect(base_url('admin/auth/register'));
		                exit();
		            }
		        }
	        
				$this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|is_unique[tbl_users.username]|required');
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[tbl_users.email]|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/register'),'refresh');
				}
				else{
					$data = array(
						'username' => $this->input->post('username'),
						'country' => $this->input->post('country'),
						'address' => $this->input->post('address'),
						'admin_role_id' => $this->input->post('role_status'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_active' => 1,
						'is_verify' => 1,
						'is_admin' => 1,
						'token' => md5(rand(0,1000)),    
						'last_ip' => '',
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->auth_model->register($data);
					if($result){
						redirect(base_url('admin/auth/login'));
					}
					// if($result){
					// 	//sending welcome email to user
					// 	$this->load->helper('email_helper');

					// 	$mail_data = array(
					// 		'fullname' => $data['firstname'].' '.$data['lastname'],
					// 		'verification_link' => base_url('admin/auth/verify/').'/'.$data['token']
					// 	);

					// 	$to = $data['email'];

					// 	$email = $this->mailer->mail_template($to,'email-verification',$mail_data);

					// 	if($email){
					// 		$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
					// 		redirect(base_url('admin/auth/login'));
					// 	}	
					// 	else{
					// 		echo 'Email Error';
					// 	}
					// }
				}
			}
			else{
				$data['title'] = 'Create an Account';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;

				$data['countries'] = $this->auth_model->get_countries();

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/register');
				$this->load->view('admin/includes/_footer', $data);
			}
		}

		//----------------------------------------------------------	
		public function verify(){

			$verification_id = $this->uri->segment(4);
			$result = $this->auth_model->email_verification($verification_id);
			if($result){
				$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
				redirect(base_url('admin/auth/login'));
			}
			else{
				$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
				redirect(base_url('admin/auth/login'));
			}	
		}

		//--------------------------------------------------		
		public function forgot_password(){

			if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/forget_password'),'refresh');
				}

				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($email);

				if($response){

					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['admin_id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['admin_id']);
					
					// --- sending email
					$to = $response['email'];
					$mail_data= array(
						'fullname' => $response['firstname'].' '.$response['lastname'],
						'reset_link' => base_url('admin/auth/reset_password/'.$pwd_reset_code)
					);
					$this->mailer->mail_template($to,'forget-password',$mail_data);

					if($email){
						$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

						redirect(base_url('admin/auth/forgot_password'));
					}
					else{
						$this->session->set_flashdata('error', 'There is the problem on your email');
						redirect(base_url('admin/auth/forgot_password'));
					}
				}
				else{
					$this->session->set_flashdata('error', 'The Email that you provided are invalid');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
			else{

				$data['title'] = 'Forget Password';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['bg_cover'] = true;

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/forget_password');
				$this->load->view('admin/includes/_footer', $data);
			}
		}

		//----------------------------------------------------------------		
		public function reset_password($id=0){

			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);

					$this->session->set_flashdata('reset_code', $id);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
  
				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
					redirect(base_url('admin/auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);

				if($result){

					$data['title'] = 'Reseat Password';
					$data['reset_code'] = $id;
					$data['navbar'] = false;
					$data['sidebar'] = false;
					$data['footer'] = false;
					$data['bg_cover'] = true;

					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/auth/reset_password');
					$this->load->view('admin/includes/_footer', $data);

				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
		}

		//-----------------------------------------------------------------------
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin/auth/login'), 'refresh');
		}
		
		// Get Country. State and City
		//----------------------------------------
		public function get_country_states()
		{
			$states = $this->db->select('*')->where('country_id',$this->input->post('country'))->get('ci_states')->result_array();
		    $options = array('' => 'Select Option') + array_column($states,'name','id');
		    $html = form_dropdown('state',$options,'','class="form-control select2" required');
			$error =  array('msg' => $html);
			echo json_encode($error);
		}

		//----------------------------------------
		public function get_state_cities()
		{
			$cities = $this->db->select('*')->where('state_id',$this->input->post('state'))->get('ci_cities')->result_array();
		    $options = array('' => 'Select Option') + array_column($cities,'name','id');
		    $html = form_dropdown('city',$options,'','class="form-control select2" required');
			$error =  array('msg' => $html);
			echo json_encode($error);
		}

		public function edit_password()
		{
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/auth/edit_password');
			$this->load->view('admin/includes/_footer', $data);
		}

		public function update_password()
		{
			$user_id = $this->session->userdata('user_id');
			$username = $this->session->userdata('username');
			$role_id = $this->session->userdata('admin_role_id');

			$current_password = $this->auth_model->get_old_password($user_id, $username, $role_id);

			$old_password = $this->input->post('old_password');
			$new_password = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);

			$validPassword = password_verify($old_password, $current_password['password']);
			
			if($validPassword){
				$rtn = $this->auth_model->update_password($user_id, $new_password);
				if($rtn){
					$status = 'S';
				}else{
					$status = 'F';
				}
			}else{
				$status = 'F';
			}
			echo json_encode($status);
		}

		public function profile()
		{
			$user_id = $this->session->userdata('user_id');
			$old = $this->auth_model->get_current_profile($user_id);

			$data['old'] = $old;
			$data['countries'] = $this->auth_model->get_countries();

			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/auth/profile');
			$this->load->view('admin/includes/_footer', $data);
		}
		public function update_profile()
		{
			$user_id = $this->session->userdata('user_id');
			$data = array(
				'username' => $this->input->post('username'),
				'country' => $this->input->post('country'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no')
			);

			$rtn = $this->auth_model->update_profile($user_id, $data);

			echo json_encode($rtn);
		}

	}  // end class


?>