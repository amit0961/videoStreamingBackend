<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newarrival extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('newarrival_model');

		$data = array();
		$this->load->helper('url','form','file');
		if (!$this->session->userdata('userlogin')){
			redirect('user/login');
		}
	}
	public function addNewarrival(){
		$data = array();
		$data['title'] = 'New-Arrival Add Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['addNewarrival'] = $this->load->view('backend/pages/newarrival/addNewarrival', '', true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/newarrivalSection/newarrivalAdd', $data);
	}
	public function addNewarrivalsForm(){
		$data['newarr_title'] = $this->input->post('newarr_title', true);
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('newarr_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['newarr_image']=$data_image['upload_data']['file_name'];
		$this->newarrival_model->saveNewarrival($data);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">New Arrival Added Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('newarrival/addNewarrival');
	}
	public function listNewarrival(){
		$data = array();
		$data['title'] = 'New-Arrival List Section';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['newarrivalData'] = $this->newarrival_model->getAllNewarrivalData();
		$data['indexNewarrivals'] = $this->load->view('backend/pages/newarrival/indexNewarrival', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/newarrivalSection/newarrivalList', $data);
	}
	public function editNewarrival($id){
		$data['title'] = 'New Arrival Edit section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['newarrivalsByID'] = $this->newarrival_model->getNewarrivalsByID($id);
		$data['editNewarrivals'] = $this->load->view('backend/pages/newarrival/editNewarrival', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/newarrivalSection/newarrivalEdit', $data);
	}
	public function updateNewarrivalForm()
	{
		$data['newarr_id'] = $this->input->post('newarr_id');
		$data['newarr_title'] = $this->input->post('newarr_title');

		$id = $data['newarr_id'];
		$newarr_title = $data['newarr_title'];
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('newarr_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['newarr_image']=$data_image['upload_data']['file_name'];
		if(empty($newarr_title)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('newarrival/editNewarrival/'.$id);
		}else{
			$this->newarrival_model->updateNewarrival($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">New arrival Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('newarrival/editNewarrival/'.$id);
		}

	}
	public function delNewarrival($id){
		$this->newarrival_model->delNewarrivalsByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">New arrival Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('newarrival/listNewarrival/');
	}


}
