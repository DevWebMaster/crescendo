<?php
	class View_list_model extends CI_Model{
		public function get_view_list($filter_name, $filter_status, $start, $rowperpage) {
			$this->db->select('a1.*');
			$this->db->from('tbl_request as a1');
			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_status != '' && $filter_status != 2){
				$this->db->where('a1.status', $filter_status);
			}
			$this->db->limit($rowperpage, $start);

			$query = $this->db->get()->result_array();

			
			return $query;
		}
		public function get_view_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_request as a1');
			
			// $this->db->order_by('created_at  DESC');

			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		public function get_view_all_count_with_filter($filter_name, $filter_status, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_request as a1');
			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_status != '' && $filter_status != 2){
				$this->db->where('a1.status', $filter_status);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();

		    return $query->num_rows();
		

		}
	
	}
?>