<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level')!="admin") {
			redirect('admin');
		}
        $this->load->model('M_user');

	}

	public function index()
	{
		$data['user'] = $this->M_user->get_user();
  		$this->template->lihat('user/home',$data);
		
	}

	public function act_save(){
		$input = $this->input->post();
		$proses = $this->M_user->act_tambah($input);

		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('User Berhasil di Inputkan'));
			// redirect('pegawai');
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('User gagal di Inputkan'));
			// redirect('pegawai');

		}
	}

	public function edit($id)
		{
			$data['data'] = $this->M_user->edit($id);
			$this->load->view('user/edit', $data);
		}

	public function act_edit(){
		$input = $this->input->post();
		$proses = $this->M_user->act_edit($input);
		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('User Berhasil di Update'));
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('User gagal di Update'));
		}
	}


	public function hapus($id="")
	{
		$proses = $this->M_user->act_hapus($id);
		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('User Berhasil di Hapus'));
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('User gagal di Hapus'));
		}
	}



}

/* End of file User.php */
/* Location: ./application/controllers/User.php */