<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newarrival_model extends CI_Model {

	public function saveNewarrival($data){
		$this->db->insert('newarrival',$data);
	}
	public function getAllNewarrivalData(){
		$this->db->select('*');
		$this->db->from('newarrival');
		$this->db->order_by('newarr_id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getNewarrivalsByID($id){
		$this->db->select('*');
		$this->db->from('newarrival');
		$this->db->where('newarr_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateNewarrival($data){
		$this->db->set('newarr_title', $data['newarr_title']);
		$this->db->set('newarr_image', $data['newarr_image']);
		$this->db->where('newarr_id', $data['newarr_id']);
		$this->db->update('newarrival',$data);
	}
	public function delNewarrivalsByID($id){
		$this->db->where('newarr_id', $id);
		$this->db->delete('newarrival');

	}

}
