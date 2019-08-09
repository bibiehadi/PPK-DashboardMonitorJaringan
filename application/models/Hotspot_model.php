<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotspot_model extends CI_Model {

	function getProfiles(){
		if($data = $this->db->get('tbl_usrProfile')){
			return $data->result_array();
		}else{
			return false;
		}
	}

	function setProfile($data){
		foreach($data as $ngh){
			$map = array('.id',
				 'name',
				 'idle-timeout',
				 'keepalive-timeout',
				 'status-autorefresh',
				 'shared-users',
				 'add-mac-cookie',
				 'mac-cookie-timeout',
				 'rate-limit');
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

	    $sql = "INSERT INTO tbl_usrProfile (`".$field."`) VALUES ('".implode($dt,"','")."') ON DUPLICATE KEY UPDATE ".$dup;	
	    $this->db->query($sql);
	   	//print_r($sql);
		}
    	
	}
	

}

/* End of file Hotspot_model.php */
/* Location: ./application/models/Hotspot_model.php */