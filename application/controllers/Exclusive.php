<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exclusive extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('exclusive_model');

		$data = array();
//		$this->load->model('category_model');
		$this->load->helper('url','form','file');
		if (!$this->session->userdata('userlogin')){
			redirect('user/login');
		}
	}
	public function addExclusive(){
		$data = array();
		$data['title'] = 'Exclusive Add Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['addExclusives'] = $this->load->view('backend/pages/exclusive/addExclusive', '', true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/exclusiveSection/exclusiveAdd', $data);
	}
	public function addExclusivesForm(){
		$data['exclu_title'] = $this->input->post('exclu_title', true);
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('exclu_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['exclu_image']=$data_image['upload_data']['file_name'];
		$this->exclusive_model->saveExclusive($data);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Exclusive Added Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('exclusive/addExclusive');
	}
	public function listExclusive(){
		$data = array();
		$data['title'] = 'Exclusive List Section';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['exclusivesData'] = $this->exclusive_model->getAllExclusivesData();
		$data['indexExclusives'] = $this->load->view('backend/pages/exclusive/indexExclusive', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/exclusiveSection/exclusiveList', $data);
	}
	public function editExclusive($id){
		$data['title'] = 'Exclusive Streaming System' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['exclusivesByID'] = $this->exclusive_model->getExclusivesByID($id);
		$data['editExclusives'] = $this->load->view('backend/pages/exclusive/editExclusive', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/exclusiveSection/exclusiveEdit', $data);
	}
	public function updateExclusiveForm()
	{
		$data['exclu_id'] = $this->input->post('exclu_id');
		$data['exclu_title'] = $this->input->post('exclu_title');

		$id = $data['exclu_id'];
		$exclu_title = $data['exclu_title'];
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('exclu_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['exclu_image']=$data_image['upload_data']['file_name'];
		if(empty($exclu_title)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('exclusive/editExclusive/'.$id);
		}else{
			$this->exclusive_model->updateExclusive($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Exclusive Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('exclusive/editExclusive/'.$id);
		}

	}
	public function delExclusive($id){
		$this->exclusive_model->delExclusivesByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Exclusive Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('exclusive/listExclusive/');
	}


}
