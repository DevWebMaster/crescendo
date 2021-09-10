<?php
	class Applyauditions_model extends CI_Model{
		public function get_little_morarts($audition_id, $user_id, $role_id){
			$this->db->select('a1.*, a2.location as auditionlocation');
			$this->db->from('tbl_little_morarts as a1');
			$this->db->join('tbl_locations as a2', 'a1.audition_location = a2.id', 'left');
			$this->db->where('a1.is_delete', 0);
			if($audition_id != 0){
				$this->db->where('a1.id', $audition_id);
			}
			if($role_id == 2){
				$this->db->where('a1.local_admin', $user_id);
			}

			return $this->db->get()->result_array();
		}
		public function get_crescendo($audition_id, $user_id, $role_id){
			$this->db->select('a1.*, a2.location as auditionlocation');
			$this->db->from('tbl_crescendo as a1');
			$this->db->join('tbl_locations as a2', 'a1.audition_location = a2.id', 'left');
			$this->db->where('a1.is_delete', 0);
			if($audition_id != 0){
				$this->db->where('a1.id', $audition_id);
			}
			if($role_id == 2){
				$this->db->where('a1.local_admin', $user_id);
			}

			return $this->db->get()->result_array();
		}
		public function get_user_info($user_id, $role_id){
			if($role_id == 2){
				$this->db->select('name as username, email, address, mobile_no');
				$this->db->from('tbl_local_admin');
				$this->db->where('id', $user_id);
				return $this->db->get()->result_array()[0];
			}else{
				$this->db->select('a1.*');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.id', $user_id);

				return $this->db->get()->result_array()[0];
			}
		}
		public function get_instruments(){
			$this->db->select('*');
			$this->db->from('tbl_instruments');
			return $this->db->get()->result_array();
		}
		public function get_teachers($user_id, $role_id){
			if($role_id == 2){
				$this->db->select('name as username, email, address, mobile_no');
				$this->db->from('tbl_local_admin');
				$this->db->where('id', $user_id);
				return $this->db->get()->result_array();
			}else{
				$this->db->select('a1.*');
				$this->db->from('tbl_users as a1');
				$this->db->where('a1.id', $user_id);

				return $this->db->get()->result_array();
			}
		}
		public function save_apply($data){
			$this->db->insert('tbl_applications', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}
		public function get_remain_duration($audition_id){
			$this->db->select('remain_duration');
			$this->db->from('tbl_little_morarts');
			$this->db->where('id', $audition_id);

			return $this->db->get()->result_array()[0];
		}
		public function get_remain_duration_crescendo($audition_id){
			$this->db->select('remain_duration');
			$this->db->from('tbl_crescendo');
			$this->db->where('id', $audition_id);

			return $this->db->get()->result_array()[0];
		}
		public function update_audition_duration($audition_id, $remain_duration){
			$this->db->where('id', $audition_id);
			return $this->db->update('tbl_little_morarts', array('remain_duration' => $remain_duration));
		}
		public function update_audition_duration_crescendo($audition_id, $remain_duration){
			$this->db->where('id', $audition_id);
			return $this->db->update('tbl_crescendo', array('remain_duration' => $remain_duration));
		}
		public function get_countries(){
			$this->db->select('*');
			$this->db->from('ci_countries');
			$this->db->order_by('id');

			return $this->db->get()->result_array();
		}
	}
?>