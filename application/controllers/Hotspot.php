<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Hotspot extends CI_Controller{
 	
 	function __construct()
 	{
		parent::__construct();
 		$this->load->model('mikrotik_connect','mikrotik');
 		$this->load->model('hotspot_model','hotspot');
 	}

 	public function index()
	{	
 		
	}

/**
$neighbors = $this->mikrotik->getNeighbours();
 		// print_r($neighbors);
 		$connect = array();
 		$devices = array();
 		foreach ($neighbors as $neighbor) {
 					$devID = $this->mac_id($neighbor['mac-address']);
 					if ($this->regDevice($devID)) {
 						$connect['device_id'] = $devID;
						$connect['device_identity'] = $neighbor['identity'];
						$connect['device_MAC'] = $neighbor['mac-address'];
						$connect['device_IPv4'] = $neighbor['address'];
						$connect['device_OSVersion'] = $neighbor['version'];
						$device = $connect;
						$connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-id='."'".$connect['device_id']."'".' data-identity='."'".$connect['device_identity']."'".' data-mac='."'".$connect['device_MAC']."'".' data-ip='."'".$connect['device_IPv4']."'".' data-version='."'".$connect['device_OSVersion']."'".'><i class="glyphicon glyphicon-k"><i>..<a>';
						$devices[]=$connect;
 					}
				}

		$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $devices,
			);
		// print_r($output);
		echo json_encode($output);
**/
	public function users()
	{
		$data['users'] = $this->mikrotik->getUsers();
		$this->load->view('templates/user_view',$data);
	}
 	public function usersJSON(){
 		$users = $this->mikrotik->getUsers();
 	// 	foreach ($users as $user) {
 	// 					$data['user_id'] = $user['.id'];
 	// 				// 	if (!$user['server']) {
 	// 				// 		$data['user_server'] = '';
  	// 				// 		}else{
		// 				// 	$data['user_server'] = $user['server'];
		// 				// }
		// 				$data['user_name'] = $user['name'];
		// 				// $data['user_address'] = $user['address'];
		// 				// $data['user_mac'] = $user['mac-address'];
		// 				// $data['user_profile'] = $user['profile'];
		// 				$data['user_uptime'] = $user['uptime'];
		// 				// $device = $user;
		// 				$data['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-id='."'".$data['user_id']."'".'><i class="glyphicon glyphicon-k"><i>..<a>';
		// 				$allUser[]=$data;
 	// 				}


		// $output = array(
		// 		"draw" => $this->input->post('draw'),
		// 		"data" => $allUser,
		// 	);
		// // print_r($output);
		// echo json_encode($output);
 		// print_r($users);
 	}

 	public function userProfiles(){
 		$data['profiles'] = $this->hotspot->getProfiles();
 		// print_r($data['profiles']);
 		// echo '<pre>';
 		$this->load->view('templates/userprofile_view',$data);
 	}

 	public function userProfilesJSON(){
 		$profiles = $this->mikrotik->getUserProfiles();
 		// print_r($profiles);
 		$prfl = array();
 		foreach ($profiles as $profile) {
 				$prfl['.id'] = $profile['.id'];
				if(isset($profile['name'])){
					$prfl['name'] = $profile['name'];
				}else{
					$prfl['name'] = '';
				}
				if (isset($profile['idle-timeout'])) {
					$prfl['idle-timeout'] = $profile['idle-timeout'];
				}else{	
					$prfl['idle-timeout'] = '';
				}
				if (isset($profile['keepalive-timeout'])) {
					$prfl['keepalive-timeout'] = $profile['keepalive-timeout'];
				}else{	
					$prfl['keepalive-timeout'] = '';
				}
				if(isset($profile['status-autorefresh'])){
					$prfl['status-autorefresh'] = $profile['status-autorefresh'];
				}else{
					$prfl['status-autorefresh'] = '';	
				}
				if(isset($profile['shared-users'])){
					$prfl['shared-users'] = $profile['shared-users'];
				}else{
					$prfl['shared-users'] = '';	
				}
				if(isset($profile['add-mac-cookie'])){
					$prfl['add-mac-cookie'] = $profile['add-mac-cookie'];
				}else{
					$prfl['add-mac-cookie'] = '';	
				}
				if(isset($profile['mac-cookie-timeout'])){
					$prfl['mac-cookie-timeout'] = $profile['mac-cookie-timeout'];
				}else{
					$prfl['mac-cookie-timeout'] = '';	
				}
				if(isset($profile['rate-limit'])){
					$prfl['rate-limit'] = $profile['rate-limit'];
				}else{
					$prfl['rate-limit'] = '';	
				}
				// $prfl['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-name='."'".$prfl['name']."'".' data-mac='."'".$prfl['.id']."'".' data-ip='."'".$prfl['idle-timeout']."'".' data-status-autorefresh='."'".$prfl['status-autorefresh']."'".' ><i class="glyphicon glyphicon-k"><i>..<a> <a class="btn_reboot btn btn-sm btn-danger" href="javascript:void(0)" title="btnReboot" data-mac='."'".$prfl['.id']."'".' data-ip='."'".$prfl['idle-timeout']."'".'><i class="glyphicon glyphicon-k"><i>reboot<a>';
				$data[]=$prfl;
 					// }
				}
				
		$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $data,
			);
		$this->hotspot->setProfile($data);
		//$this->discover->testPing($neighbors);
		 //echo '<pre>';
		 //print_r($neighbors);
		//echo json_encode($output);
 	}

 	public function remUserProfile($id)
 	{
 		$rem = $this->mikrotik->remUserProfile($id);
 	}

 	public function userActive(){
 		$data['active'] = $this->mikrotik->getUserActive();
 		$this->load->view('templates/useractive_view',$data);
 		//print_r($data['active']);
 	}
 	public function getCountUsers(){
 		$user = $this->mikrotik->countUsers();
 		print_r($user['count_hotspot_user']);	
 	}

 } ?>