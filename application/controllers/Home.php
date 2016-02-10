<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	*	Construct
	*
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->library(array('form_validation'));
	}


	/**
	*	Index
	*
	*/
	public function index()
	{
		// Show home
		$status = $this->is_signedin();
		if ($status==0) {
			$content = $this->default_system_settings();
			$this->load->view('user_header', $content);
			$this->load->view('home');
			$this->load->view('user_footer');
		}
		else {
			redirect('backend', 'refresh');
		}
	}


	/**
	*	User logged in check
	*
	*	@return 	string 	$status
	*
	*/
	public function is_signedin()
	{
		$status = $this->home_model->is_signedin();
		return $status;
	}


	/**
	*	Default system settings
	*	Show default system setting such as system name, location, slogan, etc ...
	*	
	*	@return 	array 	$content
	*	
	*/
	private function default_system_settings()
	{
		$content["system_name"]        = $this->home_model->setting_data("system_name");
		$content["system_location"]    = $this->home_model->setting_data("system_location");
		$content["system_description"] = $this->home_model->setting_data("system_description");
		$content["user_fullname"]      = $this->session->userdata("first_name")." ".$this->session->userdata("last_name");
		$content["user_privileges"]    = $this->session->userdata("privileges");
		return $content;
	}


	/**
	*	Search data
	*	Member data search for public.
	*	Only show name, province, city, generation, year entry and year out - without detail
	*
	*	@return 	array 	$search_result
	*	
	*/
	public function search()
	{
		$this->form_validation->set_rules('search', 'Search', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			// Show dashboard
			$content = $this->default_system_settings();
			$this->load->view('user_header', $content);
			$this->load->view('home');
			$this->load->view('user_footer');
		}
		else {
			// Set post data variable
			$search_string   = $this->input->post("search");
			$search_category = $this->input->post("search_category");
			// Get result data from backend_model
			$search_result = $this->home_model->data_search($search_string, $search_category);
			// Set to view
			$content                  = $this->default_system_settings();
			$content["search_string"] = $search_string;
			$content["search_result"] = $search_result;
			$this->load->view('user_header', $content);
			$this->load->view('search_result_home');
			$this->load->view('user_footer');
			$this->load->view('init/init_datatable');
		}
	}

}