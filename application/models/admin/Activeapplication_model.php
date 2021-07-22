<?php
	class Activeapplication_model extends CI_Model{
		public function get_application_list($search_key, $start, $rowperpage, $audition_type, $token) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
			}
			$this->db->where('audition_type', $audition_type);
			if($token != 'super'){
				$this->db->where('token', $token);
			}
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
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			$this->db->where('a1.audition_type', $audition_type);
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
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
		public function get_application_info($apply_id, $audition_type){
			$this->db->select('a1.*, a2.audition_name, a2.audition_date, a3.location as auditionlocation, a4.username, a2.audition_deadline, a2.late_fee, a2.fee_solo, a2.fee_trio, a2.fee_duet, a2.fee_quartet, a2.fee_ensemble');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_users as a4', 'a4.id = a1.student_name', 'left');
			$this->db->join('tbl_little_morarts as a2', 'a1.audition_id = a2.id', 'left');
			$this->db->join('tbl_locations as a3', 'a3.id = a2.audition_location', 'left');
			$this->db->where('a1.id', $apply_id);
			$this->db->where('audition_type', $audition_type);

			return $this->db->get()->result_array();
		}
		public function update_apply($data, $apply_id){
			$this->db->where('id', $apply_id);
			return $this->db->update('tbl_applications', $data);
		}
	}
?>