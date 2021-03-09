<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popular_model extends CI_Model {

	public function savePopular($data){
		$this->db->insert('popular',$data);
	}
	public function getAllPopularsData(){
		$this->db->select('*');
		$this->db->from('popular');
		$this->db->order_by('pop_id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getPopularsByID($id){
		$this->db->select('*');
		$this->db->from('popular');
		$this->db->where('pop_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updatePopular($data){
		$this->db->set('pop_title', $data['pop_title']);
		$this->db->set('pop_image', $data['pop_image']);
		$this->db->where('pop_id', $data['pop_id']);
		$this->db->update('popular',$data);
	}
	public function delPopularsByID($id){
		$this->db->where('pop_id', $id);
		$this->db->delete('popular');

	}


}
