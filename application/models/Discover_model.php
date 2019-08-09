<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discover_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function getDetailDevice(){
		$data = array(
            'mac' => $this->input->get('mac'),
            'address' => $this->input->get('address'),
        );
        if (isset($data['address'])){
        	$address = $data['address'];
        }else{
        	$address = $data['mac'];
        }
		$identity = $this->mikrotik->userdevice();
		print_r($identity['user_pwd']);
		?> 
			<h2><?php echo $identity;?></h2>
		<?php
	}

	function getDevices(){
		if($data = $this->db->get('tbl_mDevices')){
			return $data->result_array();
		}else{
			return false;
		}
	}

	function testPing($data){
		$identity =  array('mac-address' => $data['mac-address'], 'address4' => $data['address4'] );
		$status = $this->pingCount($identity);
		return $status;
	}

	function setDevice($data){
		foreach($data as $ngh){
			$map = array('mac-address',
				 'address4',
				 'identity',
				 'version',
				 'age',
				 'uptime',
				 'board',
				 'status');
			// GENERATE FIELDS LIST
	    	$field = implode($map,"`,`");
	    	
	    	// GENEREATE UPDATE IF DUPLICATE
	    	$dup = "";
	    	foreach($map AS $m){
	    		if (isset($ngh[$m])) {
	    			$dup .= ("`".$m."`='".$ngh[$m]."',");
	    		}else{
	    			$dup .= ("`".$m."`=' ',");
	    		}
	    		
	    	}
	    	$dup = substr($dup, 0,-1);

	    	// GENERATE VALUES
	    	$dt = array();
	    	foreach ($map as $_fld) {
	    		if(isset($ngh[$_fld]))
	    			$dt[] = $ngh[$_fld];
	    		else $dt[] = NULL;
	    	}

	    $sql = "INSERT INTO tbl_mDevices (`".$field."`) VALUES ('".implode($dt,"','")."') ON DUPLICATE KEY UPDATE ".$dup;	
	    $this->db->query($sql);
	   	//print_r($sql);
		}
    	
	}

	function pingCount($address){
		
		$ping = $this->mikrotik->pingDevice($address);
		$received = 0;
		foreach ($ping as $loss) {
			if($loss['received']>0){
				$received++;
			}
		}
		//$status  = preg_grep ('/^=status=(\w+)/i', $ping);		
		if ($received>0) {
			return 'connect';
		}else{
			return 'disconnect';	
		}
	}
	

}

/* End of file Discover_model.php */
/* Location: ./application/models/Discover_model.php */