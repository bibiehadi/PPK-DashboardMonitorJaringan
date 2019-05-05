<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dashboard extends CI_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('mikrotik_connect','mikrotik');
 		
 	}

 	public function index()
 	{
 		$this->load->view('templates/dashboard_view');
 		// $a = $this->mikrotik->connect();
 		// print_r($a);
 	}
 	
 	public function findDevices()
 	{
 		$neighbors = $this->mikrotik->getNeighbours();
 		print_r($neighbors);
 		$connect = array();
 		foreach ($neighbors as $neighbor) {
					$connect['identity'] = $neighbor['identity'];
					$connect['mac-address'] = $neighbor['mac-address'];
					$connect['address'] = $neighbor['address'] ;
					$connect['version'] = $neighbor['version'];
					$connect['status']= 'connect';
					$connect['action']= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="remove" onclick="modal('."'".$neighbor['identity']."'".')"><i class="glyphicon glyphicon-k"><i>..<a>';
					$devices[]=$connect;
				}
 		json_encode($devices);
 	}

 }
 
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */ ?>