<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');

		$data = array();
		$this->load->helper('url','form','file');
		if (!$this->session->userdata('userlogin')){
			redirect('user/login');
		}
	}
	public function addVideo(){
		$data = array();
		$data['title'] = 'Video Add Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['addVideos'] = $this->load->view('backend/pages/video/addVideo', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/videoSection/videoAdd', $data);
	}
	public function addVideoForm(){
		$data['scvid_title'] = $this->input->post('scvid_title', true);
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'mp4';
		$config['max_size'] ='102400';
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('scvid_file')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_file = array('upload_data' => $this->upload->data());
			$data['scvid_file']=$data_file['upload_data']['file_name'];
		}

		$this->video_model->saveVideo($data);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Video Added Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('video/listVideos/');
	}
	public function listVideos(){
		$data = array();
		$data['title'] = 'Video List Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['videosData'] = $this->video_model->getAllVideosData();
		$data['indexVideos'] = $this->load->view('backend/pages/video/indexVideo', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/videoSection/videoList', $data);
	}
	public function editVideo($id){
		$data['title'] = 'Video Update Section' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['videosByID'] = $this->video_model->getVideosByID($id);
		$data['editVideos'] = $this->load->view('backend/pages/video/editVideo', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/videoSection/videoEdit', $data);
	}
	public function updateVideosForm(){
		$data['scvid_id'] = $this->input->post('scvid_id');
		$data['scvid_title'] = $this->input->post('scvid_title');

		$id = $data['scvid_id'];
		$scvid_title = $data['scvid_title'];
		//image section
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'mp4';
		$config['max_size'] ='102400';
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('scvid_file')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_file = array('upload_data' => $this->upload->data());
			$data['scvid_file']=$data_file['upload_data']['file_name'];
		}

		if(empty($scvid_title)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Please insert the file first ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('video/editVideo/'.$id);
		}else{
			$this->video_model->updateVideo($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Video Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('video/editVideo/'.$id);
		}
	}
	public function delVideos($id){
		$this->video_model->delVideosByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Videos Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('video/listVideos/');
	}


}
