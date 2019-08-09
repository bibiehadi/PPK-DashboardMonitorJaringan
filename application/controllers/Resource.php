<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mikrotik_connect','mikrotik');	
	}

	public function index()
	{
		$this->load->view('templates/mainresource_view');	
	}

	public function mainResource(){
		$resource = $this->mikrotik->getResource();
		$resource1 = $this->mikrotik->getResource($ip='192.168.1.1',$username='api',$password='stikimonitor',$port='8728');
		print_r($resource[0]);
		print_r($resource1);
	}

}

/* End of file Resource.php */
/* Location: ./application/controllers/Resource.php */