<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		// $devices = $this->mikrotik->getDeviceID();
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
 		$ourDevices = $this->db->query("select `mac-address` from tbl_mDevices");
		if ($ourDevices->num_rows() > 0){
		   $mac = $ourDevices->result_array();
		}
 		$neighbors = $this->mikrotik->getNeighbors();
 		foreach ($neighbors as $neighbor) {
 			$count = 0;
 			foreach ($mac as $key) {
		    	if ($neighbor['mac-address'] == $key['mac-address']) {
		    		$count++;
		    	}
		    }
		    if ($count == 0) {
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
				$connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-identity='."'".$connect['identity']."'".' data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".' data-version='."'".$connect['version']."'".'>..<a>';
				
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

	public function updateDevicesJSON()
 	{
 		$neighbors = $this->discover->getDevices();
 		// print_r($neighbors);
 		$connect = array();
 		foreach ($neighbors as $neighbor) {
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
				$connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-identity='."'".$connect['identity']."'".' data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".' data-version='."'".$connect['version']."'".' ><i class="glyphicon glyphicon-k"><i>..<a> <a class="btn_reboot btn btn-sm btn-danger" href="javascript:void(0)" title="btnReboot" data-mac='."'".$connect['mac-address']."'".' data-ip='."'".$connect['address4']."'".'><i class="glyphicon glyphicon-k"><i>reboot<a>';
				$devices[]=$connect;
 					// }
				}
				
		$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $devices,
			);
		$this->discover->setDevice($devices);
		//$this->discover->testPing($neighbors);
		 //echo '<pre>';
		 //print_r($neighbors);
		echo json_encode($output);
 	}

 	// public function regDevice($mac)
 	// {
 	// 	$regDevices = $this->mikrotik->getDeviceID();
 	// 	$same = 0;
 	// 	foreach ($regDevices as $regDevice) {
 	// 		if ($regDevice['device_id'] == $mac) {
 	// 			$same++;
 	// 		}
 	// 	}
 	// 	if ($same == 0) {
 	// 		return true;
 	// 	}else{
 	// 		return false;
 	// 	}
 	// }

 	public function countPing($address){
 		$ping = $this->mikrotik->pingDevice($connect['address']);
		return ($ping);
					
 	}

 	public function anotherDevice(){
 		$resource = $this->mikrotik->getResource($ip='192.168.122.158',$username='admin',$password='',$port='8728');
 		echo json_encode($resource);
 	}

 	public function addDevice(){
 		$device = $this->input->post();
		if ($device) {
			$this->mikrotik->addDevice($device);
			redirect('discover/ourDevices','refresh');
		}else{
			echo "Error!!, can't add a device. ";
		}
	}

 	// 	function mac_id($mac){
	// 	$mac_id = explode(':',$mac);
	// 	unset($mac_id[5]);
	// 	return implode(':', $mac_id);
	// }

	function getDetailDevice(){
		$data = array(
            'mac' => $this->input->post('mac'),
            'address' => $this->input->post('address'),
        );
        if (isset($data['address'])){
        	$address = $data['address'];
        }else{
        	$address = $data['mac'];
        }
        print_r($address);
		$identity = $this->mikrotik->getDeviceIdentity($address);
		print_r($identity);
		?> 

		<div>
			<h2><?php echo $identity[0]['name']; ?></h2>
		</div>


		<?
	}
}

/* End of file Devices.php */
/* Location: ./application/controllers/Devices.php */