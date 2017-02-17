<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function get_user(){
	    $data = $this->db->get('user'); 
	    return $data->result();
	}

	public function edit($id){
    	$this->db->where('id', $id);
	    $data = $this->db->get('user'); 
	    return $data->result();
	}

	public function act_tambah($input){
		$param['username'] = $input['username'];
  		$param['nama'] = $input['nama'];
  		$param['password'] = md5($input['password']);
  		$param['level'] = $input['level'];
		$this->db->insert('user', $param);

		return $this->db->affected_rows();
	}

	public function act_edit($input){
		$param['username'] = $input['username'];
  		$param['nama'] = $input['nama'];
  		$param['level'] = $input['level'];
  		$param['id'] = $input['id'];

		$this->db->where('id', $input['id']);
		$this->db->update('user', $param);

		return $this->db->affected_rows();
	}

	public function act_hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		return $this->db->affected_rows();	
	}

	public function cek_pass_lama($username,$lama)
	{
		$this->db->where('username',$username);
		$data = $this->db->get('user'); 
	    return $data->result();
	}

	public function update_pass($username,$baru)
	{
		$value=array('password'=>$baru);
		$this->db->where('username', $username);
		$this->db->update('user', $value);

		return $this->db->affected_rows();
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */