<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discovery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->connect();
		// $this->load->model('mikrotik_model');
	}

	public function index(){
		$this->load->view('templates/login_view');
	}

	public function disconnected_devices()
	{
		$disconnect = array();
		$devices = $this->mikrotik_model->list_devices();
		foreach ($devices as $device) {
			if ($this->cek_divices($device['mac_address'])) {
				// echo $device['mac_address']."<br>";
				// echo "connect";
				// echo ($this->cek_divices($device['mac_address']));
			}else if($this->cek_divices($device['mac_address'])==false){
				$disconnect['identity'] = $device['identity'];
				$disconnect['mac-address'] = $device['mac_address'];
				$disconnect['address'] = $device['address'];
				$disconnect['version'] = '';
				$disconnect['status']= 'disconnect';
				$disconnect['action']= '';
				// echo ($this->cek_divices($device['mac_address']));
			}
			if ($disconnect == null) {
				$disconnects=null;
			}else{
			$disconnects[]=$disconnect;
			}
		}
		return $disconnects;
	}

	public function result(){
		$API = $this->routerosapi;
		$API->write('/ip/neighbor/print');
		$neighbors = $API->read();
		$disconnects = $this->disconnected_devices();

		if ($neighbors == null){
			// echo "kosong";
			$all_devices  = $disconnects;
			$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $all_devices,
			);

			echo json_encode($output);

		}else{
			foreach ($neighbors as $neighbor) {
				// print_r($this->mikrotik_model->db_devices($neighbor['mac-address']);
				if ($this->mikrotik_model->db_devices($neighbor['mac-address'])) {
					$connect['identity'] = $neighbor['identity'];
					$connect['mac-address'] = $neighbor['mac-address'];
					$connect['address'] = '' ;
					$connect['version'] = $neighbor['version'];
					$connect['status']= 'connect';
					$connect['action']= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="remove" onclick="modal('."'".$neighbor['identity']."'".')"><i class="glyphicon glyphicon-k"><i>..<a>';
					// echo "registered"; modal('."'".$connect['address']."'".')
				}else{
					$connect['identity'] = $neighbor['identity'];
					$connect['mac-address'] = $neighbor['mac-address'];
					$connect['address'] = '';
					$connect['version'] = $neighbor['version'];
					$connect['status']= 'unregistered';
					$connect['action']= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="remove" onclick="modal('."'".$neighbor['identity']."'".')"><i class="glyphicon glyphicon-k"><i>..<a>';
					// echo "unregistered";
				}
				// $connects[]=$connect;
				// if ($connect == null) {
				// 	$connects=null;
				// }else{
					$connects[]=$connect;
				// }
			}
			if ($disconnects == null) {
				$all_devices = $connects;
			}else{
				$all_devices = array_merge($connects,$disconnects);	
			}

			$output = array(
				"draw" => $this->input->post('draw'),
				"data" => $all_devices,
			);

			echo json_encode($output);

			// $API->disconnect();
		}
	}

	public function cek(){
		$API = $this->routerosapi;
		// $this->connect();
		// $API->write('/ip/neighbor/print');
		// $connect = $API->read();

						// $log = $API->comm("/log/print");
						// $clog = count($log);
						// for($a=0;$a<=$clog;$a++){ 
						// echo $log[$a]["message"]."<br>";
						//  }

		$log = $API->comm("/ip/hotspot/active/getall");
						$clog = count($log);
						// for($a=0;$a<=$clog;$a++){ 
						// echo $log[$a]["message"]."<br>";
						//   }
						print_r($clog);
		print_r($log);

		// print json_encode($connect);
	}

	public function cek_divices($device_mac){
		$API = $this->routerosapi;
		// $this->connect();
		$API->write('/ip/neighbor/print');
		$connect = $API->read();
		// print_r($connect);
		$cek = 0;
			foreach ($connect as $neighbor) {
				if ($device_mac == $neighbor['mac-address']) {
				// 	print_r($neighbor['mac-address']);
				// echo " = $device_mac ";
				// 	echo ' : connect <br>';
					$cek++;
				}else{
				// 	print_r($neighbor['mac-address']);
				// echo " = $device_mac";
				// 	echo ': gak connect <br>';
				}
			}
			if ($cek>0) {
				return true;
			}else{
				return false;
			}
	}

	public function device_detail($mac){
		$API = $this->routerosapi;
		$API->write('/ip/neighbor/print');
		$connect = $API->read();
		$cek = 0;
			foreach ($connect as $neighbor) {
				if ($neighbor['mac-address']==$mac) {
					$connect['identity'] = $neighbor['identity'];
					$connect['mac-address'] = $neighbor['mac-address'];
					$connect['address'] = $neighbor['address'];
					$connect['version'] = $neighbor['version'];
					$cek++;
				}else{
					$gk = $neighbor['mac-address'];
				}
			}
			if ($cek>0) {
				echo json_encode($connect);
			}else{
				return false;
			}
		

	}

	function mac_id($mac){
		$mac_id = explode(':',$mac);
		unset($mac_id[5]);
		return implode(':', $mac_id);
	}

}

/* End of file Discovery.php */
/* Location: ./application/controllers/Discovery.php */