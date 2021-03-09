<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recommended extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('recommended_model');

		$data = array();
		$this->load->helper('url','form','file');
		if (!$this->session->userdata('userlogin')){
			redirect('user/login');
		}
	}
	public function addRecommended(){
		$data = array();
		$data['title'] = 'Recommended Add Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['addRecommended'] = $this->load->view('backend/pages/recommended/addRecommended', '', true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/recommendedSection/recommendedAdd', $data);
	}
	public function addRecommendedsForm(){
		$data['rec_title'] = $this->input->post('rec_title', true);
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('rec_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['rec_image']=$data_image['upload_data']['file_name'];
		$this->recommended_model->saveRecommended($data);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Recommended Added Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('recommended/addRecommended');
	}
	public function listRecommended(){
		$data = array();
		$data['title'] = 'Recommended List Section';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['recommendedsData'] = $this->recommended_model->getAllRecommendedsData();
		$data['indexRecommended'] = $this->load->view('backend/pages/recommended/indexRecommended', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/recommendedSection/recommendedList', $data);
	}
	public function editRecommended($id){
		$data['title'] = 'Recommended Edit Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['recommendedsByID'] = $this->recommended_model->getRecommendedsByID($id);
		$data['editRecommended'] = $this->load->view('backend/pages/recommended/editRecommended', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/recommendedSection/recommendedEdit', $data);
	}
	public function updateRecommendedForm()
	{
		$data['rec_id'] = $this->input->post('rec_id');
		$data['rec_title'] = $this->input->post('rec_title');

		$id = $data['rec_id'];
		$rec_title = $data['rec_title'];
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('rec_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['rec_image']=$data_image['upload_data']['file_name'];
		if(empty($rec_title)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('recommended/editRecommended/'.$id);
		}else{
			$this->recommended_model->updateRecommended($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Recommended Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('recommended/editRecommended/'.$id);
		}

	}
	public function delRecommended($id){
		$this->recommended_model->delRecommendedsByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Recommended Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('recommended/listRecommended/');
	}


}
