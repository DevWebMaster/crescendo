<?php
	class Applications_model extends CI_Model{
		public function get_audition_list($search_key, $start, $rowperpage) {
			$this->db->select('a1.*, a2.name as localadmin');
			$this->db->from('tbl_little_morarts as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_audition_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_little_morarts as a1');
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_audition_all_count_with_filter($search_key, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_little_morarts as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_recital_list($search_key, $start, $rowperpage) {
			$this->db->select('a1.*, a2.name as localadmin');
			$this->db->from('tbl_recital_little_morarts as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_recital_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_recital_little_morarts as a1');
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_recital_all_count_with_filter($search_key, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_recital_little_morarts as a1');
			$this->db->join('tbl_local_admin as a2', 'a1.local_admin = a2.id', 'left');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
	}
?>