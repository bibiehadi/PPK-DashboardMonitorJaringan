<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dashboard extends CI_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		if ($this->session->userdata['status']!='login') {
 			redirect('login');
 		}
 		$this->load->model('mikrotik_connect','mikrotik');
 		
 	}

 	public function index()
 	{	
 		$count = $this->getHotspotCount();
 		$data['online'] = $this->getDeviceOnline();
 		$data['all'] = $this->countDevices();
 		// $data['logs'] = $this->getLog();
 		$data['user'] = $count['count_hotspot_user'];
 		$data['active'] = $count['count_hotspot_active'];
 		$data['connect'] = $count['count_user_connect'];
 		$this->load->view('templates/dashboard_view',$data);
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

 	function getLog(){
 		$log = $this->mikrotik->getLogMikrotik();
 		echo json_encode(array(
			'log'=>$this->load->view('table/log_router',array('logs'=>$log),true),
		));
 	}

 	function getHotspotCount(){
 		$count = $this->mikrotik->countUsers();
 		return $count;
 	}

 	function getAllResource(){
 		$userRouter = $this->db->query("select username,password from tbl_mainRouter where id=2");
		if ($userRouter->num_rows() > 0){
		   $koneksi = $userRouter->row_array(); 
		}
		$username = $koneksi['username'];
		$password = $koneksi['password'];
		$this->load->model('discover_model','discover');
		$devices = $this->discover->getDevices();
		foreach ($devices as $device) {
			$resource = $this->mikrotik->getResource($device['address4'],$username,$password);
			// $resource = $this->mikrotik->getResource();
			// print_r($resource);
			if (isset($device['identity'])) {
				$data['identity'] = $device['identity'];
			}
			if (isset($resource[0]['cpu-load'])) {
				$data['cpu-load'] = $resource[0]['cpu-load'];
				$ram = (($resource[0]['total-memory']-$resource[0]['free-memory'])/$resource[0]['total-memory'])*100;
				$data['memory-load'] = round($ram,2);
			}else{
				$data['cpu-load'] = 0;
				$data['memory-load'] = 0;
			}
			$allrouter[] = $data;
		}
 		
 		// print_r($allrouter);
		//return $allrouter;
		echo json_encode(array(
			'cpu'=>$this->load->view('table/cpu_load',array('resources'=>$allrouter),true),
			'memory'=>$this->load->view('table/memory_load',array('resources'=>$allrouter),true),
		));
 	}


 }
 
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */ ?>