<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class template
{
	protected $_ci;
	public function __construct()
	{
		$this->_ci = &get_instance();
	}
	function lihat($template = NULL,$data = NULL)
	{
		if ($template != NULL) 
			$data['_body']		= $this->_ci->load->view($template,$data,TRUE);
			$data['_header']	= $this->_ci->load->view('template/head',$data,TRUE);
			$data['_menu']	= $this->_ci->load->view('template/menu',$data,TRUE);


			$data['_footer']	= $this->_ci->load->view('template/foot',$data,TRUE);
			echo $data['_template']	= $this->_ci->load->view('template',$data,TRUE);
	}

	function coba(){
		echo 'tes';
	}
}

/* End of file template.php */
/* Location: ./application/controllers/template.php */