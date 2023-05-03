<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('login_model');
	}
	public function index()
	{	
		if($this->session->has_userdata("login_ok")){
			$level_login = $this->session->userdata('login_level');
			if($level_login == 5  OR $level_login==4 OR $level_login==3 OR $level_login==2 OR $level_login==1){
				redirect(base_url("Admin/dasboard"));
			}
			if($level_login==0){
				redirect(base_url("store"));
			}
		}else{
			redirect(base_url("auth/login"));
		}
	}
	function register(){
		$this->load->view('register_view');
	}
	function login(){
		$this->load->view('login_view');
	}
	function admin(){
		$this->load->view('login_view');
	}
	function gologin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login['password'] = $password;
		$login['username'] = $username;
		$urlnya = strtok($_SERVER['HTTP_REFERER'], '?');
		$cek = $this->login_model->cek_login($login);
		if($cek == false){
			redirect($urlnya."?login=false");
		}else{
			$data_session = array(
				'username' => $cek['username'],
				'login_id' => $cek['id'],
				'login_level' => $cek['level'],
				'login_ok' =>true
				);
 
			$this->session->set_userdata($data_session);
			$level_login = $cek['level'];
			if($level_login == 5  OR $level_login==4 OR $level_login==3 OR $level_login==2 OR $level_login==1){
				redirect(base_url("Admin/dasboard"));
			}
			if($level_login==0){
				redirect(base_url("store"));
			}
		}
	}
	function goregister(){
		$register['username'] = $this->input->post('username');
		$register['email'] = $this->input->post('email');
		$register['password'] = $this->input->post('password');
		$register['alamat'] =$this->input->post('alamat');
		$register['kecamatan'] = $this->input->post('kec');
		$register['kota'] =$this->input->post('kota');
		$register['prov'] = $this->input->post('prov');
		$register['postal'] = $this->input->post('postal');
		$urlnya = strtok($_SERVER['HTTP_REFERER'], '?');
		$cek = $this->login_model->register($register);
		if($cek == false){
			redirect($urlnya."?register=false");
		}else{
			redirect($urlnya."?");
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
}
