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
		$this->db->select('comment.*,user.username,user.nama,user.img');
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

 public function get_admin($issue_id)
  {
    $sql = "select id as user_id,username,email from user where level='admin' and id not in (select user_id from comment where issue_id = $issue_id)";
    $data = $this->db->query($sql);
    return $data->result();

  }

  public function get_user_comment($issue_id)
  {
    $this->db->select('comment.user_id,user.username,user.email');
    $this->db->where('issue_id',$issue_id);
    $this->db->where_not_in('comment.user_id', 1);
    $this->db->join('user', 'user.id = comment.user_id', 'left');
    $this->db->distinct();
    $data = $this->db->get('comment'); 
    return $data->result();
  }

//   public function get_user_comment($issue_id){
//     $this->db->select('comment.user_id,user.username,user.email,comment.*');
//     $this->db->from('comment');
//     $this->db->join('user', 'user.id = comment.user_id', 'left');
//     $this->db->where('issue_id',$issue_id);
//     // $this->db->where('level','admin');

//     $this->db->distinct();
//     $data = $this->db->get(); 
//     return $data->result();
// }


}

/* End of file M_comment.php */
/* Location: ./application/models/M_comment.php */