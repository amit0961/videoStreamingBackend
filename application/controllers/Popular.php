<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popular extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('popular_model');

		$data = array();
		$this->load->helper('url','form','file');
		if (!$this->session->userdata('userlogin')){
			redirect('user/login');
		}
	}
	public function addPopular(){
		$data = array();
		$data['title'] = 'Popular Add Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['addPopular'] = $this->load->view('backend/pages/popular/addPopular', '', true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/popularSection/popularAdd', $data);
	}
	public function addPopularsForm(){
		$data['pop_title'] = $this->input->post('pop_title', true);
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('pop_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['pop_image']=$data_image['upload_data']['file_name'];
		$this->popular_model->savePopular($data);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Popular Added Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('popular/addPopular');
	}
	public function listPopular(){
		$data = array();
		$data['title'] = 'Popular List Section';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['popularsData'] = $this->popular_model->getAllPopularsData();
		$data['indexPopular'] = $this->load->view('backend/pages/popular/indexPopular', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/popularSection/popularList', $data);
	}
	public function editPopular($id){
		$data['title'] = 'Popular Edit Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['popularsByID'] = $this->popular_model->getPopularsByID($id);
		$data['editPopular'] = $this->load->view('backend/pages/popular/editPopular', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/popularSection/popularEdit', $data);
	}
	public function updatePopularForm()
	{
		$data['pop_id'] = $this->input->post('pop_id');
		$data['pop_title'] = $this->input->post('pop_title');

		$id = $data['pop_id'];
		$pop_title = $data['pop_title'];
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('pop_image')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_image = array('upload_data' => $this->upload->data());
		}
		$data['pop_image']=$data_image['upload_data']['file_name'];
		if(empty($pop_title)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('popular/editPopular/'.$id);
		}else{
			$this->popular_model->updatePopular($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Popular Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('popular/editPopular/'.$id);
		}

	}
	public function delPopular($id){
		$this->popular_model->delPopularsByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Popular Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('popular/listPopular/');
	}


}
