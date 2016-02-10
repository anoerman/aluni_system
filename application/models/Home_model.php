<?php
class Home_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	
	/**
	*	Get Setting Data
	*	Return setting value string if setting_name set.
	*	Return setting data array if setting_name is not set.
	*
	*	@param 		string 	$setting_name
	*	@return 	string 	$setting_value
	*	@return 	array 	$setting_data
	*
	*/
	public function setting_data($setting_name = "")
	{
		if ($setting_name!="") {
			$this->db->where("setting_name", $setting_name);
			$setting_data = $this->db->get("aluni_settings");

			foreach ($setting_data->result() as $data) {
				$setting_value = $data->setting_value;
			}
			return $setting_value;
		}
		else {
			$setting_data = $this->db->get("aluni_settings");
			return $setting_data;
		}
	}
	

	/**
	*	Get Sign In Status
	*	Used to decide that user is signed in or not.
	*
	*	@return 	string 	$status
	*
	*/
	public function is_signedin()
	{
		$username   = $this->session->userdata('username');
		$first_name = $this->session->userdata('first_name');
		$last_name  = $this->session->userdata('last_name');

		if ($username!="" && $first_name!="") {
			$status = 1;
		}
		else {
			$status = 0;
		}
		return $status;
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
	
}

//End of Home_model