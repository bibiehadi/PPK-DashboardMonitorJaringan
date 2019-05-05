<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotik_connect extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function connect($ip='192.168.122.59',$username='admin',$password='',$port='8728'){
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

	public function getDeviceDB(){
		if($data = $this->db->get('tb_devices')){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getDeviceID(){
		$this->db->select('device_id');
		$data = $this->db->get('tb_devices');
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

	public function getResource($ip='192.168.122.59',$username='admin',$password='',$port='8728')
	{
		if ($this->connect($ip,$username,$password,$port)) {
			$API = $this->routerosapi;
			$API->write("/ip/address/print");
		   	$READ = $API->read(false);
		   	return $READ;
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
			# code...
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
			$ARRAY4 = $API->read(false);
			// echo "<pre>". print_r($ARRAY4) ." </pre>";
			$API->disconnect();
			return $ARRAY4;
		}else{
			return false;
		}
		
	}

}

/* End of file Mikrotik_connect.php */
/* Location: ./application/models/Mikrotik_connect.php */
?>