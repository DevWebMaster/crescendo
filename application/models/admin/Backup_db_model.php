<?php
	class Backup_db_model extends CI_Model{
		public function get_backup_db_list($search_key, $start, $rowperpage) {
			$this->db->select('a1.*');
			$this->db->from('tbl_backup_db as a1');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_backup_db_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_backup_db as a1');
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_backup_db_all_count_with_filter($search_key, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_backup_db as a1');
			if($search_key != ''){
				$this->db->like('a1.audition_name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function delete_db($id){
			$this->db->where('id', $id);
			return $this->db->delete('tbl_backup_db');
		}
		public function save_data($data){
			$this->db->insert('tbl_backup_db', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}
	}
?>