<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
        $this->load->model('M_issue');
        $this->load->model('M_comment');

        $this->load->library('pagination');
        $this->load->helper('tgl_indonesia');
	}

	// public function index()
	// {
 //        $data['issue'] = $this->M_issue->getIssue();

	// 	$this->template->lihat('issue/home',$data);		
	// }
	 function index(){
  $jumlah= $this->M_issue->jumlah();
 
  $config['base_url'] = base_url().'issue/index/';
  $config['total_rows'] = $jumlah; //menghitung total baris
  $config['per_page'] = 10; //mengatur total data yang tampil per halamannya
  
 $config['full_tag_open'] = '<ul class="pagination pagination-sm pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
 
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
 
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
 
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
 
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
 
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
  
   
  $dari = $this->uri->segment('3');

  $data['package'] = $this->M_issue->lihat($config['per_page'],$dari);
  $this->pagination->initialize($config);

  $dari = $this->uri->segment('3');
  $data['issue'] = $this->M_issue->lihat($config['per_page'],$dari);
  
  $this->pagination->initialize($config); 
  $this->template->lihat('issue/home',$data);
  // $this->load->view('view_welcome',$data);
 }

 public function cari() {
       $data['issue']=$this->M_issue->caridata();
       //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       
       $jumlah = count($data['issue']);
       
       if($data['issue']==null) {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('welcome','kembali');
          }
          else {
 			 $this->template->lihat('issue/home',$data);
		}
}

	public function create_issue(){
     $data['data'] = $this->M_issue->get_kategori();

		 $this->template->lihat('issue/create',$data);
	}

	public function insert(){
      		$input = $this->input->post();
      		$proses = $this->M_issue->act_tambah($input);
      		if ($proses>= 0) {
      			$this->session->set_flashdata('alert_msg',succ_msg('Issue Berhasil di Inputkan'));
      			redirect('issue');
      		}else{
      			$this->session->set_flashdata('alert_msg',err_msg('Issue gagal di Inputkan'));
            redirect('issue');
      		}
	}

  public function detail($id){
          $data['data'] = $this->M_issue->detail($id);
          $data['comment'] = $this->M_comment->get_comment($id);
          $this->template->lihat('issue/detail',$data);
       }

  public function insert_comment(){
      $input = $this->input->post();
      $isi = $this->input->post('isi');
      $id    = $this->input->post('issue_id');
      $judul = $input['judul'];
      $admin_user = $this->M_comment->get_admin($id);
      $user_comment = $this->M_comment->get_user_comment($id);
      $user_recepients = array_merge($admin_user,$user_comment);
  
      $username_issue = $input['username'];
      $username_comm = $this->session->userdata('username');
      $user_post = $input['email'];
      
      $proses = $this->M_comment->act_tambah($input);

      if ($proses>= 0) {

        $this->load->helper('email_helper');
        if (mail_kirim($username_issue,$judul,$user_post,$username_comm,$user_recepients,$isi)) {
          echo 'berhasil';
        }else{
          echo 'gagal';
        }
      

        $this->session->set_flashdata('alert_msg',succ_msg('Komentar berhasil di tambahkan'));
        redirect('issue/detail/'.$id);
      }else{
        $this->session->set_flashdata('alert_msg',err_msg('Komentar gagal di tambahkan'));
        redirect('issue/detail');
      }
    }

    public function solved()
    {
      $input = $this->input->post();
      $id    = $this->input->post('id');
      $proses = $this->M_issue->solved($input);
      if ($proses>= 0) {
        $this->session->set_flashdata('alert_msg',succ_msg('Status berhasil di rubah solved'));
        // redirect('issue/detail/'.$id);
      }else{
        $this->session->set_flashdata('alert_msg',err_msg('Status gagal di rubah'));
        // redirect('issue/detail');
      }
     
    }

    public function edit_comment($id)
    {
      $data['data'] = $this->M_comment->edit_comment($id);
      $this->load->view('issue/edit_comment',$data);
    }

    public function update_comment()
    {
        $input = $this->input->post();
        $proses = $this->M_comment->update_comment($input);

        if ($proses>= 0) {
          $this->session->set_flashdata('alert_msg',succ_msg('comment Berhasil di Update'));
          // redirect('pegawai');
        }else{
          $this->session->set_flashdata('alert_msg',err_msg('comment gagal di Update'));
          // redirect('pegawai');
      }
    }

    public function hapus_comment($id)
    {
      $proses = $this->M_comment->act_hapus($id);
      if ($proses>= 0) {
        $this->session->set_flashdata('alert_msg',succ_msg('Komentar Berhasil di Hapus'));
      // redirect('pegawai');
      }else{
        $this->session->set_flashdata('alert_msg',err_msg('Komentar gagal di Hapus'));
      // redirect('pegawai');

      }
    }

    public function edit_issue($id)
    {
     $data['kategori'] = $this->M_issue->get_kategori();
     $data['data'] = $this->M_issue->detail($id);

     $this->template->lihat('issue/edit_issue',$data); 
    }

    public function act_edit_issue()
    {
      $input = $this->input->post();
      $proses = $this->M_issue->act_edit_issue($input);
        if ($proses>= 0) {
          $this->session->set_flashdata('alert_msg',succ_msg('Issue Berhasil di Update'));
          redirect('issue/detail/'.$input['issue_id']);
        }else{
          $this->session->set_flashdata('alert_msg',err_msg('Issue gagal di Update'));
          redirect('issue/detail/'.$input['issue_id']);
        }
    }


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */