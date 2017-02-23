<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comment extends CI_Model {

	public function act_tambah($input){

  		$param['isi'] = $input['isi'];
  		$param['user_id'] = $this->session->userdata('user_id');
  		$param['issue_id'] = $input['issue_id'];
  		$param['created_at'] = date("Y-m-d H:i:s");
  		$param['tgl'] = date("Y-m-d");
		  $this->db->insert('comment', $param);

		return $this->db->affected_rows();
	}

	public function get_comment($id){
		$this->db->select('comment.*,user.username,user.nama');
	    $this->db->where('issue_id', $id);
	    $this->db->join('user', 'user.id = comment.user_id', 'left');
	    $data = $this->db->get('comment');
	    return $data->result();
	}

	 public function edit_comment($id)
  {
      $this->db->where('comment_id', $id);
      $data = $this->db->get('comment'); 
      return $data->result();
  }

  public function update_comment($input){
      $param['isi'] = $input['isi'];
      $param['comment_id'] = $input['id_comment'];
  	  $param['created_at'] = date("Y-m-d H:i:s");


    $this->db->where('comment_id', $input['id_comment']);
    $this->db->update('comment', $param);

    return $this->db->affected_rows();
  }

  public function act_hapus($id)
	{
		$this->db->where('comment_id', $id);
		$this->db->delete('comment');
		return $this->db->affected_rows();	
	}


 

}

/* End of file M_comment.php */
/* Location: ./application/models/M_comment.php */