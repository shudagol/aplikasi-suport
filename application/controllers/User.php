<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
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
			// redirect('pegawai');
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('User gagal di Update'));
			// redirect('pegawai');

		}
	}


	public function hapus($id="")
	{
		$proses = $this->M_user->act_hapus($id);
		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('User Berhasil di Hapus'));
			// redirect('pegawai');
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('User gagal di Hapus'));
			// redirect('pegawai');

		}
	}

	public function ubah_password($value='')
	{
  		$this->template->lihat('user/ubah_password');
	}

	public function act_password($value='')
	{
  		$input = $this->input->post();
  		$lama = md5($input['passlama']);
  		$baru = md5($input['password']);
  		
  		$username = $this->session->userdata('username');

  		$cek = $this->M_user->cek_pass_lama($username,$lama);

  		if ($cek[0]->password==$lama) {
  			$proses = $this->M_user->update_pass($username,$baru);
  			if ($proses) {
  			$this->session->set_flashdata('alert_msg',succ_msg('Password telah diperbarui'));
  			redirect('user/ubah_password','refresh');

  			}
  		}else{
  			$this->session->set_flashdata('alert_msg',err_msg('Password lama tidak sesuai'));
  			redirect('user/ubah_password','refresh');
  		}
  		
	}


}

/* End of file User.php */
/* Location: ./application/controllers/User.php */