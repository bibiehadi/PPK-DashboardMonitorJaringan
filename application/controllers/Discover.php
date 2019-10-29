<?php
defined('BASEPATH') OR exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'third_party/phpseclib');
include(APPPATH . '/third_party/phpseclib/Net/SSH2.php');

		// include('Net/SSH2.php');
class Discover extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata['status']!='login') {
 			redirect('login');
 		}
		$this->load->model('mikrotik_connect','mikrotik');
		$this->load->model('discover_model','discover');
	}

	public function index()
	{
		// $this->load->view('templates/devices_
		// print_r($a);
	}

	public function rebootDevice($address){
		if ($this->mikrotik->reboot($address)) {
			redirect('ourDevices','refresh');
		}
	}

	public function ourDevices(){	
		$this->load->view('templates/ourdevices_view');	
		// $devices = $this->mikrotik->get DeviceID();
		// print_r($devices);
	}

	public function ourDevicesJSON(){
		$devices = $this->discover->getDevices();
		// if (isset($devices)) {
		// 	foreach ($devices as $device) {
		// 			$connect['mac-address'] = $device['mac-address'];
		// 			$connect['identity'] = $device['identity'];
		// 			$connect['address4'] = $device['address4'];
		// 			$connect['version'] = $device['version'];
		// 			$connect['uptime'] = $device['uptime'];
		// 			$connect['board'] = $device['board'];
		// 			// $ping = $this->mikrotik->pingDevice($device['address4']);
		// 			// $lossCount = 0;
		// 			// print_r($ping);
		// 			// foreach ($ping as $loss) {
		// 			// 	if($loss['packet-loss']>0){
		// 			// 		$lossCount++;
		// 			// 	}
		// 			// }
		// 			// print_r($lossCount);
		// 			// $status  = preg_grep ('/^=status=(\w+)/i', $ping);		
		// 			// if ($lossCount>0) {
		// 			// 	$connect['device_status'] = 'disconnect';
		// 			// }else{
		// 			// 	$connect['device_status'] = 'connect';	
		// 			// } 
		// 			if (isset($device['address4'])) {
		// 				$connect['status'] = $this->discover->pingCount($device['address4']);
		// 			}else{
		// 				$connect['status'] = $this->discover->pingCount($device['mac-address']);
		// 			}
					
		// 			//$device = $connect;
		// 			$connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-identity='."'".$connect['identity']."'".' data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".' data-version='."'".$connect['version']."'".' ><i class="glyphicon glyphicon-k"><i>..<a> <a class="btn_reboot btn btn-sm btn-danger" href="javascript:void(0)" title="btnReboot" data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".'><i class="glyphicon glyphicon-k"><i>reboot<a>';

		// 			$ourDevices[]=$connect;
		// 		}

			$output = array(
					"draw" => $this->input->post('draw'),
					"data" => $devices,
				);
			// print_r($output);
			// echo "<pre>";
			echo json_encode($output);
		//}
	}

	public function findNewDevices()
	{
		$this->load->view('templates/finddevices_view');
	}

	public function findNewDevicesJSON()
 	{
 		$neighbors = $this->mikrotik->getNeighbors();
 		foreach ($neighbors as $neighbor) {
 			if (!$this->checkDeviceAvailable($neighbor['identity'])) {
		    	$connect['mac-address'] = $neighbor['mac-address'];
				if(isset($neighbor['identity'])){
					$connect['identity'] = $neighbor['identity'];
				}else{
					$connect['identity'] = '';
				}
				if (isset($neighbor['address4'])) {
					$connect['address4'] = $neighbor['address4'];
				}else{	
					$connect['address4'] = '';
				}
				if(isset($neighbor['version'])){
					$connect['version'] = $neighbor['version'];
				}else{
					$connect['version'] = '';	
				}
				if(isset($neighbor['age'])){
					$connect['age'] = $neighbor['age'];
				}else{
					$connect['age'] = '';	
				}
				if(isset($neighbor['uptime'])){
					$connect['uptime'] = $neighbor['uptime'];
				}else{
					$connect['uptime'] = '';	
				}
				if(isset($neighbor['board'])){
					$connect['board'] = $neighbor['board'];
				}else{
					$connect['board'] = '';	
				}
				$connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-identity='."'".$connect['identity']."'".' data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".' data-version='."'".$connect['version']."'".' data-board='."'".$connect['board']."'".'>..<a>';
				
				$devices[]=$connect;
			}			    		
		}
				
		$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $devices,
			);
		//$this->discover->testPing($neighbors);
		 //echo '<pre>';
		 //print_r($neighbors);
		echo json_encode($output);
 	}

 	public function checkDeviceAvailable($id){
 		$devicesDB = $this->discover->getDevices();
 		$count = 0;
 		foreach ($devicesDB as $device) {
 			if ($device['identity'] == $id) {
 				$count++;
 			}
 		}
 		if ($count>0) {
 			return true;
 		}else{
 			return false;
 		}
 	}

	public function updateDevicesJSON()
 	{
 		$neighbors = $this->mikrotik->getNeighbors();
 		// print_r($neighbors);
 		$connect = array();
 		foreach ($neighbors as $neighbor) {
 			if ($this->checkDeviceAvailable($neighbor['identity'])) {
 				$connect['mac-address'] = $neighbor['mac-address'];
				if(isset($neighbor['identity'])){
					$connect['identity'] = $neighbor['identity'];
				}else{
					$connect['identity'] = '';
				}
				if (isset($neighbor['address4'])) {
					$connect['address4'] = $neighbor['address4'];
				}else{	
					$connect['address4'] = '';
				}
				if(isset($neighbor['version'])){
					$connect['version'] = $neighbor['version'];
				}else{
					$connect['version'] = '';	
				}
				if(isset($neighbor['age'])){
					$connect['age'] = $neighbor['age'];
				}else{
					$connect['age'] = '';	
				}
				if(isset($neighbor['uptime'])){
					$connect['uptime'] = $neighbor['uptime'];
				}else{
					$connect['uptime'] = '';	
				}
				if(isset($neighbor['board'])){
					$connect['board'] = $neighbor['board'];
				}else{
					$connect['board'] = '';	
				}
				if (isset($neighbor['address4'])) {
					$connect['status'] = $this->discover->pingCount($neighbor['address4']);
				}else{
					$connect['status'] = $this->discover->pingCount($neighbor['mac-address']);
				}
				// $connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-identity='."'".$connect['identity']."'".' data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".' data-version='."'".$connect['version']."'".' ><i class="glyphicon glyphicon-k"><i>..<a> <a class="btn_reboot btn btn-sm btn-danger" href="javascript:void(0)" title="btnReboot" data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".'><i class="glyphicon glyphicon-k"><i>reboot<a>';
				$devices[]=$connect;
 			}
 		}
				
		$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $devices,
			);
		$this->discover->setDevice($devices);
		echo json_encode($output);
 	}

 	public function regDevice($mac)
 	{
 		$regDevices = $this->mikrotik->getDeviceID();
 		$same = 0;
 		foreach ($regDevices as $regDevice) {
 			if ($regDevice['device_id'] == $mac) {
 				$same++;
 			}
 		}
 		if ($same == 0) {
 			return true;
 		}else{
 			return false;
 		}
 	}

 	public function countPing($address){
 		$ping = $this->discover->pingCount($address);
		print_r($ping);					
 	}

 	public function anotherDevice(){
 		$resource = $this->mikrotik->getResource($ip='192.168.122.158',$username='admin',$password='',$port='8728');
 		echo json_encode($resource);
 	}

 	public function addDevice(){
 		$device = $this->input->post();
		if ($device) {
			$this->setDefaultSetting($device['address4']);
			if ($this->mikrotik->addDevice($device)) {
				$this->session->set_flashdata('success', 'Add a device successfully');
				redirect('discover/ourDevices','refresh');
			}
		}else{
			$this->session->set_flashdata('error', 'Something is wrong.');
		}
	}

 	// 	function mac_id($mac){
	// 	$mac_id = explode(':',$mac);
	// 	unset($mac_id[5]);
	// 	return implode(':', $mac_id);
	// }

	// function getDetailDevice(){
	// 	$data = array(
 //            'mac' => $this->input->post('mac'),
 //            'address' => $this->input->post('address'),
 //        );
 //        if (isset($data['address'])){
 //        	$address = $data['address'];
 //        }else{
 //        	$address = $data['mac'];
 //        }
 //        print_r($address);
	// 	$identity = $this->mikrotik->getDeviceIdentity($address);
	// 	print_r($identity);
	// 	

	// 	<div>
	// 		<h2><?php echo $identity[0]['name']; 
	// 	</div>


	// 	<?
	// }

	function setDefaultSetting($ip){
		$ssh = new Net_SSH2($ip);
		if (!$ssh->login('admin', '')) {
		    exit('Login Failed');
		}
		$config = $this->db->query("select config from tbl_config");
		$cfg = $config->result_array(); 
		foreach ($cfg as $key) {
			try {
				$ssh->exec($key['config']);
			} catch (Exception $e) {
				echo $e;
			}
		}

	}
}

/* End of file Devices.php */
/* Location: ./application/controllers/Devices.php */