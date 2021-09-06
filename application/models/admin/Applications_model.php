<?php
	class Applications_model extends CI_Model{
		public function get_apply_little_morarts_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.name as instrument_name');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_locations as a3', 'a3.id = a4.audition_location', 'left');
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->where('a1.audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_little_morarts_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_little_morarts_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_locations as a3', 'a3.id = a4.audition_location', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_audition_info($audition_type, $audition_id){
			$this->db->select('a1.audition_name, a2.location as auditionlocation');
			if($audition_type == 1){
				$this->db->from('tbl_little_morarts as a1');
				$this->db->join('tbl_locations as a2', 'a1.audition_location = a2.id', 'left');
			}else if($audition_type == 2){
				$this->db->from('tbl_crescendo as a1');
				$this->db->join('tbl_locations as a2', 'a1.audition_location = a2.id', 'left');
			}else if($audition_type == 3){
				$this->db->from('tbl_recital_little_morarts as a1');
				$this->db->join('tbl_recital_locations as a2', 'a1.audition_location = a2.id', 'left');
			}else if($audition_type == 4){
				$this->db->from('tbl_recital_crescendo as a1');
				$this->db->join('tbl_recital_locations as a2', 'a1.audition_location = a2.id', 'left');
			}
			
			$this->db->where('a1.id', $audition_id);
			$this->db->where('a1.is_delete', 0);
			return $this->db->get()->result_array()[0];
		}
		public function get_apply_recital_little_morarts_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.name as instrument_name');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_recital_locations as a3', 'a3.id = a4.audition_location', 'left');
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->where('a1.audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_recital_little_morarts_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_recital_little_morarts_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_little_morarts as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_recital_locations as a3', 'a3.id = a4.audition_location', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_detail_info($apply_id, $audition_type){
			$this->db->select('a1.*, concat(a3.audition_name, " ", a4.location) as position');
			$this->db->from('tbl_applications as a1');
			if($audition_type == 1){
				$this->db->join('tbl_little_morarts as a3', 'a3.id = a1.audition_id', 'left');
				$this->db->join('tbl_locations as a4', 'a4.id = a3.audition_location', 'left');
			}else if($audition_type == 2){
				$this->db->join('tbl_crescendo as a3', 'a3.id = a1.audition_id', 'left');
				$this->db->join('tbl_locations as a4', 'a4.id = a3.audition_location', 'left');
			}else if($audition_type == 3){
				$this->db->join('tbl_recital_little_morarts as a3', 'a3.id = a1.audition_id', 'left');
				$this->db->join('tbl_recital_locations as a4', 'a4.id = a3.audition_location', 'left');
			}else if($audition_type == 4){
				$this->db->join('tbl_recital_crescendo as a3', 'a3.id = a1.audition_id', 'left');
				$this->db->join('tbl_recital_locations as a4', 'a4.id = a3.audition_location', 'left');
			}
			
			
			$this->db->where('a1.id', $apply_id);
			$this->db->where('a1.audition_type', $audition_type);
			$this->db->where('a1.is_delete', 0);

			return $this->db->get()->result_array()[0];
		}
		public function update_apply($data, $apply_id){
			$this->db->where('id', $apply_id);
			return $this->db->update('tbl_applications', $data);
		}
		public function delete_little_morarts($id){
			$this->db->where('id', $id);
			return $this->db->update('tbl_applications', array('is_delete' => 1));
		}
		public function delete_recital_little_morarts($id){
			$this->db->where('id', $id);
			return $this->db->update('tbl_applications', array('is_delete' => 1));
		}
		///////////////////////
		public function get_apply_crescendo_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.name as instrument_name');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_locations as a3', 'a3.id = a4.audition_location', 'left');
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_crescendo_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_crescendo_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_locations as a3', 'a3.id = a4.audition_location', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		////////////////////
		public function get_apply_recital_crescendo_list($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*, a2.name as instrument_name');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_recital_locations as a3', 'a3.id = a4.audition_location', 'left');
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->where('audition_type', $audition_type);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get()->result_array();
			return $query;
		}
		public function get_apply_recital_crescendo_all_count($audition_type, $role, $user_id) {
			$this->db->select('a1.id');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			$this->db->where('a1.is_delete', 0);
			$query = $this->db->get();
			return $query->num_rows();
			
		}
		public function get_apply_recital_crescendo_all_count_with_filter($search_key, $greater, $less, $start, $rowperpage, $audition_type, $role, $user_id) {
			$this->db->select('a1.*');
			$this->db->from('tbl_applications as a1');
			$this->db->join('tbl_recital_crescendo as a4', 'a1.audition_id = a4.id', 'left');
			$this->db->join('tbl_instruments as a2', 'a2.id = a1.instrument', 'left');
			$this->db->join('tbl_recital_locations as a3', 'a3.id = a4.audition_location', 'left');
			$this->db->where('a1.audition_type', $audition_type);
			if($role == 2){
				$this->db->where('a4.local_admin', $user_id);
			}
			if($greater != ''){
				$this->db->where('a1.score > ', $greater);
			}
			if($less != ''){
				$this->db->where('a1.score < ', $less);
			}
			if($search_key != ''){
				$this->db->like('a1.student_name', $search_key);
				$this->db->or_like('a2.name', $search_key);
				$this->db->or_like('a3.location', $search_key);
				$this->db->or_like('a1.teacher', $search_key);
				$this->db->or_like('a4.audition_name', $search_key);
			}
			$this->db->where('a1.is_delete', 0);
			$this->db->limit($rowperpage, $start);
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function delete_crescendo($id){
			$this->db->where('id', $id);
			return $this->db->update('tbl_applications', array('is_delete' => 1));
		}
		public function delete_recital_crescendo($id){
			$this->db->where('id', $id);
			return $this->db->update('tbl_applications', array('is_delete' => 1));
		}
		public function fetch_data($type) {
			$this->db->select('a6.audition_name, a1.student_name, a1.student_email, a2.name as countryname, a1.address, a1.mobile_no, a1.birthday, a1.studying_year, a1.level, a1.instrument, a3.name as instrumentname, a1.other_instrument, a1.performance_type, a1.performance_price, a1.co_performers, a1.co_instrument, a4.name as co_instrumentname, a1.co_other_instrument, a1.composer, a1.title, a1.duration, a1.teacher, a1.teacher_email, a5.name as teacher_country, a1.teacher_address, a1.teacher_mobile, a1.payment_type, a1.is_paid, a1.late_fee, a1.special_request, a1.request_time, a1.request_reason, a1.score, a1.place, a1.video_link, a1.total_price');
			$this->db->from('tbl_applications as a1');
			$this->db->join('ci_countries as a2', 'a1.country_id = a2.id', 'left');
			$this->db->join('tbl_instruments as a3', 'a1.instrument = a3.id', 'left');
			$this->db->join('tbl_instruments as a4', 'a1.co_instrument = a4.id', 'left');
			$this->db->join('ci_countries as a5', 'a1.teacher_country_id = a5.id', 'left');
			if($type == 1){
				$this->db->join('tbl_little_morarts as a6', 'a6.id = a1.audition_id', 'left');
			}else if($type == 2){
				$this->db->join('tbl_crescendo as a6', 'a6.id = a1.audition_id', 'left');
			}else if($type == 3){
				$this->db->join('tbl_recital_little_morarts as a6', 'a6.id = a1.audition_id', 'left');
			}else if($type == 4){
				$this->db->join('tbl_recital_little_morarts as a6', 'a6.id = a1.audition_id', 'left');
			}
			$this->db->where('a1.audition_type', $type);

			return $this->db->get()->result_array();
		}
		public function get_audition_id($type, $audition_name)
		{
			$this->db->select('id');
			if($type == 1){
				$this->db->from('tbl_little_morarts');
			}else if($type == 2){
				$this->db->from('tbl_crescendo');
			}else if($type == 3){
				$this->db->from('tbl_recital_little_morarts');
			}else if($type == 4){
				$this->db->from('tbl_recital_crescendo');
			}
			$this->db->where('audition_name', $audition_name);

			return $this->db->get()->result_array()[0];
			
		}
		public function get_country_id($country_name){
			$this->db->select('id');
			$this->db->from('ci_countries');
			$this->db->where('name', $country_name);

			return $this->db->get()->result_array()[0];
		}
		public function get_instrument_id($instrument){
			$this->db->select('id');
			$this->db->from('tbl_instruments');
			$this->db->where('name', $instrument);

			return $this->db->get()->result_array()[0];
		}
		public function save_csv_data($data){
			$this->db->insert('tbl_applications', $data);
			$insertId = $this->db->insert_id();

			return $insertId;
		}
	}
?>