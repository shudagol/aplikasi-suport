<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
        $this->load->model('M_issue');
        $this->load->model('M_comment');

       
	}

	public function index()
	{
		
	}

	 public function kirim()
	  {
	   $this->load->helper(array('form', 'url'));
	   $this->load->library('email');
	   
	   //konfigurasi email
	   $config = array();
	   $config['charset'] = 'utf-8';
	   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
	   $config['protocol']= "smtp";
	   $config['mailtype']= "html";
	   $config['smtp_host']= "smtp.gmail.com";
	   $config['smtp_port']= "587";
	   $config['smtp_timeout']= "30";
	   $config['smtp_user']= "samsulhudaon@gmail.com";              //isi dengan email anda
	   $config['smtp_pass']= "laptopsamsulhuda";            // isi dengan password dari email anda
	   $config['crlf']="\r\n";
	   $config['newline']="\r\n";
	  
	   $config['wordwrap'] = TRUE;

	 //memanggil library email dan set konfigurasi untuk pengiriman email
	   
	   $this->email->initialize($config);
	 //konfigurasi pengiriman kotak di view ke pengiriman email di gmail
	   $this->email->from('samsulhudaon@gmail.com');
	   $this->email->to('shvda.gol@gmail.com');
	   $this->email->subject('tes email Codeigniter');
	   $this->email->message('lorem ipsum bla bla bla');

	//proses uploads
	   
	   // $this->upload->initialize(array(
	   //                      "upload_path"   => "./uploads/",
	   // "allowed_types" => "*"
	   // ));
	   
	// pernyataan jika pengiriman berhasil atau tidak
	  
	   if($this->email->send())
	   {
	    echo "tutorial pengiriman email primasaja.com berhasil";
	   }else
	   {
	    echo "tutorial pengiriman email primasaja.com gagal";
	    show_error($this->email->print_debugger());
	   }
	   
	  }



	 public function send_email() {

	        $this->load->library('email');

	        $this->email->set_newline("\r\n");
	        $config['starttls'] = TRUE;
	        $config['protocol'] = 'smtp';
	        $config['smtp_host']  = 'smtp.googlemail.com';
	        $config['smtp_port'] = '465';
	        $config['smtp_user'] = 'samsulhudaon@gmail.com';
	        $config['smtp_from_name'] = 'samsulhudaon';
	        $config['smtp_pass'] = 'laptopsamsulhuda';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';                       

	        $this->email->initialize($config);

	        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
	        $this->email->to('shvda.gol@gmail.com');
	       
	        $this->email->subject('subjek');

	        $this->email->message('isi');

	        if($this->email->send()) {
	            return true;        
	        } else {
	            show_error($this->email->print_debugger());
	        }       

	}

	public function mail()
	{
		$this->load->helper('email_helper');
		if (mail_kirim()) {
			echo 'berhasil';
		}else{
			echo 'gagal';
		}
	}


	public function notif()
	{
		$data = $this->M_comment->to_notif(88);
		echo "<pre>";
		print_r ($data);
		echo "</pre>";
		exit();
	}

	public function send_notif()
	{
		$input = $this->input->post();
		$username_issue = $input['username'];
		$email_issue = $input['email'];
		$judul = $input['judul'];

		echo "<pre>";
		print_r ($input);
		echo "</pre>";
		exit();
	}

}

/* End of file Email.php */
/* Location: ./application/controllers/Email.php */