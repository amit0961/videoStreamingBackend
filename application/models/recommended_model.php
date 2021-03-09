<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recommended_model extends CI_Model {

	public function saveRecommended($data){
		$this->db->insert('recommended',$data);
	}
	public function getAllRecommendedsData(){
		$this->db->select('*');
		$this->db->from('recommended');
		$this->db->order_by('rec_id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getRecommendedsByID($id){
		$this->db->select('*');
		$this->db->from('recommended');
		$this->db->where('rec_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateRecommended($data){
		$this->db->set('rec_title', $data['rec_title']);
		$this->db->set('rec_image', $data['rec_image']);
		$this->db->where('rec_id', $data['rec_id']);
		$this->db->update('recommended',$data);
	}
	public function delRecommendedsByID($id){
		$this->db->where('rec_id', $id);
		$this->db->delete('recommended');

	}


}
