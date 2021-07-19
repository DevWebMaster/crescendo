<?php
	class Activeapplication_model extends CI_Model{
		public function get_application_list($search_key, $start, $rowperpage, $audition_type) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a3.id', 'left');
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_application_all_count($audition_type) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->where('a1.audition_type', $audition_type);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_application_all_count_with_filter($search_key, $start, $rowperpage, $audition_type) {
			$this->db->select('a1.*, a2.username as student, a3.username as teacher');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a2', 'a1.student_name = a2.id', 'left');
			$this->db->join('tbl_users as a3', 'a1.teacher = a2.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($search_key != ''){
				$this->db->like('a2.username', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_audition_info($audition_type, $audition_id){
			$this->db->select('audition_name, audition_location');
			if($audition_type == 1){
				$this->db->from('tbl_little_morarts');
			}else if($audition_type == 2){
				$this->db->from('tbl_crescendo');
			}
			$this->db->where('id', $audition_id);
			return $this->db->get()->result_array()[0];
		}
		public function get_application_info($audition_id, $audition_type){
			$this->db->select('a1.*, a2.audition_name');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_little_morarts as a2', 'a1.audition_id = a2.id');
			$this->db->where('id', $audition_id);
			$this->db->where('audition_type', $audition_type);

			return $this->db->get()->result_array();
		}
	}
?>