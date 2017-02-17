<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function check_user($username, $password) {
		$query = $this->db->query("select * from user where username='$username' AND password='$password' limit 1");
		return $query;
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */