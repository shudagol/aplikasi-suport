<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aktifitas extends CI_Model {

	public function get_post()
	{
		$id = $this->session->userdata('user_id');
		$this->db->order_by("created_at", "desc");
	    $this->db->select('issue.*, user.*, kategori.*');
    	$this->db->where('user_id', $id);
	    $this->db->join('user', 'user.id = issue.user_id', 'left');
	    $this->db->join('kategori', 'kategori.id_kategori = issue.id_kategori', 'left');

	    $data = $this->db->get('issue');
	    return $data->result();
	
	}

	public function get_comment()
	{
		$id = $this->session->userdata('user_id');
		$sql = "select comment.*,user.username,issue.judul
				from comment
				INNER JOIN user
				ON comment.user_id=user.id
				INNER JOIN issue
				ON comment.issue_id=issue.issue_id
				where comment.user_id=2
				ORDER BY comment.created_at DESC";
		$data = $this->db->query($sql);
	    return $data->result();
	
	}	



}

/* End of file M_aktifitas.php */
/* Location: ./application/models/M_aktifitas.php */