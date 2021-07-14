<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

	public function login($data, $is_localadmin){
		if($is_localadmin == 'on'){
			$this->db->from('tbl_local_admin');
			$this->db->join('gb_roles', 'gb_roles.id = tbl_local_admin.admin_role_id');
			$this->db->where('tbl_local_admin.name', $data['username']);
			$query = $this->db->get()->row_array();
			return $query;
		}else{
			$this->db->from('tbl_users');
			$this->db->join('gb_roles', 'gb_roles.id = tbl_users.admin_role_id');
			$this->db->where('tbl_users.username', $data['username']);

			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return false;
			}
			else{
				//Compare the password attempt with the password we have stored.
				$result = $query->row_array();
			    $validPassword = password_verify($data['password'], $result['password']);
			    
			    if($validPassword){
			        return $result = $query->row_array();
			    }
			}
		}
	}

	//--------------------------------------------------------------------
	public function register($data){
		$this->db->insert('tbl_users', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function email_verification($code){
		$this->db->select('email, token, is_active');
		$this->db->from('tbl_users');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('tbl_users', array('is_verify' => 1, 'token'=> ''));
			return true;
		}
		else{
			return false;
			}
	}

	//============ Check User Email ============
    function check_user_mail($email)
    {
    	$result = $this->db->get_where('tbl_users', array('email' => $email));

    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
    		return false;
    	}
    }

    //============ Update Reset Code Function ===================
    public function update_reset_code($reset_code, $user_id){
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('admin_id', $user_id);
    	$this->db->update('tbl_users', $data);
    }

    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code){

    	$result = $this->db->get_where('tbl_users',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update('tbl_users', $data);
		return true;
    }

    //--------------------------------------------------------------------
	public function get_admin_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('tbl_users', array('admin_id' => $id));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_admin($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('tbl_users', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('tbl_users', $data);
		return true;
	}

	public function get_countries(){
		$this->db->select('*');
		$this->db->from('ci_countries');
		$this->db->order_by('id');

		return $this->db->get()->result_array();
	}

	public function get_old_password($user_id, $username, $role_id){
		$this->db->select('password');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);

		return $this->db->get()->result_array()[0];
	}
	public function update_password($user_id, $new_password){
		$this->db->where('id', $user_id);
		return $this->db->update('tbl_users', array('password' => $new_password));
	}

	public function get_current_profile($user_id){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);

		return $this->db->get()->result_array()[0];
	}

	public function update_profile($user_id, $data){
		$this->db->where('id', $user_id);
		return $this->db->update('tbl_users', $data);
	}

}

?>