<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_id extends CI_Controller {

	/**
	*	Construct
	*
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('backend_model','home_model'));
		$this->load->library(array('form_validation'));
	}


	/**
	*	Index
	*	If user signed in - redirect to dashboard
	*	Else - redirect to sign in form
	*	
	*/
	public function index()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
			$this->load->view('init/init_showpassword');
		}
		else {
			redirect('backend_id/dashboard', 'refresh');
		}
	}


	/**
	*	Signin Process
	*	Step by step
	*	1. Form validation
	*	2. Send back if error, else process
	*	3. Send data to model to get salt, mix with password and check again
	*	4. If success, set sesion data and redirect to dashboard
	*
	*/
	public function signin()
	{
		// Set form validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			// Send back data
			$this->session->set_flashdata('signin_info', 'Harap cek kesalahan berikut!');
			$this->load->view('id/signin_form');
			$this->load->view('init/init_showpassword');
		}
		else {
			$username   = $this->input->post("username");
			$password   = $this->input->post("password");
			$signin_res = $this->backend_model->signin_check($username,$password);

			if (count($signin_res->result_array())>0) {
				foreach ($signin_res->result() as $user_data) {
					$datauser	= array(
						'username'    => $user_data->username,
						'first_name'  => $user_data->first_name,
						'last_name'   => $user_data->last_name,
						'privileges'  => $user_data->privileges,
						'date_signin' => date('d/m/Y H:i:s')
					);
					$this->session->set_userdata($datauser);
				}
				redirect('backend_id/dashboard', 'refresh');
			}
			else {
				$this->session->set_flashdata('signin_info', "Gagal masuk sistem. Pastikan username dan password benar, serta pastikan user anda aktif.");
				$this->load->view('id/signin_form');
				$this->load->view('init/init_showpassword');
			}
		}
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
	*	Dashboard
	*	Show dashboard of the system showing summary of the system such as total data, etc ...
	*
	*/
	public function dashboard()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Show dashboard
			$content                 = $this->default_system_settings();
			$content["member_total"] = $this->backend_model->data_count();
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/dashboard');
			$this->load->view('id/admin_footer');
		}
	}



	// ====================================== SEARCH SYSTEM



	/**
	*	Search Result
	*
	*
	*/
	public function search()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$this->form_validation->set_rules('search', 'Search', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				// Show dashboard
				$content                 = $this->default_system_settings();
				$content["member_total"] = $this->backend_model->data_count();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/dashboard');
				$this->load->view('id/admin_footer');
			}
			else {
				// Set post data variable
				$search_string   = $this->input->post("search");
				$search_category = $this->input->post("search_category");
				// Get result data from backend_model
				$search_result = $this->backend_model->data_search($search_string, $search_category);
				// Set to view
				$content                  = $this->default_system_settings();
				$content["member_total"]  = $this->backend_model->data_count();
				$content["search_string"] = $search_string;
				$content["search_result"] = $search_result;
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/search_result');
				$this->load->view('id/admin_footer');
				$this->load->view('init/init_datatable');
			}
		}
	}



	// ====================================== MEMBER DATA MANIPULATION



	/**
	*	List Data
	*	Show all registered data
	*
	*/
	public function data_list()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Show add data form
			$content              = $this->default_system_settings();
			$content["data_list"] = $this->backend_model->data_list();
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/data_list');
			$this->load->view('id/admin_footer');
			$this->load->view('init/init_datatable');
		}
	}



	/**
	*	Detail Data
	*	Show detail of single member
	*
	*/
	public function data_detail()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Get member id from url
			$member_id = '';
			if ($this->uri->segment(3) === FALSE) {
				$member_id = $member_id;
			}
			else {
				$member_id = $this->uri->segment(3);
			}

			// Show detail data view
			$content                = $this->default_system_settings();
			$content["member_data"] = $this->backend_model->data_detail($member_id);
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/data_detail');
			$this->load->view('id/admin_footer');
		}
	}



	/**
	*	Add Data
	*	Show add new data form
	*
	*/
	public function data_add()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Check privileges
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "003")!==false || $user_privileges=="*") {
				// Show add data form
				$content                          = $this->default_system_settings();
				$content["select_place_of_birth"] = $this->select_province_city("","city_name");
				$content["select_province_city"]  = $this->select_province_city();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/data_add');
				$this->load->view('id/admin_footer');
				$this->load->view('init/init_tinymce');
				$this->load->view('init/init_datepicker');
				$this->load->view('init/init_chosen');
				$this->load->view('init/init_showpassword');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*	Show select option province city
	*	
	*	@param 		string 	$selected
	*	@param 		string 	$return_value
	*	@return 	string 	$select_result
	*
	*/
	private function select_province_city($selected="",$return_value="")
	{
		$select_result = "";
		// Get province
		$list_province = $this->backend_model->list_province();
		foreach ($list_province->result() as $lp) {
			$province_id   = $lp->province_id;
			$province_name = $lp->province_name;
			$select_result .= "<optgroup label='$province_name'>";
			// Get City
			$list_city = $this->backend_model->list_city($province_id);
			foreach ($list_city->result() as $lc) {
				$city_id   = $lc->city_id;
				$city_name = $lc->city_name;

				// if return value didn't set, default result return province|city
				if ($return_value == "") {
					if ($selected == "$province_id|$city_id") {
						$select_result .= "<option value='$province_id|$city_id' selected>$city_name</option>";
					}
					else {
						$select_result .= "<option value='$province_id|$city_id'>$city_name</option>";
					}
				}
				else if ($return_value=="city_name") {
					if ($selected == "$city_name") {
						$select_result .= "<option value='$city_name' selected>$city_name</option>";
					}
					else  {
						$select_result .= "<option value='$city_name'>$city_name</option>";
					}
				}
				else if ($return_value=="city_id") {
					if ($selected == "$city_id") {
						$select_result .= "<option value='$city_id' selected>$city_name</option>";
					}
					else  {
						$select_result .= "<option value='$city_id'>$city_name</option>";
					}
				}
			}
		}
		return $select_result;
	}



	/**
	*	Add data process
	*
	*	@return 	string 	data_info
	*
	*/
	public function data_add_process()
	{
		// Set form validation
			// Basic
			$this->form_validation->set_rules('fullname', 'Nama lengkap', 'trim|required');
			$this->form_validation->set_rules('nickname', 'Nama panggilan', 'trim|required|min_length[3]|callback__username_check');
			$this->form_validation->set_rules('gender', 'Jenis kelamin', 'trim|required');
			$this->form_validation->set_rules('place_of_birth', 'Tempat lahir', 'trim|required');
			$this->form_validation->set_rules('date_of_birth', 'Tanggal lahir', 'trim|required');
			$this->form_validation->set_rules('province_city', 'Kota', 'required');
			$this->form_validation->set_rules('address', 'Alamat', 'trim');
			// Family
			$this->form_validation->set_rules('partner_name', 'Suami/Istri', 'trim');
			$this->form_validation->set_rules('childrens[]', 'Anak', 'trim');
			
			// Parent
			$this->form_validation->set_rules('father_name', 'Nama ayah', 'trim');
			$this->form_validation->set_rules('mother_name', 'Nama ibu', 'trim');
			$this->form_validation->set_rules('guardian_name', 'Wali', 'trim');
			$this->form_validation->set_rules('parent_address', 'Alamat orang tua', 'trim');
			// Contact
			$this->form_validation->set_rules('ext_home_number', 'Kode daerah', 'numeric|trim');
			$this->form_validation->set_rules('home_number', 'Telp rumah', 'numeric|trim');
			$this->form_validation->set_rules('phone_number', 'No handphone', 'numeric|trim|required');
			$this->form_validation->set_rules('phone_number_2', 'No handphone 2', 'numeric|trim');
			$this->form_validation->set_rules('blackberry_pin', 'Blackberry pin', 'trim');
			$this->form_validation->set_rules('email_address', 'Alamat email', 'required|valid_email|trim');
			$this->form_validation->set_rules('website_address', 'Alamat website', 'valid_url|trim');
			$this->form_validation->set_rules('facebook_profile', 'Facebook', 'valid_url|trim');
			$this->form_validation->set_rules('twitter_profile', 'Twitter', 'trim');
			// Academic info
			$this->form_validation->set_rules('generation', 'Angkatan', 'trim');
			$this->form_validation->set_rules('year_entry', 'Tahun masuk', 'numeric|max_length[4]|required|trim');
			$this->form_validation->set_rules('year_out', 'Tahun keluar', 'numeric|max_length[4]|required|trim');
			$this->form_validation->set_rules('last_class', 'Kelas terakhir', 'trim');
			$this->form_validation->set_rules('academic_notes', 'Catatan tambahan', 'trim');
			// Account Info
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('add_data_info', 'Error dalam penyimpanan data. Harap cek error berikut!');
			// Show add data form
			$content                          = $this->default_system_settings();
			$content["select_place_of_birth"] = $this->select_province_city($this->input->post("place_of_birth"),"city_name");
			$content["select_province_city"]  = $this->select_province_city($this->input->post("province_city"));
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/data_add');
			$this->load->view('id/admin_footer');
			$this->load->view('init/init_tinymce');
			$this->load->view('init/init_datepicker');
			$this->load->view('init/init_chosen');
			$this->load->view('init/init_showpassword');
		}
		else {

			// Basic
			$data["fullname"]       = addslashes(ucwords(strtolower($this->input->post("fullname"))));
			$data["nickname"]       = addslashes(ucwords(strtolower($this->input->post("nickname"))));
			$data["gender"]         = $this->input->post("gender");
			$data["place_of_birth"] = $this->input->post("place_of_birth");
			$data["date_of_birth"]  = $this->input->post("date_of_birth");
			// If photo isn't empty
			if (!empty($_FILES['photo']['name'])) {
				$data["photo"]      = $this->input->post("photo");
			}
			$data["active"]         = $this->input->post("active");
			$province_city          = $this->input->post("province_city");
			$pc_break               = explode("|", $province_city);
			$data["province_id"]    = $pc_break[0];
			$data["city_id"]        = $pc_break[1];
			$data["address"]        = $this->input->post("address");

			// Family
			$data["partner_name"] = addslashes(ucwords(strtolower($this->input->post("partner_name"))));
			$childrens            = $this->input->post("childrens");
			if (is_array($childrens)) {
				$data["childrens"] = implode("|", $childrens);
			}
			else {
				$data["childrens"] = "";
			}
			
			// Parent
			$data["father_name"]        = addslashes(ucwords(strtolower($this->input->post("father_name"))));
			$data["mother_name"]        = addslashes(ucwords(strtolower($this->input->post("mother_name"))));
			$data["guardian_name"]      = addslashes(ucwords(strtolower($this->input->post("guardian_name"))));
			$parent_province_city       = $this->input->post("parent_province_city");
			if ($parent_province_city!="") {
				$ppc_break                  = explode("|", $parent_province_city);
				$data["parent_province_id"] = $ppc_break[0];
				$data["parent_city_id"]     = $ppc_break[1];
			}
			else {
				$data["parent_province_id"] = "";
				$data["parent_city_id"]     = "";
			}
			$data["parent_address"]     = $this->input->post("parent_address");
			
			// Contact
			$data["home_number"]      = $this->input->post("ext_home_number").$this->input->post("home_number");
			$data["phone_number"]     = $this->input->post("phone_number");
			$data["phone_number_2"]   = $this->input->post("phone_number_2");
			$data["blackberry_pin"]   = $this->input->post("blackberry_pin");
			$data["email_address"]    = $this->input->post("email_address");
			$data["website_address"]  = $this->input->post("website_address");
			$data["facebook_profile"] = $this->input->post("facebook_profile");
			$data["twitter_profile"]  = $this->input->post("twitter_profile");
			
			// Academic
			$data["generation"]     = $this->input->post("generation");
			$data["year_entry"]     = $this->input->post("year_entry");
			$data["year_out"]       = $this->input->post("year_out");
			$data["last_class"]     = $this->input->post("last_class");
			$data["academic_notes"] = $this->input->post("academic_notes");
			
			// Account
			$data["username"] = $this->input->post("username");
			$data["password"] = $this->input->post("password");

			// Send to model to process input
			$member_id = $this->backend_model->add_data_process($data);

			// Success adding data
			if ($member_id!="") {
				$upload_info = "";
				// If photo isn't empty
				if (!empty($_FILES['photo']['name'])) {
					// Set new name
					$file_ext_break = explode(".", str_replace(" ", "_", $_FILES['photo']['name']));
					$file_ext_num   = count($file_ext_break)-1;
					$file_ext       = $file_ext_break[$file_ext_num];

					// Set config
					$config['upload_path']   = './assets/img/data_photo/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = 2048;
					$config['max_width']     = 1024;
					$config['max_height']    = 768;
					$config['file_name']     = $member_id."_photo.".$file_ext;

			        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('photo')) {
						$error       = $this->upload->display_errors();
						$upload_info = "<br>".$error;
			        }
			        else {
						$data = $this->upload->data();

						// Set photo data array
						$photo_data['photo'] = $data['file_name'];

						// Edit data member basic - field photo
						$upload_status = $this->backend_model->add_photo_process($member_id, $photo_data);
						if ($upload_status=="ok") {
							$upload_info = "<br>Foto berhasil diupload!";
						}
						else {
							$upload_info = "<br>Upload foto gagal!";
						}
			        }
				}

				// Set flashdata info success!
				$this->session->set_flashdata('add_data_info', 'Data berhasil disimpan!'.$upload_info);
				redirect('backend_id/data_add', 'refresh');
			}
			// Failed saving
			else {
				$this->session->set_flashdata('add_data_info', 'Error penyimpanan data. Harap periksa kembali input anda!');
				redirect('backend_id/data_add', 'refresh');
			}
		}
	}



	/**
	*	Username check
	*
	*	@param 		string 	$username
	*
	*/
	public function _username_check($username)
	{
		// Check username on the database
		$check_username = $this->backend_model->username_check($username);
		if ($check_username!=true) {
			$this->form_validation->set_message('_username_check', 'Username : {field} sudah digunakan! Harap pergunakan username lain.');
		}

		return $check_username;
	}



	/**
	*	Edit Data
	*	Show edit existing data form
	*
	*/
	public function data_edit()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Check privileges
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "004")!==false || $user_privileges=="*") {
				// Get member id from url
				$member_id = '';
				if ($this->uri->segment(3) === FALSE) {
					$member_id = $member_id;
				}
				else {
					$member_id = $this->uri->segment(3);
				}

				// Loop data and get current city select
				$member_data = $this->backend_model->data_detail_join_table($member_id);
				foreach ($member_data->result() as $md) {
					// Place of birth
					$place_of_birth = $md->place_of_birth;
					// Member address
					$mprovince      = $md->province_id;
					$mcity          = $md->city_id;
					$maddress       = $mprovince."|".$mcity;
					// Parent address
					$pprovince      = $md->parent_province;
					$pcity          = $md->parent_city;
					$paddress       = $pprovince."|".$pcity;
				}

				// Show detail data view
				$content                                = $this->default_system_settings();
				$content["member_data"]                 = $member_data;
				$content["select_place_of_birth"]       = $this->select_province_city($place_of_birth, "city_name");
				$content["select_province_city_member"] = $this->select_province_city($maddress);
				$content["select_province_city_parent"] = $this->select_province_city($paddress);
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/data_edit');
				$this->load->view('id/admin_footer');
				$this->load->view('init/init_tinymce');
				$this->load->view('init/init_datepicker');
				$this->load->view('init/init_chosen');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*	Edit data process
	*
	*	@return 	string 	$data_info
	*
	*/
	public function data_edit_process()
	{
		// Set form validation
			// Basic
			$this->form_validation->set_rules('fullname', 'Nama lengkap', 'trim|required');
			$this->form_validation->set_rules('nickname', 'Nama panggilan', 'trim|required');
			$this->form_validation->set_rules('gender', 'Jenis kelamin', 'trim|required');
			$this->form_validation->set_rules('place_of_birth', 'Tempat lahir', 'trim|required');
			$this->form_validation->set_rules('date_of_birth', 'Tanggal lahir', 'trim|required');
			$this->form_validation->set_rules('province_city', 'Kota', 'required');
			$this->form_validation->set_rules('address', 'Alamat', 'trim');
			// Family
			$this->form_validation->set_rules('partner_name', 'Suami/Istri', 'trim');
			$this->form_validation->set_rules('childrens[]', 'Anak', 'trim');
			// Parent
			$this->form_validation->set_rules('father_name', 'Nama ayah', 'trim');
			$this->form_validation->set_rules('mother_name', 'Nama ibu', 'trim');
			$this->form_validation->set_rules('guardian_name', 'Wali', 'trim');
			$this->form_validation->set_rules('parent_address', 'Alamat orang tua', 'trim');
			// Contact
			$this->form_validation->set_rules('home_number', 'Telp rumah', 'numeric|trim');
			$this->form_validation->set_rules('phone_number', 'No handphone', 'numeric|trim|required');
			$this->form_validation->set_rules('phone_number_2', 'No handphone 2', 'numeric|trim');
			$this->form_validation->set_rules('blackberry_pin', 'Blackberry Pin', 'trim');
			$this->form_validation->set_rules('email_address', 'Alamat Email', 'required|valid_email|trim');
			$this->form_validation->set_rules('website_address', 'Alamat Website', 'valid_url|trim');
			$this->form_validation->set_rules('facebook_profile', 'Facebook', 'valid_url|trim');
			$this->form_validation->set_rules('twitter_profile', 'Twitter', 'trim');
			// Academic info
			$this->form_validation->set_rules('generation', 'Angkatan', 'trim');
			$this->form_validation->set_rules('year_entry', 'Tahun masuk', 'numeric|max_length[4]|required|trim');
			$this->form_validation->set_rules('year_out', 'Tahun keluar', 'numeric|max_length[4]|required|trim');
			$this->form_validation->set_rules('last_class', 'Kelas terakhir', 'trim');
			$this->form_validation->set_rules('academic_notes', 'Catatan tambahan', 'trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('add_data_info', 'Error dalam penyimpanan data. Harap cek error berikut!');
			// Loop data and get current city select
			$member_id   = $this->input->post("member_id");
			$member_data = $this->backend_model->data_detail_join_table($member_id);
			foreach ($member_data->result() as $md) {
				// Place of birth
				$place_of_birth = $md->place_of_birth;
				// Member address
				$mprovince      = $md->province_id;
				$mcity          = $md->city_id;
				$maddress       = $mprovince."|".$mcity;
				// Parent address
				$pprovince      = $md->parent_province;
				$pcity          = $md->parent_city;
				$paddress       = $pprovince."|".$pcity;
			}
			// Show detail data view
			$content                                = $this->default_system_settings();
			$content["member_data"]                 = $member_data;
			$content["select_place_of_birth"]       = $this->select_province_city($place_of_birth, "city_name");
			$content["select_province_city_member"] = $this->select_province_city($maddress);
			$content["select_province_city_parent"] = $this->select_province_city($paddress);
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/data_edit');
			$this->load->view('id/admin_footer');
			$this->load->view('init/init_tinymce');
			$this->load->view('init/init_datepicker');
			$this->load->view('init/init_chosen');
		}
		else {
			$member_id   = $this->input->post("member_id");

			// Basic
			$data["fullname"]           = addslashes(ucwords(strtolower($this->input->post("fullname"))));
			$data["nickname"]           = addslashes(ucwords(strtolower($this->input->post("nickname"))));
			$data["gender"]             = $this->input->post("gender");
			$data["place_of_birth"]     = $this->input->post("place_of_birth");
			$data["date_of_birth"]      = $this->input->post("date_of_birth");
			if (!empty($_FILES['photo']['name'])) {
				$data["photo"]          = $this->input->post("photo");
			}
			$data["active"]             = $this->input->post("active");
			$province_city              = $this->input->post("province_city");
			$pc_break                   = explode("|", $province_city);
			$data["province_id"]        = $pc_break[0];
			$data["city_id"]            = $pc_break[1];
			$data["address"]            = $this->input->post("address");

			// Family
			$data["partner_name"]       = addslashes(ucwords(strtolower($this->input->post("partner_name"))));
			$childrens                  = $this->input->post("childrens");
			$data["childrens"]          = implode("|", $childrens);
			
			// Parent
			$data["father_name"]        = addslashes(ucwords(strtolower($this->input->post("father_name"))));
			$data["mother_name"]        = addslashes(ucwords(strtolower($this->input->post("mother_name"))));
			$data["guardian_name"]      = addslashes(ucwords(strtolower($this->input->post("guardian_name"))));
			$parent_province_city       = $this->input->post("parent_province_city");
			if ($parent_province_city!="") {
				$ppc_break                  = explode("|", $parent_province_city);
				$data["parent_province_id"] = $ppc_break[0];
				$data["parent_city_id"]     = $ppc_break[1];
			}
			else {
				$data["parent_province_id"] = "";
				$data["parent_city_id"]     = "";
			}
			$data["parent_address"]     = $this->input->post("parent_address");

			// Contact
			$data["home_number"]        = $this->input->post("home_number");
			$data["phone_number"]       = $this->input->post("phone_number");
			$data["phone_number_2"]     = $this->input->post("phone_number_2");
			$data["blackberry_pin"]     = $this->input->post("blackberry_pin");
			$data["email_address"]      = $this->input->post("email_address");
			$data["website_address"]    = $this->input->post("website_address");
			$data["facebook_profile"]   = $this->input->post("facebook_profile");
			$data["twitter_profile"]    = $this->input->post("twitter_profile");

			// Academic
			$data["generation"]         = $this->input->post("generation");
			$data["year_entry"]         = $this->input->post("year_entry");
			$data["year_out"]           = $this->input->post("year_out");
			$data["last_class"]         = $this->input->post("last_class");
			$data["academic_notes"]     = $this->input->post("academic_notes");

			// Send to model to process input
			$member_id = $this->backend_model->edit_data_process($data, $member_id);

			// Success adding data
			if ($member_id!="") {
				$upload_info = "";
				// If photo isn't empty
				if (!empty($_FILES['photo']['name'])) {
					// Set new name
					$file_ext_break = explode(".", str_replace(" ", "_", $_FILES['photo']['name']));
					$file_ext_num   = count($file_ext_break)-1;
					$file_ext       = $file_ext_break[$file_ext_num];

					// Set config
					$config['upload_path']   = './assets/img/data_photo/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = 2048;
					$config['max_width']     = 1024;
					$config['max_height']    = 768;
					$config['file_name']     = $member_id."_photo.".$file_ext;

			        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('photo')) {
						$error       = $this->upload->display_errors();
						$upload_info = "<br>".$error;
			        }
			        else {
						$data = $this->upload->data();

						// Set photo data array
						$photo_data['photo'] = $data['file_name'];

						// Edit data member basic - field photo
						$upload_status = $this->backend_model->add_photo_process($member_id, $photo_data);
						if ($upload_status=="ok") {
							$upload_info = "<br>Foto berhasil diupload!";
						}
						else {
							$upload_info = "<br>Upload foto gagal!";
						}
			        }
				}

				// Set flashdata info success!
				$this->session->set_flashdata('add_data_info', 'Data berhasil disimpan!'.$upload_info);
				redirect('backend_id/data_detail/'.$member_id, 'refresh');
			}
			// Failed saving
			else {
				$this->session->set_flashdata('add_data_info', 'Error penyimpanan data. harap periksa input anda!');
				redirect('backend_id/data_edit/$member_id', 'refresh');
			}
		}
	}



	// ====================================== USER MANAGEMENT



	/**
	*	Show registered user list
	*	Show edit link to change user data
	*	Make sure only super_user can change this!
	*
	*/
	public function user()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "002")!==false || $user_privileges=="*") {
				// Show add data form
				$content              = $this->default_system_settings();
				$content["user_list"] = $this->backend_model->user_list();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/user');
				$this->load->view('id/admin_footer');
				$this->load->view('init/init_datatable');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*	Show add user page
	*	Can only editable by super_user
	*
	*/
	public function user_add()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "002")!==false || $user_privileges=="*") {
				// Get username from url
				$username = '';
				if ($this->uri->segment(3) === FALSE) {
					$username = $username;
				}
				else {
					$username = $this->uri->segment(3);
				}
				// Show edit user form
				$content                = $this->default_system_settings();
				$content["module_list"] = $this->backend_model->module_list();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/user_add');
				$this->load->view('id/admin_footer');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*
	*
	*
	*/
	public function user_add_process()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$username = $this->input->post("username");
			// Validate
			$this->form_validation->set_rules('username', 'Username', 'required|callback__username_check');
			$this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
			$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'required|matches[new_password]');
			if ($this->form_validation->run() == FALSE) {
				// Show user setting form
				$content                = $this->default_system_settings();
				$content["module_list"] = $this->backend_model->module_list();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/user_add');
				$this->load->view('id/admin_footer');
			}
			else {
				// Set variable
				$data["username"]      = $this->input->post("username");
				$data["first_name"]    = $this->input->post("first_name");
				$data["last_name"]     = $this->input->post("last_name");
				$data["level"]         = $this->input->post("level");
				$data["active"]        = $this->input->post("active");
				$data["new_password"]  = $this->input->post("new_password");
				$data["conf_password"] = $this->input->post("conf_password");

				// Get privileges
				$priv_array = $this->input->post("privileges");
				if (is_array($priv_array)) {
					$privileges = implode("|", $priv_array);
				}
				else {
					$privileges = $priv_array;
				}
				$data["privileges"] = $privileges;

				// Send to model
				$process = $this->backend_model->user_add_process($data);

				if ($process) {
					$this->session->set_flashdata("user_info", "Data berhasil disimpan!");
					redirect("backend_id/user");
				}
			}
		}
	}




	/**
	*	Show edit user page
	*	Can only editable by super_user
	*
	*/
	public function user_edit()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "002")!==false || $user_privileges=="*") {
				// Get username from url
				$username = '';
				if ($this->uri->segment(3) === FALSE) {
					$username = $username;
				}
				else {
					$username = $this->uri->segment(3);
				}
				// Show edit user form
				$content                = $this->default_system_settings();
				$content["user_detail"] = $this->backend_model->user_detail($username);
				$content["module_list"] = $this->backend_model->module_list();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/user_edit');
				$this->load->view('id/admin_footer');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*	Process user edit process
	*	
	*
	*/
	public function user_edit_process()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$username = $this->input->post("username");
			// Validate
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
			if ($this->input->post("new_password")!="") {
				$this->form_validation->set_rules('new_password', 'Password Baru', 'min_length[5]');
				$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'matches[new_password]');
			}
			// if ($this->input->post("curr_password")!="") {
			// 	$this->form_validation->set_rules('curr_password', 'Current Password', 'callback__user_password_check['.$username.']');
			// 	$this->form_validation->set_rules('new_password', 'New Password', 'min_length[5]');
			// 	$this->form_validation->set_rules('conf_password', 'Confirm Password', 'matches[new_password]');
			// }
			if ($this->form_validation->run() == FALSE) {
				// Set notification
				// $this->session->set_flashdata('user_edit_info', 'Error saving data. Please check these error!');
				// Show user setting form
				$content                = $this->default_system_settings();
				$content["user_detail"] = $this->backend_model->user_detail($this->input->post("username"));
				$content["module_list"] = $this->backend_model->module_list();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/user_edit');
				$this->load->view('id/admin_footer');
			}
			else {
				// Set variable
				$data["username"]      = $this->input->post("username");
				$data["first_name"]    = $this->input->post("first_name");
				$data["last_name"]     = $this->input->post("last_name");
				$data["level"]         = $this->input->post("level");
				$data["active"]        = $this->input->post("active");
				// $data["curr_password"] = $this->input->post("curr_password");
				$data["new_password"]  = $this->input->post("new_password");
				$data["conf_password"] = $this->input->post("conf_password");

				// Get privileges
				$priv_array = $this->input->post("privileges");
				if (is_array($priv_array)) {
					$privileges = implode("|", $priv_array);
				}
				else {
					$privileges = $priv_array;
				}
				$data["privileges"] = $privileges;

				// Send to model
				$process = $this->backend_model->user_edit_process($data);

				if ($process) {
					$this->session->set_flashdata("user_info", "Data berhasil disimpan!");
					redirect("backend_id/user");
				}
			}
		}
	}


	/**
	*	Callback to check 
	*	
	*	@param 		string 		$password
	*	@param 		string 		$username
	*	@return 	boolean
	*
	*/
	public function _user_password_check($password, $username)
	{
		// Check password and username match
		$check_password = $this->backend_model->user_password_check($username, $password);
		if ($check_password!=true) {
			$this->form_validation->set_message('_user_password_check', '{field} yang anda masukkan tidak benar!');
		}

		return $check_password;
	}



	/**
	*	Show user setting page
	*	User can only change password - for now?
	*	
	*/
	public function user_setting()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Show user setting form
			$content                = $this->default_system_settings();
			$content["user_detail"] = $this->backend_model->user_detail($this->session->userdata("username"));
			$content["module_list"] = $this->backend_model->module_list();
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/user_setting');
			$this->load->view('id/admin_footer');
		}
	}



	/**
	*	Process user setting changes
	*	Only password right now
	*
	*/
	public function user_setting_process()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$this->form_validation->set_rules('current_username', 'Hidden Username', 'required');
			$this->form_validation->set_rules('current_password', 'Password Sekarang', 'required');
			$this->form_validation->set_rules('new_password', 'Password Baru', 'required');
			$this->form_validation->set_rules('confirm_new_password', 'Konfirmasi Password', 'matches[new_password]');

			if ($this->form_validation->run() == FALSE) {
				// Set notification
				$this->session->set_flashdata('user_setting_info', 'Error penyimpanan data. Harap cek error berikut!');
				// Show user setting form
				$content                = $this->default_system_settings();
				$content["user_detail"] = $this->backend_model->user_detail($this->session->userdata("username"));
				$content["module_list"] = $this->backend_model->module_list();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/user_setting');
				$this->load->view('id/admin_footer');
			}
			else {
				// Set var
				$data["curr_username"] = $this->input->post("current_username");
				$data["curr_password"] = $this->input->post("current_password");
				$data["new_password"]  = $this->input->post("new_password");
				// Send to model
				$result = $this->backend_model->user_setting_process($data);
				if ($result) {
					$this->session->set_flashdata('user_setting_info', 'Data berhasil disimpan!');
					redirect("backend_id/user_setting", "refresh");
				}
				else {
					$this->session->set_flashdata('user_setting_info', 'Error penyimpanan data. Harap cek error berikut!');
					redirect("backend_id/user_setting", "refresh");
				}
			}
		}
	}



	/**
	*	Process delete user
	*	Only super_user can do this
	*	
	*
	*/
	public function user_delete()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "002")!==false || $user_privileges=="*") {
				// Get username from url
				$username = '';
				if ($this->uri->segment(3) === FALSE) {
					$username = $username;
				}
				else {
					$username = $this->uri->segment(3);
				}
				// Delete process
				$process = $this->backend_model->user_delete($username);
				if ($process) {
					redirect("backend_id/user", "refresh");
				}
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}


	// ====================================== SYSTEM SETTINGS



	/**
	*	System Settings
	*	Show system setting option such as system name, location, etc
	*	
	*/
	public function settings()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Check privileges
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "001")!==false || $user_privileges=="*") {
				// Show system setting form
				$content                 = $this->default_system_settings();
				$content["setting_data"] = $this->home_model->setting_data();
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/settings');
				$this->load->view('id/admin_footer');
				$this->load->view('init/init_tinymce');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*	System settings process
	*	Process save system settings, redirect when successfully saved.
	*	
	*/
	public function setting_process()
	{
		// Set form validation
		$this->form_validation->set_rules('system_name', 'Nama Sistem', 'trim|required');
		$this->form_validation->set_rules('system_location', 'Lokasi Sistem', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('setting_info', 'Error penyimpanan data. Harap cek error berikut!');
			// Show system setting form
			$content                 = $this->default_system_settings();
			$content["setting_data"] = $this->home_model->setting_data();
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/settings');
			$this->load->view('id/admin_footer');
			$this->load->view('init/init_tinymce');
		}
		else {
			// System Name Setting
			$sys_name = array(
				'setting_name'  => 'system_name',
				'setting_value' => addslashes($this->input->post("system_name"))
			);
			$this->backend_model->setting_process_update($sys_name);
			// System Location Setting
			$sys_location = array(
				'setting_name'  => 'system_location',
				'setting_value' => addslashes($this->input->post("system_location"))
			);
			$this->backend_model->setting_process_update($sys_location);
			// System Description Setting
			$sys_description = array(
				'setting_name'  => 'system_description',
				'setting_value' => addslashes($this->input->post("system_description"))
			);
			$this->backend_model->setting_process_update($sys_description);

			// Redirect
			$this->session->set_flashdata('setting_info', 'Data berhasil disimpan!');
			redirect("backend_id/settings");
		}
	}



	// ====================================== REPORT SYSTEM



	/**
	*	Report Frontend
	*	You can choose which report that you want to choose here.
	*
	*/
	public function report()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Check privileges
			$user_privileges = $this->session->userdata("privileges");
			if (strpos($user_privileges, "005")!==false || $user_privileges=="*") {
				// Show report page
				$content                    = $this->default_system_settings();
				$content["regional_select"] = $this->select_province_city("","city_id");
				$this->load->view('id/admin_header', $content);
				$this->load->view('id/report');
				$this->load->view('id/admin_footer');
				$this->load->view('init/init_chosen');
			}
			else {
				redirect("backend_id", "refresh");
			}
		}
	}



	/**
	*	Generate all member data report ordered by name
	*	Excel downloadable report using PHPExcel
	*	
	*/
	public function report_per_name()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Show add data form
			$content              = $this->default_system_settings();
			$content["data_list"] = $this->backend_model->data_list("all", "fullname", "ASC");
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/report_per_name');
			$this->load->view('id/admin_footer');
		}
	}



	/**
	*	Generate all member data report ordered by regional
	*	Excel downloadable report using PHPExcel
	*	
	*/
	public function report_per_regional()
	{
		// Signed in status check
		$status = $this->home_model->is_signedin();
		if ($status==0) {
			// Show sign in form
			$this->load->view('id/signin_form');
		}
		else {
			// Get city_id
			$city_id = '';
			if ($this->uri->segment(3) === FALSE) {
				$city_id = $city_id;
			}
			else {
				$city_id = $this->uri->segment(3);
			}

			// Show add data form
			$content              = $this->default_system_settings();
			$content["data_list"] = $this->backend_model->data_list("all", "fullname", "ASC", "city_id", $city_id);
			$this->load->view('id/admin_header', $content);
			$this->load->view('id/report_per_regional');
			$this->load->view('id/admin_footer');
		}
	}





	/**
	*	Signout
	*
	*/
	public function signout()
	{
		$this->session->sess_destroy();
		redirect('home_id','refresh');
	}
}
