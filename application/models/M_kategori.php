<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function get_kategori(){
	    $data = $this->db->get('kategori'); 
	    return $data->result();
	}

	public function act_tambah($input){
		$param['judul_kategori'] = $input['judul_kategori'];
		$this->db->insert('kategori', $param);

		return $this->db->affected_rows();
	}

	public function edit($id){
    	$this->db->where('id_kategori', $id);
	    $data = $this->db->get('kategori'); 
	    return $data->result();
	}

	public function act_edit($input){
		$param['judul_kategori'] = $input['judul_kategori'];
  		$param['id_kategori'] = $input['id'];

		$this->db->where('id_kategori', $input['id']);
		$this->db->update('kategori', $param);

		return $this->db->affected_rows();
	}

	public function act_hapus($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
		return $this->db->affected_rows();	
	}

}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */