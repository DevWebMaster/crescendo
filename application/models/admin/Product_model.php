<?php
	class Product_model extends CI_Model{
		public function get_parent_category()
		{
			return $this->db->get('tbl_category')->result_array();
		}
		public function get_sustainability()
		{
			return $this->db->get('tbl_sustainability')->result_array();
		}
		public function get_benefits()
		{
			return $this->db->get('tbl_benefits')->result_array();
		}
		public function get_material()
		{
			return $this->db->get('tbl_material')->result_array();
		}

		public function save_product($product_name, $product_image, $parent_category, $sub_category, $sub_sub_category, $sustainability_arr, $benefits_arr, $material, $description, $product_idea_for, $status, $item_code, $product_short_description, $product_pieces, $length, $width, $height, $unit, $size_oz, $is_lid){
			$data = array(
				'name' => $product_name,
				'image' => $product_image,
				'category_id' => $parent_category,
				'sub_category_id' => $sub_category,
				'sub_sub_category_id' => $sub_sub_category,
				'sustainability_ids' => json_encode($sustainability_arr),
				'benefit_ids' => json_encode($benefits_arr),
				'material_id' => $material,
				'description' => $description,
				'idea_for' => $product_idea_for,
				'item_code' => $item_code,
				'short_desc' => $product_short_description,
				'pieces' => $product_pieces,
				'length' => $length,
				'width' => $width,
				'height' => $height,
				's_unit' => $unit,
				'size_oz' => $size_oz,
				'is_lid' => $is_lid,
				'status' => $status, 
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_product', $data); 
		    $insertId = $this->db->insert_id();
	   		return  $insertId;
		}
		public function get_sub_category($category_id){
			$this->db->where('category_id', $category_id);
			return $this->db->get('tbl_sub_category')->result_array();
		}
		public function get_sub_sub_category($category_id, $sub_category_id){
			$this->db->where('category_id', $category_id);
			$this->db->where('sub_category_id', $sub_category_id);
			return $this->db->get('tbl_sub_sub_category')->result_array();
		}
		public function delete_product($product_id)
		{
		 	$this->db->where('id', $product_id);
			return $this->db->delete('tbl_product');
		}
		public function get_product_info($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_product');
			$this->db->where('id', $id);
			$query = $this->db->get()->result_array();
			return $query[0];
		}
		public function get_product_list($filter_name, $filter_category, $filter_sub_category, $filter_sub_sub_category, $start, $rowperpage) {
			$this->db->select('a1.*, a2.name as parent_category, a3.name as sub_category, a4.name as sub_sub_category');
			$this->db->from('tbl_product as a1');
			$this->db->join('tbl_category as a2', 'a1.category_id = a2.id', 'left');
			$this->db->join('tbl_sub_category as a3', 'a1.sub_category_id = a3.id', 'left');
			$this->db->join('tbl_sub_sub_category as a4', 'a1.sub_sub_category_id = a4.id', 'left');
			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_category != ''){
				$this->db->where('a1.category_id', $filter_category);
			}if($filter_sub_category != ''){
				$this->db->where('a1.sub_category_id', $filter_sub_category);
			}if($filter_sub_sub_category != ''){
				$this->db->where('a1.sub_sub_category_id', $filter_sub_sub_category);
			}
			$this->db->limit($rowperpage, $start);

			$query = $this->db->get()->result_array();

			
			return $query;
		}
		public function get_product_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_product as a1');
			
			// $this->db->order_by('created_at  DESC');

			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		public function get_product_all_count_with_filter($filter_name, $filter_category, $filter_sub_category, $filter_sub_sub_category, $start, $rowperpage) {
			$this->db->select('a1.*, a2.name as parent_category, a3.name as sub_category, a4.name as sub_sub_category');
			$this->db->from('tbl_product as a1');
			$this->db->join('tbl_category as a2', 'a1.category_id = a2.id', 'left');
			$this->db->join('tbl_sub_category as a3', 'a1.sub_category_id = a3.id', 'left');
			$this->db->join('tbl_sub_sub_category as a4', 'a1.sub_sub_category_id = a4.id', 'left');

			if($filter_name != ''){
				$this->db->like('a1.name', $filter_name);
			}if($filter_category != ''){
				$this->db->where('a1.category_id', $filter_category);
			}if($filter_sub_category != ''){
				$this->db->where('a1.sub_category_id', $filter_sub_category);
			}if($filter_sub_sub_category != ''){
				$this->db->where('a1.sub_sub_category_id', $filter_sub_sub_category);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();

		    return $query->num_rows();
		

		}
		
		public function update_product($id, $data)
		{
			return $this->db->update('tbl_product',$data, array('id' => $id ) );
		}
		public function get_sub_category_ids($category_id)
		{
			$this->db->where('category_id', $category_id);
			return $this->db->get('tbl_sub_category')->result_array();
		}
		public function get_sub_sub_category_ids($category_id, $sub_category_id)
		{
			$this->db->where('category_id', $category_id);
			$this->db->where('sub_category_id', $sub_category_id);
			return $this->db->get('tbl_sub_sub_category')->result_array();
		}
		
	}
?>