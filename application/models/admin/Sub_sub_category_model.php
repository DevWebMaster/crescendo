<?php
	class Sub_sub_category_model extends CI_Model{
		public function get_parent_category()
		{
			return $this->db->get('tbl_category')->result_array();
		}

		public function save_sub_sub_category($sub_sub_category_name, $sub_sub_category_image, $parent_category, $sub_category){
			$data = array(
				'name' => $sub_sub_category_name,
				'category_id' => $parent_category,
				'sub_category_id' => $sub_category,
				'image' => $sub_sub_category_image,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_sub_sub_category', $data); 
		    $insertId = $this->db->insert_id();
	   		return  $insertId;
		}
		public function get_sub_category($category_id){
			$this->db->where('category_id', $category_id);
			return $this->db->get('tbl_sub_category')->result_array();
		}
		public function delete_sub_sub_category($sub_sub_category_id)
		{
		 	$this->db->where('id', $sub_sub_category_id);
			return $this->db->delete('tbl_sub_sub_category');
		}
		public function get_sub_sub_category_info($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_sub_sub_category');
			$this->db->where('id', $id);
			$query = $this->db->get()->result_array();
			return $query[0];
		}
		public function get_sub_sub_category_list($filter_name, $filter_category, $filter_sub_category, $start, $rowperpage) {
			$this->db->select('a1.*, a2.name as parent_category, a3.name as sub_category');
			$this->db->from('tbl_sub_sub_category as a1');
			$this->db->join('tbl_category as a2', 'a1.category_id = a2.id', 'left');
			$this->db->join('tbl_sub_category as a3', 'a1.sub_category_id = a3.id', 'left');
			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_category != ''){
				$this->db->where('a1.category_id', $filter_category);
			}if($filter_sub_category != ''){
				$this->db->where('a1.sub_category_id', $filter_sub_category);
			}
			$this->db->limit($rowperpage, $start);

			$query = $this->db->get()->result_array();

			
			return $query;
		}
		public function get_sub_sub_category_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_sub_sub_category as a1');
			
			// $this->db->order_by('created_at  DESC');

			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		public function get_sub_sub_category_all_count_with_filter($filter_name, $filter_category, $filter_sub_category, $start, $rowperpage) {
			$this->db->select('a1.*, a2.name as parent_category, a3.name as sub_category');
			$this->db->from('tbl_sub_sub_category as a1');
			$this->db->join('tbl_category as a2', 'a1.category_id = a2.id', 'left');
			$this->db->join('tbl_sub_category as a3', 'a1.sub_category_id = a3.id', 'left');

			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_category != ''){
				$this->db->where('a1.category_id', $filter_category);
			}if($filter_sub_category != ''){
				$this->db->where('a1.sub_category_id', $filter_sub_category);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		
		public function update_sub_sub_category($id, $data)
		{
			return $this->db->update('tbl_sub_sub_category',$data, array('id' => $id ) );
		}
		public function get_sub_category_ids($category_id)
		{
			$this->db->where('category_id', $category_id);
			return $this->db->get('tbl_sub_category')->result_array();
		}
		
	}
?>