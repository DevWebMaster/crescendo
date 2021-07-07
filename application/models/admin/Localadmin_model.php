<?php
	class Localadmin_model extends CI_Model{

		public function add_localadmin($data){
			$this->db->insert('tbl_users', $data);
			return true;
		}

		//---------------------------------------------------
		// get all localadmins for server-side datatable processing (ajax based)
		public function get_all_localadmin(){
			$this->db->select('*');
			$this->db->where('is_admin',0);
			return $this->db->get('tbl_users')->result_array();
		}


		//---------------------------------------------------
		// Get localadmin detial by ID
		public function get_localadmin_by_id($id){
			$query = $this->db->get_where('tbl_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit localadmin Record
		public function edit_localadmin($data, $id){
			$this->db->where('id', $id);
			$this->db->update('tbl_users', $data);
			return true;
		}

		//---------------------------------------------------
		// Change localadmin status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_users');
		} 

	}

?>