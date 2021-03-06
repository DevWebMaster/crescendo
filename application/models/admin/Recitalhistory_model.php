<?php
	class Recitalhistory_model extends CI_Model{
		public function get_application_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $token, $role, $user_id) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
			}
			$this->db->where('audition_type', $audition_type);
			if($token != 'super'){
				$this->db->where('token', $token);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($role != '1'){
				$this->db->where('a1.role_id', $role);
				$this->db->where('a1.created_by', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_application_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->where('a1.audition_type', $audition_type);
			if($role != 1){
				$this->db->where('a1.role_id', $role);
				$this->db->where('a1.created_by', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_application_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			$this->db->where('a1.audition_type', $audition_type);
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($role != 1){
				$this->db->where('a1.role_id', $role);
				$this->db->where('a1.created_by', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_audition_info($audition_type, $audition_id){
			$this->db->select('a1.audition_name, a2.location as audition_location');
			if($audition_type == 1){
				$this->db->from('tbl_little_morarts as a1');
			}else if($audition_type == 2){
				$this->db->from('tbl_crescendo as a1');
			}else if($audition_type == 3){
				$this->db->from('tbl_recital_little_morarts as a1');
			}else if($audition_type == 4){
				$this->db->from('tbl_recital_crescendo as a1');
			}
			$this->db->join('tbl_recital_locations as a2', 'a1.audition_location = a2.id', 'left');
			$this->db->where('a1.id', $audition_id);
			return $this->db->get()->result_array()[0];
		}
		public function get_application_info($audition_id, $audition_type){
			$this->db->select('a1.*, a2.audition_name');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_little_morarts as a2', 'a1.audition_id = a2.id');
			$this->db->where('a1.is_delete', 0);
			$this->db->where('id', $audition_id);
			$this->db->where('audition_type', $audition_type);

			return $this->db->get()->result_array();
		}
	}
?>