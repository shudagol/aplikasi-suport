<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//load Login_model.php	
		$this->load->model('M_login');
		//check the username is already set up or not
		
	}

	public function index(){
		if($this->session->userdata('level') == 'admin'){
	
			redirect('admin');
			
			}elseif($this->session->userdata('level') == 'member'){
			
			redirect('admin');
			
			}else{

		$data = array('error' => ''
					);
		$this->load->view('login_form', $data);
			}
	}

	//function for processing login form
	public function login_process(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
					//calling chech_user() function in Login_model.php
		$result = $this->M_login->check_user($username, $password); 

		if($result->num_rows() > 0){
			foreach ($result->result() as $row) {
				$id = $row->id;
				$username = $row->username;
				$level = $row->level;
			}

			$newdata = array(
			        'user_id'  => $id,
			        'username' => $username,
			        'level' => $level,
			        'logged_in' => TRUE
			);
			
			//set up session data
			$this->session->set_userdata($newdata);
			if($this->session->userdata('level')=='admin') {
				// redirect('admin');
				
					redirect(site_url());
				
			}elseif ($this->session->userdata('level')=='member') {
				// redirect('member');
					redirect(site_url());


			}
		}else{
			echo 'gagal';
			redirect('login');
		}
	}

	public function register(){
		$data = array('error' => ''
					);
		$this->load->view('form_register', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect(site_url());
	}
}