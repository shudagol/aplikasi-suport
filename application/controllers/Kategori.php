<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level')!="admin") {
			redirect('admin');
		}
        $this->load->model('M_kategori');

	}

	public function index()
	{
		$data['kategori'] = $this->M_kategori->get_kategori();
  		$this->template->lihat('kategori/home',$data);
		
	}

	public function act_save(){
		$input = $this->input->post();
		$proses = $this->M_kategori->act_tambah($input);

		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('Kategori Berhasil di tambahkan'));
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('Kategori gagal di tambahkan'));

		}
	}

	public function edit($id)
		{
			$data['data'] = $this->M_kategori->edit($id);
			$this->load->view('kategori/edit', $data);
		}

	public function act_edit(){
		$input = $this->input->post();
		$proses = $this->M_kategori->act_edit($input);
		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('Kategori Berhasil di Update'));
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('Kategori gagal di Update'));
		}
	}

	public function hapus($id="")
	{
		$proses = $this->M_kategori->act_hapus($id);
		if ($proses>= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('Kategori berhasil di hapus'));
		}else{
			$this->session->set_flashdata('alert_msg',err_msg('Kategori gagal di hapus'));
		}
	}
}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */