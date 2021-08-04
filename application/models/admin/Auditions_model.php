<?php
	class Auditions_model extends CI_Model{
		public function get_little_morarts_list($search_key, $start, $rowperpage, $role, $user_id) {
			$this->db->select('a1.*, a2.name as localadmin, a3.location as auditionlocation');
			$this->db->from('tbl_little_morarts as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			$this->db->join('tbl_locations as a3', 'a1.audition_location = a3.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			if($role == 2){
				$this->db->where('a1.local_admin', $uesr_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_little_morarts_all_count($role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_little_morarts as a1');
			if($role == 2){
				$this->db->where('a1.local_admin', $uesr_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_little_morarts_all_count_with_filter($search_key, $start, $rowperpage, $role, $user_id) {
			$this->db->select('*');
			$this->db->from('tbl_little_morarts as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			if($role == 2){
				$this->db->where('a1.local_admin', $uesr_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_all_localadmins()
		{
			$this->db->select('id, name');
			$this->db->from('tbl_local_admin');
			return $this->db->get()->result_array();
		}

		public function get_audition_locations(){
			$this->db->select('id, location');
			$this->db->from('tbl_locations');
			return $this->db->get()->result_array();
		}

		public function save_little_morarts($data)
		{
			$this->db->insert('tbl_little_morarts', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}

		public function get_crescendo_list($search_key, $start, $rowperpage, $role, $user_id) {
			$this->db->select('a1.*, a2.name as localadmin, a3.location as auditionlocation');
			$this->db->from('tbl_crescendo as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			$this->db->join('tbl_locations as a3', 'a1.audition_location = a3.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			if($role == 2){
				$this->db->where('a1.local_admin', $uesr_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_crescendo_all_count($role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_crescendo as a1');
			if($role == 2){
				$this->db->where('a1.local_admin', $uesr_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_crescendo_all_count_with_filter($search_key, $start, $rowperpage, $role, $user_id) {
			$this->db->select('*');
			$this->db->from('tbl_crescendo as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			if($role == 2){
				$this->db->where('a1.local_admin', $uesr_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function save_crescendo($data)
		{
			$this->db->insert('tbl_crescendo', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}
		public function get_little_morarts_info($audition_id)
		{
			$this->db->select('a1.*');
			$this->db->from('tbl_little_morarts as a1');
			$this->db->where('a1.id', $audition_id);
			return $this->db->get()->result_array()[0];
		}
		public function update_little_morarts($data, $audition_id){
			$this->db->where('id', $audition_id);
			return $this->db->update('tbl_little_morarts', $data);
		}
		public function update_crescendo($data, $audition_id){
			$this->db->where('id', $audition_id);
			return $this->db->update('tbl_crescendo', $data);
		}
		public function get_crescendo_info($audition_id)
		{
			$this->db->select('a1.*');
			$this->db->from('tbl_crescendo as a1');
			$this->db->where('a1.id', $audition_id);
			return $this->db->get()->result_array()[0];
		}
		public function delete_little_morarts($audition_id){
			$this->db->where('id', $audition_id);
			return $this->db->update('tbl_little_morarts', array('is_delete' => 1));
		}
		public function delete_crescendo($audition_id){
			$this->db->where('id', $audition_id);
			return $this->db->update('tbl_crescendo', array('is_delete' => 1));
		}
	}
?>