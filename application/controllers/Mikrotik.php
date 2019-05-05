<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mikrotik_connect','mikrotik');
	}

	public function index()
	{
		$this->load->view('templates/devices_view');
	}

	public function ourDevices(){
		$this->load->view('templates/ourdevices_view');	

		// $devices = $this->mikrotik->getDeviceID();
		// print_r($devices);
	}

	public function ourDevicesJSON(){
		$devices = $this->mikrotik->getDeviceDB();
		if ($devices) {
			foreach ($devices as $device) {
					$connect['device_id'] = $device['device_id'];
					$connect['device_identity'] = $device['device_identity'];
					$connect['device_MAC'] = $device['device_MAC'];
					$connect['device_IPv4'] = $device['device_IPv4'];
					$connect['device_OSVersion'] = $device['device_OSVersion'];
					$device = $connect;
					// $connect['action']= '<a class="add_device btn btn-sm btn-primary" href="javascript:void(0)" title="addDevice" data-id='."'".$connect['device_id']."'".' data-identity='."'".$connect['device_identity']."'".' data-mac='."'".$connect['device_MAC']."'".' data-ip='."'".$connect['device_IPv4']."'".' data-version='."'".$connect['device_OSVersion']."'".'><i class="glyphicon glyphicon-k"><i>..<a>';
					// $ping = $this->mikrotik->pingDevice($connect['device_IPv4']);
					// echo json_encode($ping['packet-loss']);
					$ourDevices[]=$connect;
				}

			$output = array(
					"draw" => $this->input->post('draw'),
					"data" => $ourDevices,
				);
			// print_r($output);
			echo json_encode($output);
		}
	}

	public function findNewDevices()
	{
		$this->load->view('templates/finddevices_view');
	}

	public function findDevicesJSON()
 	{
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
 	}

 	public function countPing($address){
 		$ping = $this->mikrotik->pingDevice($connect['address']);
		return ($ping);
					
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

 	public function anotherDevice(){
 		$resource = $this->mikrotik->getResource($ip='192.168.122.158',$username='admin',$password='',$port='8728');
 		echo json_encode($resource);
 	}

 	public function addDevice(){
 		$device = $this->input->post();
		if ($device) {
			$this->mikrotik->addDevice($device);
			redirect('mikrotik/ourDevices','refresh');
		}else{
			echo "Error!!, can't add a device. ";
		}
	}

 	function mac_id($mac){
		$mac_id = explode(':',$mac);
		unset($mac_id[5]);
		return implode(':', $mac_id);
	}
}

/* End of file Devices.php */
/* Location: ./application/controllers/Devices.php */