<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level')!="admin") {
			redirect('admin');
		}
        $this->load->model('M_post');
        $this->load->helper('tgl_indonesia');
        

	}

	public function index()
	{
		$data['post'] = $this->M_post->get_post();
  		$this->template->lihat('post/home',$data);
	}

	public function hapus($id="")
	{
		$proses = $this->M_post->act_hapus($id);
		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('Issue Berhasil di Hapus'));
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('Issue gagal di Hapus'));
		}
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */