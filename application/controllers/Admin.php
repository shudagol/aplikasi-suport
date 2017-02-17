<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
	}

	public function index()
	{
		$this->template->lihat('admin/home');		
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */