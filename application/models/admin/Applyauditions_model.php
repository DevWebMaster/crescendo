<?php
	class Applyauditions_model extends CI_Model{
		public function get_little_morarts($audition_id){
			$this->db->select('*');
			$this->db->from('tbl_little_morarts');
			$this->db->where('is_delete', 0);
			if($audition_id != 0){
				$this->db->where('id', $audition_id);
			}

			return $this->db->get()->result_array();
		}
		public function get_students($user_id, $role_id){
			if($role_id == 4){
				$this->db->select('*');
				$this->db->from('tbl_users');
				$this->db->where('admin_role_id', $role_id);
				$this->db->where('id', $user_id);
				return $this->db->get()->result_array();
			}else if($role_id == 3){
				$this->db->select('a2.*');
				$this->db->from('tbl_relations as a1');
				$this->db->join('tbl_users as a2', 'a2.id = a1.student', 'left');
				$this->db->where('a1.creator', $user_id);

				return $this->db->get()->result_array();
			}
		}
		public function get_instruments(){
			$this->db->select('*');
			$this->db->from('tbl_instruments');
			return $this->db->get()->result_array();
		}
		public function get_teachers($user_id, $role_id){
			if($role_id == 3){
				$this->db->select('*');
				$this->db->from('tbl_users');
				$this->db->where('admin_role_id', $role_id);
				$this->db->where('id', $user_id);

				return $this->db->get()->result_array();
			}else if($role_id == 4){
				$this->db->select('a1.*');
				$this->db->from('tbl_relations as a1');
				$this->db->join('tbl_users as a2', 'a1.teacher = a2.id', 'left');
				$this->db->where('a1.creator', $user_id);

				return $this->db->get()->result_array();
			}
		}
	}
?>