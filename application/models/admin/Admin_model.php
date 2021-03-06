<?php
	class Admin_model extends CI_Model{

		public function add_admin($data){
			$this->db->insert('tbl_users', $data);
			return true;
		}

		//---------------------------------------------------
		// get all admins for server-side datatable processing (ajax based)
		public function get_all_admins(){
			$this->db->select('*');
			$this->db->where('is_admin',1);
			return $this->db->get('tbl_users')->result_array();
		}


		//---------------------------------------------------
		// Get admin detial by ID
		public function get_admin_by_id($id){
			$query = $this->db->get_where('tbl_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit admin Record
		public function edit_admin($data, $id){
			$this->db->where('id', $id);
			$this->db->update('tbl_users', $data);
			return true;
		}

		//---------------------------------------------------
		// Change admin status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_users');
		} 

	}

?>