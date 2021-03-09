<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

	public function saveVideo($data){
		$this->db->insert('screenvideo',$data);
	}

	public function getAllVideosData(){
		$this->db->select('*');
		$this->db->from('screenvideo');
		$this->db->order_by('scvid_id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getVideosByID($id){
		$this->db->select('*');
		$this->db->from('screenvideo');
		$this->db->where('scvid_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateVideo($data){
		$this->db->set('scvid_title', $data['scvid_title']);
		$this->db->set('scvid_file', $data['scvid_file']);
		$this->db->where('scvid_id', $data['scvid_id']);
		$this->db->update('screenvideo',$data);
	}
	public function delVideosByID($id){
		$this->db->where('scvid_id', $id);
		$this->db->delete('screenvideo');

	}







}
