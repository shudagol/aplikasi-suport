<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
        $this->load->model('M_aktifitas');
        $this->load->helper('tgl_indonesia');


	}

	public function index()
	{
		$data['post'] = $this->M_aktifitas->get_post();
		$data['comment'] = $this->M_aktifitas->get_comment();
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
  		$this->template->lihat('aktifitas/home', $data);
	}

}

/* End of file Aktifitas.php */
/* Location: ./application/controllers/Aktifitas.php */