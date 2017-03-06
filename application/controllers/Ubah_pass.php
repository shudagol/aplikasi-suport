<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_pass extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('admin');
		}
        $this->load->model('M_user');

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
  			redirect('Ubah_pass/ubah_password','refresh');

  			}
  		}else{
  			$this->session->set_flashdata('alert_msg',err_msg('Password lama tidak sesuai'));
  			redirect('Ubah_pass/ubah_password','refresh');
  		}
  		
	}

}

/* End of file Ubah_pass.php */
/* Location: ./application/controllers/Ubah_pass.php */