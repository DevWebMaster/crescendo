<?php
	class Audition_location_model extends CI_Model{
		public function get_audition_location_list($search_key, $start, $rowperpage) {
			$this->db->select('a1.*');
			$this->db->from('tbl_locations as a1');
			if($search_key != ''){
				$this->db->like('a1.location', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_audition_location_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_locations as a1');
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_audition_location_all_count_with_filter($search_key, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_locations as a1');
			if($search_key != ''){
				$this->db->like('a1.location', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function save_audition_location($data)
		{
			$this->db->insert('tbl_locations', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}
		public function update_location($data, $location_id)
		{
			$this->db->where('id', $location_id);
			return $this->db->update('tbl_locations', $data);
		}
		public function delete_audition_location($id){
			$this->db->where('id', $id);
			return $this->db->delete('tbl_locations');
		}
	}
?>