<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotik_connect extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function connect($ip='192.168.1.1',$username='api',$password='stikimonitor',$port='8728'){
		if ($this->routerosapi->connect($ip,$username,$password,$port)) {
			return true;
		}else{
			return false;
		}
	}

	public function addDevice($data){
		if ($this->db->insert('tb_devices',$data)) {
			return true;
		}else{
			return false;
		}
	}

	

	public function getDeviceID(){
		$this->db->select('device_id');
		$data = $this->db->get('Mikrotik_Device');
		return $data->result_array();
	}

	public function getNeighbours(){
		if ($this->connect()) {
			$API = $this->routerosapi;
			$API->write('/ip/neighbor/print');
			$connect = $API->read();
			// print_r($connect);
			$API->disconnect();
			return $connect;
			// $cek = 0;
			// 	foreach ($connect as $neighbor) {
			// 		if ($device_mac == $neighbor['mac-address']) {
			// 		// 	print_r($neighbor['mac-address']);
			// 		// echo " = $device_mac ";
			// 		// 	echo ' : connect <br>';
			// 			$cek++;
			// 		}else{
			// 		// 	print_r($neighbor['mac-address']);
			// 		// echo " = $device_mac";
			// 		// 	echo ': gak connect <br>';
			// 		}
			// 	}
			// 	if ($cek>0) {
			// 		return true;
			// 	}else{
			// 		return false;
			// 	}
		}else{
			return false;
		}
		
	}

	public function getResource($ip='192.168.1.254',$username='api',$password='stikimonitor',$port='8728')
	{
		if ($this->connect($ip,$username,$password,$port)) {
			$API = $this->routerosapi;
			$result = $API->comm("/system/resource/print");
		   	return $result;
		   	$API->disconnect();
		}else{
			return false;
		}
		
	}

	public function getTrafficInterface($interface='ether1'){
		if ($this->connect()) {
			$API->write("/interface/monitor-traffic",false);
		   	$API->write("=interface=".$interface,false);  
		   	$API->write("=once=",true);
		   	$READ = $API->read(false);
		   	$ARRAY = $API->parse_response($READ);
			if(count($ARRAY)>0){  
				$rx = number_format($ARRAY[0]["rx-bits-per-second"]/1024,1);
				$tx = number_format($ARRAY[0]["tx-bits-per-second"]/1024,1);
				$rows['name'] = 'Tx';
				$rows['data'][] = $tx;
				$rows2['name'] = 'Rx';
				$rows2['data'][] = $rx;
			}else{  
				echo $ARRAY['!trap'][0]['message'];	 
			}
			$result = array();
			array_push($result,$rows);
			array_push($result,$rows2);
			$API->disconnect();
			return $result;
		}else{
			return false;
		}
	}

	public function getLogMikrotik(){
		if ($this->connect()) {
			$API = $this->routerosapi;
			$logs = $API->comm('/log/print');
			return $logs;
		}else{
			return false;
		}
	}

	public function pingDevice($identity='0C:62:A7:F0:64:00')
	{
		if ($this->connect()) {
			$API = $this->routerosapi;

			$API->write('/ping',false);
			$API->write('=address='.$identity,false); 
			$API->write('=count=3',false);
			$API->write('=interval=1');
			$ARRAY4 = $API->read();
			$API->disconnect();
			return $ARRAY4;
		}else{
			return false;
		}
		
	}

	public function getDeviceIdentity($ip)
	{
		$data = $this->userDevice();
		try {
			if ($this->connect($ip,$data['user_usrnm'], $data['user_pwd'], $data['user_port'])) {
				$API = $this->routerosapi;
				$API->write("/system/identity/print");
			   	$READ = $API->read();
			   	return $READ;
			   	$API->disconnect();
		   }else{
		   	echo 'disconnect';
		   }
		} catch (Exception $e) {
			return 'Error : '.$e;
		}
		
	}

// Get Setting 
	public function userDevice(){
		$data = $this->db->get_where('tb_userDevice', array('id'=> 1));
		if($data){
			return $data->row_array();
		}else{
			return false;
		}
	}

	public function reboot($ip='')
	{
		$userDevice = $this->userDevice();
		if ($this->connect($ip, $userDevice['user_usrnm'], $userDevice['user_pwd'], $userDevice['user_port'])) {
			$API = $this->routerosapi;
			$API->write('/system/reboot');
			$ARRAY4 = $API->read();
			$API->disconnect();
			return $ARRAY4;
		}else{
			return false;
		}
	}
// >>>>> HOTSPOT 
	public function getUsers()
	{
		if ($this->connect()) {
			$API = $this->routerosapi;
			$API->write('/ip/hotspot/user/print');
			$users = $API->read();
			$API->disconnect();
			return $users;
		}else{
			return false;
		}
	}

	public function getUserProfiles()
	{
		if ($this->connect()) {
			$API = $this->routerosapi;
			$API->write('/ip/hotspot/user/profile/print');
			$profiles = $API->read();
			$API->disconnect();
			return $profiles;
		}else{
			return false;
		}
	}

	public function removeUserProfile($id){
		if ($this->connect()) {
			$API = $this->routerosapi;
			$API->write('ip/hotspot/profile/remove',false);
			$API->write('=.id='. $id);
			$write = $API->read();
			return $write;
		}
	}

	public function getUserActive()
	{
		if ($this->connect()) {
			$API = $this->routerosapi;
			$API->write('/ip/hotspot/active/print');
			$active = $API->read();
			$API->disconnect();
			return $active;
		}else{
			return false;
		}
	}

	public function countUsers(){
		if ($this->connect()) {
			$API = $this->routerosapi;
			$users = $API->comm('/ip/hotspot/user/print', array(
                "count-only" => ''
            ));
            $count['count_hotspot_user'] = isset($users) ? $users : 0;
			
			$active = $API->comm('/ip/hotspot/active/print', array(
                "count-only" => ''
            ));
            $count['count_hotspot_active'] = isset($active) ? $active : 0;					
			$count['persen_hotspot_active'] = $count['count_hotspot_active'] / $count['count_hotspot_user'] * 100;
			
			$array1 = $API->comm('/ip/neighbor/print');
			return $count;
		}
	}


}

/* End of file Mikrotik_connect.php */
/* Location: ./application/models/Mikrotik_connect.php */
?>