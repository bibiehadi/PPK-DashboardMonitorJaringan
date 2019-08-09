<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dashboard extends CI_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		if (isset($this->session->userdata)) {
 			redirect('login');
 		}
 		$this->load->model('mikrotik_connect','mikrotik');
 		
 	}

 	public function index()
 	{	
 		// $data['online'] = $this->getDeviceOnline();
 		// $data['all'] = $this->countDevices();
 		// $data['logs'] = $this->getLog();
 		// $data['user'] = $this->getUserCount();
 		// $data['active'] = $this->getActiveCount();
 		// $this->load->view('templates/dashboard_view',$data);
 		// $a = $this->mikrotik->connect();
 		// print_r($a);
 	}

 	public function getDeviceOnline(){
 		$this->load->model('discover_model','discover');
		$devices = $this->discover->getDevices();
		$count = 0;
		foreach ($devices as $device) {
			if ($device['status']=='connect') {
				$count++;
			}
		}
		// print_r($count);
		return $count;		
 	}

// get the number of all devices
 	public function countDevices(){
 		$this->load->model('discover_model','discover');
		$devices = $this->discover->getDevices();
 		if (isset($devices)) {
 			$allDevices = count($devices);
 			return $allDevices;
 		}else{
 			return 0;
 		}
 	}

 	public function getLog(){
 		$log = $this->mikrotik->getLogMikrotik();
 		return $log;
 	}

 	public function pushLog(){
 		$log = $this->mikrotik->getLogMikrotik();
 	}

 	public function getUserCount(){
 		$user = $this->mikrotik->getUsers();
 		$count = count($user);
 		return $count;
 	}

 	public function getActiveCount(){
 		$user = $this->mikrotik->getUserActive();
 		$count = count($user);
 		return $count;

 	}


 }
 
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */ ?>