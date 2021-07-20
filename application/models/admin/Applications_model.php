<?php
	class Applications_model extends CI_Model{
		public function get_apply_little_morarts_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a3.id', 'left');
			$this->db->join('tbl_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_little_morarts_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_little_morarts_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a2.id', 'left');
			$this->db->join('tbl_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
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
			$this->db->join('tbl_locations as a2', 'a1.audition_location = a2.id', 'left');
			$this->db->where('a1.id', $audition_id);
			return $this->db->get()->result_array()[0];
		}
		public function get_apply_recital_little_morarts_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a3.id', 'left');
			$this->db->join('tbl_recital_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_recital_little_morarts_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_recital_little_morarts_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a2.id', 'left');
			$this->db->join('tbl_recital_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_detail_info($apply_id, $audition_type){
			$this->db->select('a1.*, a2.username, concat(a3.audition_name, " ", a4.location) as position');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_little_morarts as a3', 'a3.id = a1.audition_id', 'left');
			$this->db->join('tbl_locations as a4', 'a4.id = a3.audition_location', 'left');
			$this->db->where('a1.id', $apply_id);
			$this->db->where('a1.audition_type', $audition_type);

			return $this->db->get()->result_array()[0];
		}
		public function update_apply($data, $apply_id){
			$this->db->where('id', $apply_id);
			return $this->db->update('tbl_applications', $data);
		}
		///////////////////////
		public function get_apply_crescendo_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a3.id', 'left');
			$this->db->join('tbl_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_crescendo_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_crescendo_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a2.id', 'left');
			$this->db->join('tbl_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		////////////////////
		public function get_apply_recital_crescendo_list($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a3.id', 'left');
			$this->db->join('tbl_recital_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_recital_crescendo_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_recital_crescendo_all_count_with_filter($search_key, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a2.id', 'left');
			$this->db->join('tbl_recital_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
	}
?>