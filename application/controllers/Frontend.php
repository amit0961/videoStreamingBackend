<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('exclusive_model');
		$this->load->model('newarrival_model');
		$this->load->model('popular_model');
		$this->load->model('recommended_model');
		$this->load->helper('url','form','file');
	}
	public function index()
	{
		$this->home();
	}
	public function home()
	{
		$data = array();
		$data['title'] = 'Video Motion System';
		$data['header'] = $this->load->view('frontend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('frontend/pages/inc/sidebar', '', true);
//		$data['channelsData'] = $this->channel_model->getAllChannelsData();
//		$data['videosData'] = $this->video_model->getAllVideosData();
		$data['recommendedsData'] = $this->recommended_model->getAllRecommendedsData();
		$data['content'] = $this->load->view('frontend/pages/content', $data, true);
		$data['footer'] = $this->load->view('frontend/pages/inc/footer', '', true) ;
		$this->load->view('frontend/index',$data);
	}


}
