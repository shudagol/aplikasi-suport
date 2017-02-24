<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_issue extends CI_Model {

	public function getIssue()
	{
    $this->db->from($this->issue);
    $this->db->order_by("judul", "DESC");
    $data = $this->db->get(); 
    return $data->result();
 
		// $data = $this->db->get('issue')
  //           ->db->order_by('issue_id', 'DESC');
		// return $data->result();
	}

  public function get_kategori()
  {
    $data = $this->db->get('kategori'); 
    return $data->result();
  }

	function lihat($sampai,$dari){

    $this->db->order_by("created_at", "desc");
    $this->db->select('issue.*, user.username, kategori.judul_kategori');
    $this->db->join('user', 'user.id = issue.user_id', 'left');
    $this->db->join('kategori', 'kategori.id_kategori = issue.id_kategori', 'left');
    $data = $this->db->get('issue',$sampai,$dari);
    return $data->result();
   
  }

  function jumlah(){
   $query = $this->db->get('issue');
   return $query->num_rows();
  }

   function caridata(){
	  $c = $this->input->POST ('key');
	  $this->db->like('judul', $c);
	  $this->db->order_by("created_at", "desc");
    $this->db->select('issue.*, user.username, kategori.judul_kategori');
    $this->db->join('kategori', 'kategori.id_kategori = issue.id_kategori', 'left');
    $this->db->join('user', 'user.id = issue.user_id', 'left');
    $query = $this->db->get('issue');
	return $query->result(); 
  }

  public function act_tambah($input){

  		$param['judul'] = $input['judul'];
  		$param['isi'] = $input['isi'];
  		$param['user_id'] = $this->session->userdata('user_id');
  		$param['created_at'] = date("Y-m-d H:i:s");
  		$param['tgl'] = date("Y-m-d");
      $param['status']= 'open';
      $param['id_kategori'] = $input['kategori'];

		$this->db->insert('issue', $param);

		return $this->db->affected_rows();
	}

  public function detail($id){
    $this->db->select('issue.*, user.username,user.nama,user.email, kategori.judul_kategori');
    $this->db->where('issue_id', $id);
    $this->db->join('user', 'user.id = issue.user_id', 'left');
    $this->db->join('kategori', 'kategori.id_kategori = issue.id_kategori', 'left');
    $data = $this->db->get('issue');
    return $data->result();
  }

  public function solved($input){
    $param['status'] = 'solved';
    $this->db->where('issue_id', $input['id']);
    $this->db->update('issue', $param);

    return $this->db->affected_rows();
  }

   public function act_edit_issue($input){
      $param['judul'] = $input['judul'];
      $param['id_kategori'] = $input['kategori'];
      $param['isi'] = $input['isi'];
      $param['issue_id'] = $input['issue_id'];
      $param['created_at'] = date("Y-m-d H:i:s");

    $this->db->where('issue_id', $input['issue_id']);
    $this->db->update('issue', $param);

    return $this->db->affected_rows();
  }

}