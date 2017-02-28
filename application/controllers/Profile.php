<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    var $gallery_path;
    var $gallery_path_url;
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
        $this->load->model('M_user');
        $this->gallery_path = realpath(APPPATH . '../assets/uploads/img/');
        $this->gallery_path_url = base_url() . 'assets/uploads/img/';

  		$this->load->helper(array('url','html','form'));

	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['user'] = $this->M_user->edit($id);
		$this->template->lihat('profile/home',$data);		
	}

	function upload() {
				
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000'; //in kb
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $url = base_url('uploads/'.$this->upload->data('file_name'));
         $data_insert = array(
                                'nama' => $this->input->post('nama'),
                                'email' => $this->input->post('email'),
                                'img' => $url
                            );
            //query to insert into myupload table
            $this->db->where('id',$this->input->post('id'));
            $proses = $this->db->update('user', $data_insert);
            if ($proses>= 0) {
                $this->session->set_flashdata('alert_msg',succ_msg('User Berhasil di Update'));
                redirect('Profile','refresh');
            }else{
                $this->session->set_flashdata('alert_msg',err_msg('User gagal di Update'));
                redirect('Profile','refresh');

            }
        }

        


        


}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */