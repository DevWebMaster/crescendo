<?php
	class Material_model extends CI_Model{

		public function save_material($material_name, $material_image, $status){
			$data = array(
				'name' => $material_name,
				'image' => $material_image,
				'status' => $status,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_material', $data); 
		    $insertId = $this->db->insert_id();
	   		return  $insertId;
		}
		public function delete_material($material_id)
		{
		 	$this->db->where('id', $material_id);
			return $this->db->delete('tbl_material');
		}
		public function get_material_info($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_material');
			$this->db->where('id', $id);
			$query = $this->db->get()->result_array();
			return $query[0];
		}
		public function get_material_list($filter_name, $filter_status, $start, $rowperpage) {
			$this->db->select('a1.*');
			$this->db->from('tbl_material as a1');
			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_status != '' && $filter_status != 2){
				$this->db->where('a1.status', $filter_status);
			}
			$this->db->limit($rowperpage, $start);

			$query = $this->db->get()->result_array();

			
			return $query;
		}
		public function get_material_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_material as a1');
			
			// $this->db->order_by('created_at  DESC');

			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		public function get_material_all_count_with_filter($filter_name, $filter_status, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_material as a1');
			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_status != '' && $filter_status != 2){
				$this->db->where('a1.status', $filter_status);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		
		public function update_material($id, $data)
		{
			return $this->db->update('tbl_material',$data, array('id' => $id ) );
		}
		
	}
?>