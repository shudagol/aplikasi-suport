<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_post extends CI_Model {

	public function get_post()
	{
		// $this->db->order_by("created_at", "desc");
	    $this->db->select('issue.*, user.username, kategori.judul_kategori');
	    $this->db->join('user', 'user.id = issue.user_id', 'left');
	    $this->db->join('kategori', 'kategori.id_kategori = issue.id_kategori', 'left');
	    $data = $this->db->get('issue');
	    return $data->result();
	}

	public function act_hapus($id)
	{
		$this->db->where('issue_id', $id);
		$this->db->delete('issue');
		return $this->db->affected_rows();	
	}
}

/* End of file M_post.php */
/* Location: ./application/models/M_post.php */