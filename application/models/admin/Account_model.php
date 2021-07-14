<?php
	class Account_model extends CI_Model{

		// public function save_material($material_name, $material_image, $status){
		// 	$data = array(
		// 		'name' => $material_name,
		// 		'image' => $material_image,
		// 		'status' => $status,
		// 		'created_at' => date('Y-m-d H:i:s'),
		// 		'updated_at' => date('Y-m-d H:i:s')
		// 	);
		// 	$this->db->insert('tbl_material', $data); 
		//     $insertId = $this->db->insert_id();
	 //   		return  $insertId;
		// }
		// public function delete_material($material_id)
		// {
		//  	$this->db->where('id', $material_id);
		// 	return $this->db->delete('tbl_material');
		// }
		// public function get_material_info($id)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('tbl_material');
		// 	$this->db->where('id', $id);
		// 	$query = $this->db->get()->result_array();
		// 	return $query[0];
		// }
		public function get_student_list($search_key, $start, $rowperpage, $student, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*, r1.teacher as teachername, r1.creator as supervisor, r3.name as countryname');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.student = r2.id', 'left');
				$this->db->join('ci_countries as r3', 'r2.country = r3.id', 'left');
				$this->db->where('r1.creator', $uesr_id);
				if($search_key != ''){
					$this->db->like('r2.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$result = $this->db->get()->result_array();
				return $result;
			}else{
				$this->db->select('a1.*, a2.creator as supervisor, a2.teacher as teachername, a3.name as countryname');
				$this->db->from('tbl_users as a1');
				$this->db->join('tbl_relations as a2', 'a1.id = a2.student', 'left');
				$this->db->join('ci_countries as a3', 'a1.country = a3.id', 'left');
				$this->db->where('a1.admin_role_id', $student);
				if($search_key != ''){
					$this->db->like('a1.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$query = $this->db->get()->result_array();
				return $query;
			}			
		}
		public function get_student_all_count($student, $user_id, $role) {
			if($role != 1){

			}else{
				$this->db->select('a1.id');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.admin_role_id', $student);
				$query = $this->db->get();
				return $query->num_rows();
			}
		}
		public function get_student_all_count_with_filter($search_key, $start, $rowperpage, $student, $user_id, $role) {
			if($role != 1){

			}else{
				$this->db->select('*');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.admin_role_id', $student);
				if($search_key != ''){
					$this->db->like('a1.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$query = $this->db->get();
				return $query->num_rows();
			}
		}
		
		// public function update_material($id, $data)
		// {
		// 	return $this->db->update('tbl_material',$data, array('id' => $id ) );
		// }

		public function get_teacher_list_of_student(){
			$this->db->select('*');
			$this->db->from('tbl_users as a1');
			$this->db->where('a1.admin_role_id', 3);

			return $this->db->get()->result_array();
		}

		public function get_teacher_list($search_key, $start, $rowperpage, $teacher, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*, r3.name as countryname');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.teacher = r2.id', 'left');
				$this->db->join('ci_countries as r3', 'r3.id = r2.country', 'left');
				$this->db->where('r1.creator', $uesr_id);
				if($search_key != ''){
					$this->db->like('r2.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$result = $this->db->get()->result_array();
				return $result;
			}else{
				$this->db->select('a1.*, a2.creator as supervisor, a3.name as countryname');
				$this->db->from('tbl_users as a1');
				$this->db->join('tbl_relations as a2', 'a1.id = a2.teacher', 'left');
				$this->db->join('ci_countries as a3', 'a3.id = a1.country', 'left');
				$this->db->where('a1.admin_role_id', $teacher);
				if($search_key != ''){
					$this->db->like('a1.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$query = $this->db->get()->result_array();
				return $query;
			}			
		}
		public function get_teacher_all_count($teacher, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.teacher = r2.id', 'left');
				$this->db->where('r1.creator', $uesr_id);
				
				return $this->db->get()->num_rows();
			}else{
				$this->db->select('a1.id');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.admin_role_id', $teacher);
				$query = $this->db->get();
				return $query->num_rows();
			}
		}
		public function get_teacher_all_count_with_filter($search_key, $start, $rowperpage, $teacher, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.teacher = r2.id', 'left');
				$this->db->where('r1.creator', $uesr_id);
				if($search_key != ''){
					$this->db->like('r2.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				return $this->db->get()->num_rows();
			}else{
				$this->db->select('*');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.admin_role_id', $parent);
				if($search_key != ''){
					$this->db->like('a1.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$query = $this->db->get();
				return $query->num_rows();
			}
		}
		public function get_student_list_of_teacher(){
			$this->db->select('*');
			$this->db->from('tbl_users as a1');
			$this->db->where('a1.admin_role_id', 4);

			return $this->db->get()->result_array();
		}

		public function get_parent_list($search_key, $start, $rowperpage, $parent, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*, r3.name as countryname');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.parent = r2.id', 'left');
				$this->db->join('ci_countries as r3', 'r3.id = r2.country', 'left');
				$this->db->where('r1.creator', $uesr_id);
				if($search_key != ''){
					$this->db->like('r2.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$result = $this->db->get()->result_array();
				return $result;
			}else{
				$this->db->select('a1.*, a2.creator as supervisor, a3.name as countryname');
				$this->db->from('tbl_users as a1');
				$this->db->join('tbl_relations as a2', 'a1.id = a2.parent', 'left');
				$this->db->join('ci_countries as a3', 'a3.id = a1.country', 'left');
				$this->db->where('a1.admin_role_id', $parent);
				if($search_key != ''){
					$this->db->like('a1.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$query = $this->db->get()->result_array();
				return $query;
			}			
		}
		public function get_parent_all_count($parent, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.parent = r2.id', 'left');
				$this->db->where('r1.creator', $uesr_id);
				
				return $this->db->get()->num_rows();
			}else{
				$this->db->select('a1.id');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.admin_role_id', $parent);
				$query = $this->db->get();
				return $query->num_rows();
			}
		}
		public function get_parent_all_count_with_filter($search_key, $start, $rowperpage, $parent, $user_id, $role) {
			if($role != 1){
				$this->db->select('r2.*');
				$this->db->from('tbl_relations as r1');
				$this->db->join('tbl_users as r2', 'r1.parent = r2.id', 'left');
				$this->db->where('r1.creator', $uesr_id);
				if($search_key != ''){
					$this->db->like('r2.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				return $this->db->get()->num_rows();
			}else{
				$this->db->select('*');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.admin_role_id', $parent);
				if($search_key != ''){
					$this->db->like('a1.username', $search_key);
				}
				$this->db->limit($rowperpage, $start);
				$query = $this->db->get();
				return $query->num_rows();
			}
		}
		public function get_localadmin_list($search_key, $start, $rowperpage) {
			$this->db->select('a1.*');
			$this->db->from('tbl_local_admin as a1');
			if($search_key != ''){
				$this->db->like('a1.name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_localadmin_all_count() {
			$this->db->select('a1.id');
			$this->db->from('tbl_local_admin as a1');
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_localadmin_all_count_with_filter($search_key, $start, $rowperpage) {
			$this->db->select('*');
			$this->db->from('tbl_local_admin as a1');
			if($search_key != ''){
				$this->db->like('a1.name', $search_key);
			}
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function save_localadmin($data){
			return $this->db->insert('tbl_local_admin', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}

	}
?>