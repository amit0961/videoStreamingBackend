<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exclusive_model extends CI_Model {

	public function saveExclusive($data){
		$this->db->insert('exclusive',$data);
	}
	public function getAllExclusivesData(){
		$this->db->select('*');
		$this->db->from('exclusive');
		$this->db->order_by('exclu_id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getExclusivesByID($id){
		$this->db->select('*');
		$this->db->from('exclusive');
		$this->db->where('exclu_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateExclusive($data){
		$this->db->set('exclu_title', $data['exclu_title']);
		$this->db->set('exclu_image', $data['exclu_image']);
		$this->db->where('exclu_id', $data['exclu_id']);
		$this->db->update('exclusive',$data);
	}
	public function delExclusivesByID($id){
		$this->db->where('exclu_id', $id);
		$this->db->delete('exclusive');

	}
	public function getChannelName($vidChannel)
	{
		$this->db->select('*');
		$this->db->from('channel');
		$this->db->where('ch_id', $vidChannel);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;

	}

}
