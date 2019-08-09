<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model','login');
		
	}

	public function index()
	{
		$this->load->view('templates/login_view');
	}

	public function doLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->login->cek_login("tbl_admins",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
 
			redirect(site_url("dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */