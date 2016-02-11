<?php
class Backend_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	/**
	*	User sign in check
	*
	*	@return 	string 	$user
	*	@return 	string 	$pass
	*
	*/
	function signin_check($user,$pass)
	{
		$clear_user = $this->security->xss_clean($user);
		$clear_pass = $pass;
		
		// get salt
		$this->db->where('username',$clear_user);
		$salt = $this->db->get('aluni_users');
		foreach ($salt->result() as $salt_data) {
			$user_salt = $salt_data->salt;
		}

		// set password
		$user_password = hash("SHA512", $clear_pass.$user_salt);

		// get user data
		$this->db->select('*');
		$this->db->from('aluni_users');
		$this->db->where('aluni_users.username',$clear_user);
		$this->db->where('aluni_users.password', $user_password);
		$this->db->where('aluni_users.active', 'yes');
		$this->db->join('aluni_user_privileges', 'aluni_user_privileges.username = aluni_users.username');
		$user_data = $this->db->get();
		return $user_data;
	}


	/**
	*	Search member data based on search category
	*
	*	@param 		string 	$search_string
	*	@param 		array 	$search_category
	*	@return		array 	$search_result
	*
	*/
	public function data_search($search_string, $search_category="")
	{
		$this->db->like('fullname', $search_string);
		// Count search category
		$sc_count = count($search_category);
		// Loop through category and create query
		for ($i=0; $i < $sc_count; $i++) { 
			if ($search_category[$i]!="") {
				$this->db->or_like($search_category[$i], $search_string);
			}
		}
		$search_result = $this->db->get("aluni_member_data_all");
		// Return
		return $search_result;
	}


	/**
	*	Count total member
	*
	*	@return 	string 	$total_member
	*	
	*/
	public function data_count()
	{
		$total_member = $this->db->count_all_results('aluni_member_data_all');
		return $total_member;
	}


	/**
	*	List Data
	*
	*	@param 		string 	$type
	*	@return 	array 	$list_data
	*	
	*/
	public function data_list($type="all", $order_by="member_id", $order_criteria="ASC", $where_field="", $where_value="")
	{
		if ($type=="all") {	
			if ($where_field!="" && $where_value!="") {
				$this->db->where($where_field, $where_value);
			}
			$this->db->order_by($order_by, $order_criteria);
			$list_data = $this->db->get('aluni_member_data_all');
		}
		elseif ($type=="basic") {
			if ($where_field!="" && $where_value!="") {
				$this->db->where($where_field, $where_value);
			}
			$this->db->order_by($order_by, $order_criteria);
			$list_data = $this->db->get('aluni_member_data_basic');
		}
		return $list_data;
	}


	/**
	*	Detail data member
	*	Get data detail from view : aluni_member_data_all
	*
	*	@param 		string 	$member_id
	*	@return 	array 	$detail_data
	*
	*/
	public function data_detail($member_id)
	{
		$this->db->where('member_id', $member_id);
		$detail_data = $this->db->get('aluni_member_data_all');
		return $detail_data;
	}


	/**
	*	Detail data member
	*	Get data detail from join table
	*
	*	@param 		string 	$member_id
	*	@return 	array 	$detail_data
	*
	*/
	public function data_detail_join_table($member_id)
	{
		$query = "SELECT 
		  `ab`.`member_id`,
		  `ab`.`fullname`,
		  `ab`.`nickname`,
		  `ab`.`gender`,
		  `ab`.`place_of_birth`,
		  `ab`.`date_of_birth`,
		  `ab`.`photo`,
		  `ab`.`active`,
		  `ab`.`province_id`,
		  `ab`.`city_id`,
		  `ab`.`address`,
		  `af`.`partner_name`,
		  `af`.`childrens`,
		  `ap`.`father_name`,
		  `ap`.`mother_name`,
		  `ap`.`guardian_name`,
		  `ap`.`province_id` AS `parent_province`,
		  `ap`.`city_id` AS `parent_city`,
		  `ap`.`parent_address`,
		  `ac`.`home_number`,
		  `ac`.`phone_number_1`,
		  `ac`.`phone_number_2`,
		  `ac`.`blackberry_pin`,
		  `ac`.`email_address`,
		  `ac`.`website_address`,
		  `ac`.`facebook`,
		  `ac`.`twitter`,
		  `aa`.`generation`,
		  `aa`.`year_entry`,
		  `aa`.`year_out`,
		  `aa`.`last_class`,
		  `aa`.`notes` AS `academic_notes` 
		FROM `aluni_member_basic_info` `ab` 
		INNER JOIN `aluni_member_parent_info` `ap` ON (`ab`.`member_id` = `ap`.`member_id`) 
		INNER JOIN `aluni_member_contact_info` `ac` ON (`ab`.`member_id` = `ac`.`member_id`) 
		INNER JOIN `aluni_member_academic_info` `aa` ON (`ab`.`member_id` = `aa`.`member_id`) 
		INNER JOIN `aluni_member_family_info` `af` ON (`ab`.`member_id` = `af`.`member_id`)
		WHERE (`ab`.`member_id` = '$member_id')";

		$detail_data = $this->db->query($query);
		return $detail_data;
	}
	
	
	/**
	*	List Province
	*	
	*	@return 	array 	$province_data
	*
	*/
	public function list_province()
	{
		$this->db->where('active', 'yes');
		$province_data = $this->db->get('aluni_m_province');
		return $province_data;
	}


	/**
	*	List City
	*	
	*	@param 		string 	$province_id
	*	@return 	array 	$city_list
	*
	*/
	public function list_city($province_id='')
	{
		if ($province_id!="") {
			$this->db->where('province_id', $province_id);
		}
		$this->db->where('active', 'yes');
		$city_data = $this->db->get('aluni_m_city');
		return $city_data;
	}
	

	/**
	*	Add data save process
	*	
	*	@param 		array 	$data
	*	@return 	string 	$member_id
	*
	*/
	public function add_data_process($data)
	{
		$username = $this->session->userdata('username');

		// Insert Basic
			$data_basic = array(
				'fullname'       => $data["fullname"], 
				'nickname'       => $data["nickname"],
				'gender'         => $data["gender"],
				'active'         => $data["active"],
				// 'photo'          => $photo,
				'place_of_birth' => $data["place_of_birth"],
				'date_of_birth'  => $data["date_of_birth"],
				'province_id'    => $data["province_id"],
				'city_id'        => $data["city_id"],
				'address'        => $data["address"],
				'created_by'     => $username,
				'created_date'   => date("Y/m/d H:i:s"),
				'updated_by'     => $username,
				'updated_date'   => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_member_basic_info', $data_basic);
			// Get member_id
			$member_id = $this->db->insert_id();

		// Insert Family
			$data_family = array(
				'member_id'      => $member_id,
				'partner_name'   => $data["partner_name"], 
				'childrens'      => $data["childrens"],
				'created_by'     => $username,
				'created_date'   => date("Y/m/d H:i:s"),
				'updated_by'     => $username,
				'updated_date'   => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_member_family_info', $data_family);

		// Insert Parent
			$data_parent = array(
				'member_id'      => $member_id,
				'father_name'    => $data["father_name"], 
				'mother_name'    => $data["mother_name"],
				'guardian_name'  => $data["guardian_name"],
				'province_id'    => $data["parent_province_id"],
				'city_id'        => $data["parent_city_id"],
				'parent_address' => $data["parent_address"],
				'created_by'     => $username,
				'created_date'   => date("Y/m/d H:i:s"),
				'updated_by'     => $username,
				'updated_date'   => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_member_parent_info', $data_parent);

		// Insert Contact
			$data_contact = array(
				'member_id'       => $member_id,
				'home_number'     => $data["home_number"],
				'phone_number_1'  => $data["phone_number"],
				'phone_number_2'  => $data["phone_number_2"],
				'blackberry_pin'  => $data["blackberry_pin"],
				'email_address'   => $data["email_address"],
				'website_address' => $data["website_address"],
				'facebook'        => $data["facebook_profile"],
				'twitter'         => $data["twitter_profile"],
				'created_by'      => $username,
				'created_date'    => date("Y/m/d H:i:s"),
				'updated_by'      => $username,
				'updated_date'    => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_member_contact_info', $data_contact);

		// Insert Academic
			$data_academic = array(
				'member_id'    => $member_id,
				'generation'   => $data["generation"],
				'year_entry'   => $data["year_entry"],
				'year_out'     => $data["year_out"],
				'last_class'   => $data["last_class"],
				'notes'        => $data["academic_notes"],
				'created_by'   => $username,
				'created_date' => date("Y/m/d H:i:s"),
				'updated_by'   => $username,
				'updated_date' => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_member_academic_info', $data_academic);

		// Insert User Account
			$salt = hash("SHA256", rand());
			$data_user = array(
				'username'     => $data["username"], 
				'password'     => hash("SHA512", $data["password"].$salt),
				'salt'         => $salt,
				'level'        => 'user',
				'first_name'   => $data["fullname"],
				'member_id'    => $member_id,
				'created_by'   => $username,
				'created_date' => date("Y/m/d H:i:s"),
				'updated_by'   => $username,
				'updated_date' => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_users', $data_user);

			$data_user_priv = array(
				'username'     => $data["username"],
				'privileges'   => '',
				'created_date' => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_user_privileges', $data_user_priv);

			$data_user_pass = array(
				'member_id'    => $member_id, 
				'username'     => $data["username"], 
				'password'     => $data["password"],
				'created_by'   => $username,
				'created_date' => date("Y/m/d H:i:s"),
				'updated_by'   => $username,
				'updated_date' => date("Y/m/d H:i:s")
			);
			$this->db->insert('aluni_user_password_status', $data_user_pass);

		return $member_id;
	}


	/**
	*	Edit data photo process
	*
	*	@param 		string 	$member_id
	*	@param 		string 	$photo_data
	*	@return 	string
	*
	*/
	public function add_photo_process($member_id, $photo_data)
	{
		$this->db->where('member_id', $member_id);
		$this->db->update('aluni_member_basic_info', $photo_data);
		return "ok";
	}


	/**
	*	Edit data save process
	*	
	*	@param 		array 	$data
	*	@param 		string 	$member_id
	*	@return 	string 	$member_id
	*
	*/
	public function edit_data_process($data, $member_id)
	{
		$username = $this->session->userdata('username');

		// update Basic
			$data_basic = array(
				'fullname'       => $data["fullname"], 
				'nickname'       => $data["nickname"],
				'gender'         => $data["gender"],
				'active'         => $data["active"],
				// 'photo'          => $photo,
				'place_of_birth' => $data["place_of_birth"],
				'date_of_birth'  => $data["date_of_birth"],
				'province_id'    => $data["province_id"],
				'city_id'        => $data["city_id"],
				'address'        => $data["address"],
				'updated_by'     => $username,
				'updated_date'   => date("Y/m/d H:i:s")
			);
			$this->db->where('member_id', $member_id);
			$this->db->update('aluni_member_basic_info', $data_basic);

		// update Family
			$data_family = array(
				'partner_name'   => $data["partner_name"], 
				'childrens'      => $data["childrens"],
				'updated_by'     => $username,
				'updated_date'   => date("Y/m/d H:i:s")
			);
			$this->db->where('member_id', $member_id);
			$this->db->update('aluni_member_family_info', $data_family);

		// update Parent
			$data_parent = array(
				'father_name'    => $data["father_name"], 
				'mother_name'    => $data["mother_name"],
				'guardian_name'  => $data["guardian_name"],
				'province_id'    => $data["parent_province_id"],
				'city_id'        => $data["parent_city_id"],
				'parent_address' => $data["parent_address"],
				'updated_by'     => $username,
				'updated_date'   => date("Y/m/d H:i:s")
			);
			$this->db->where('member_id', $member_id);
			$this->db->update('aluni_member_parent_info', $data_parent);

		// update Contact
			$data_contact = array(
				'home_number'     => $data["home_number"],
				'phone_number_1'  => $data["phone_number"],
				'phone_number_2'  => $data["phone_number_2"],
				'blackberry_pin'  => $data["blackberry_pin"],
				'email_address'   => $data["email_address"],
				'website_address' => $data["website_address"],
				'facebook'        => $data["facebook_profile"],
				'twitter'         => $data["twitter_profile"],
				'updated_by'      => $username,
				'updated_date'    => date("Y/m/d H:i:s")
			);
			$this->db->where('member_id', $member_id);
			$this->db->update('aluni_member_contact_info', $data_contact);

		// update Academic
			$data_academic = array(
				'generation'   => $data["generation"],
				'year_entry'   => $data["year_entry"],
				'year_out'     => $data["year_out"],
				'last_class'   => $data["last_class"],
				'notes'        => $data["academic_notes"],
				'updated_by'   => $username,
				'updated_date' => date("Y/m/d H:i:s")
			);
			$this->db->where('member_id', $member_id);
			$this->db->update('aluni_member_academic_info', $data_academic);

		// Update users
			$data_user = array( 'active' => $data["active"] );
			$this->db->where('member_id', $member_id);
			$this->db->update('aluni_users', $data_user);

		return $member_id;
	}


	/**
	*	Update setting data
	*
	*	@param 		array 	$setting_data
	*
	*/
	public function setting_process_update($setting_data)
	{
		$this->db->set('setting_value', $setting_data["setting_value"]);
		$this->db->where('setting_name', $setting_data["setting_name"]);
		$this->db->update('aluni_settings');
	}


	/**
	*	Show user list
	*
	*	@return 	array 	$user_data
	*	
	*/
	public function user_list()
	{
		$this->db->select("*");
		$this->db->from("aluni_users");
		$this->db->where("aluni_users.level !=", "super_user");
		$this->db->join('aluni_user_password_status', 'aluni_user_password_status.username = aluni_users.username', 'left');
		$this->db->join('aluni_user_privileges', 'aluni_user_privileges.username = aluni_users.username');
		$user_data = $this->db->get();
		return $user_data;
	}


	/**
	*	Show user detail
	*
	*	@param 		string 	$username
	*	@return 	array 	$user_data
	*	
	*/
	public function user_detail($username)
	{
		$this->db->select("*");
		$this->db->from("aluni_users");
		$this->db->join("aluni_user_privileges", "aluni_user_privileges.username = aluni_users.username");
		$this->db->where("aluni_users.username", $username);
		$user_data = $this->db->get();
		return $user_data;
	}


	/**
	*	Show system module list
	*	
	*	@return 	array 	$module_data
	*	
	*/
	public function module_list()
	{
		$this->db->select("*");
		$this->db->from("aluni_m_modules");
		$this->db->where("module_type", "common");
		$this->db->where("active", "yes");
		$module_data = $this->db->get();
		return $module_data;
	}


	/**
	*	Update user data (set by user)
	*
	*	@param 		array 	$user_data
	*	
	*/
	public function user_setting_process($user_data)
	{
		// Set variable
		$curr_username = $user_data["curr_username"];
		$curr_password = $user_data["curr_password"];
		$new_password  = $user_data["new_password"];

		// Check current password match
		// Get Salt
		$this->db->where('username',$curr_username);
		$salt = $this->db->get('aluni_users');
		foreach ($salt->result() as $salt_data) {
			$user_salt = $salt_data->salt;
		}

		// set password
		$user_password = hash("SHA512", $curr_password.$user_salt);

		// get user data
		$this->db->select('*');
		$this->db->from('aluni_users');
		$this->db->where('aluni_users.username',$curr_username);
		$this->db->where('aluni_users.password', $user_password);
		$this->db->where('aluni_users.active', 'yes');
		$this->db->join('aluni_user_privileges', 'aluni_user_privileges.username = aluni_users.username');
		$ud = $this->db->get();

		// Check
		$dt_username   = "";
		foreach ($ud->result() as $udr) {
			$dt_username   = $udr->username;
		}

		// Match = process update
		if ($dt_username!="") {
			// process update user
			$data_pwd["password"]     = hash("SHA512", $new_password.$user_salt);
			$data_pwd["updated_date"] = date("Y/m/d H:i:s");
			$this->db->where('username', $curr_username);
			$this->db->update('aluni_users', $data_pwd);

			// process update user_password status
			$data_pwd_status["password"]     = hash("SHA512", $new_password.$user_salt);
			$data_pwd_status["status"]       = "changed";
			$data_pwd_status["updated_by"]   = $this->session->userdata('username');
			$data_pwd_status["updated_date"] = date("Y/m/d H:i:s");
			$this->db->where('username', $curr_username);
			$this->db->update('aluni_user_password_status', $data_pwd_status);

			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	/**
	*	Check username
	*
	*	@param 		string 	$username
	*	@return 	boolean
	*/
	public function username_check($username)
	{
		$clear_user = $this->security->xss_clean($username);
		
		$this->db->where('username',$clear_user);
		$this->db->from('aluni_users');
		$user_data = $this->db->count_all_results();
		if ($user_data>0) {
			return FALSE;
		}
		else {
			return TRUE;
		}
	}



	/**
	*	Check user password
	*	
	*	@param 		string 	$username
	*	@param 		string 	$password
	*	@return 	boolean
	*
	*/
	public function user_password_check($username, $password)
	{
		$clear_user = $this->security->xss_clean($username);
		$clear_pass = $password;
		
		// get salt
		$this->db->where('username',$clear_user);
		$salt = $this->db->get('aluni_users');
		foreach ($salt->result() as $salt_data) {
			$user_salt = $salt_data->salt;
		}

		// set password
		$user_password = hash("SHA512", $clear_pass.$user_salt);

		// get user data
		$this->db->from('aluni_users');
		$this->db->where('aluni_users.username',$clear_user);
		$this->db->where('aluni_users.password', $user_password);
		$this->db->where('aluni_users.active', 'yes');
		$this->db->join('aluni_user_privileges', 'aluni_user_privileges.username = aluni_users.username');
		$user_data = $this->db->count_all_results();
		if ($user_data>0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	/**
	*	Add user data (set by super_user)
	*
	*	@param 		array 	$user_data
	*
	*/
	public function user_add_process($user_data)
	{
		// standard var
		$data["username"]     = $user_data["username"];
		$data["first_name"]   = $user_data["first_name"];
		$data["last_name"]    = $user_data["last_name"];
		$data["level"]        = $user_data["level"];
		$data["active"]       = $user_data["active"];
		$data["created_date"] = date("Y/m/d H:i:s");
		$data["created_by"]   = $this->session->userdata('username');
		$data["updated_date"] = date("Y/m/d H:i:s");
		$data["updated_by"]   = $this->session->userdata('username');
		// password var
		$new_password  = $user_data["new_password"];
		$conf_password = $user_data["conf_password"];
		if ($new_password==$conf_password) {
			// salt and hash
			$data["salt"]     = hash("SHA256", rand());
			$data["password"] = hash("SHA512", $new_password.$data["salt"]);
		}
		// privileges var
		$data_priv["username"]     = $user_data["username"];
		$data_priv["privileges"]   = $user_data["privileges"];
		$data_priv["created_date"] = date("Y/m/d H:i:s");

		// process insert users
		$this->db->insert('aluni_users', $data);

		// process insert privileges
		$this->db->insert('aluni_user_privileges', $data_priv);

		return TRUE;
	}


	/**
	*	Update user data (set by super_user)
	*
	*	@param 		array 	$user_data
	*
	*/
	public function user_edit_process($user_data)
	{
		// standard var
		$username             = $user_data["username"];
		$data["first_name"]   = $user_data["first_name"];
		$data["last_name"]    = $user_data["last_name"];
		$data["level"]        = $user_data["level"];
		$data["active"]       = $user_data["active"];
		$data["updated_date"] = date("Y/m/d H:i:s");
		$data["updated_by"]   = $this->session->userdata('username');
		// password var
		// $curr_password = $user_data["curr_password"];
		$new_password  = $user_data["new_password"];
		$conf_password = $user_data["conf_password"];
		if ($new_password==$conf_password) {
			// salt and hash
			$this->db->where('username',$username);
			$salt = $this->db->get('aluni_users');
			foreach ($salt->result() as $salt_data) {
				$user_salt = $salt_data->salt;
			}
			$data["password"] = hash("SHA512", $new_password.$user_salt);
		}
		// process update users
		$this->db->where('username', $username);
		$this->db->update('aluni_users', $data);

		// process update privileges
		$data_priv["privileges"] = $user_data["privileges"];
		$this->db->where('username', $username);
		$this->db->update('aluni_user_privileges', $data_priv);

		// process update user_password_status
		$data_ps["password"]     = hash("SHA512", $new_password.$user_salt);
		$data_ps["status"]       = "changed";
		$data_ps["updated_by"]   = $this->session->userdata('username');
		$data_ps["updated_date"] = date("Y/m/d H:i:s");
		$this->db->where('username', $username);
		$this->db->update('aluni_user_password_status', $data_ps);

		return TRUE;
	}



	/**
	*	Delete user data (only available to super_user)
	*
	*	@param 		string 	$username
	*
	*/
	public function user_delete($username)
	{
		$this->db->where('username', $username);
		$this->db->delete('aluni_users');

		$this->db->where('username', $username);
		$this->db->delete('aluni_user_privileges');

		return TRUE;
	}

}

//End of Backend_model