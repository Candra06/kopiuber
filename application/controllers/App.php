<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
  	{
		  parent::__Construct();
		  $this->load->helper("Response_helper");
		  $this->load->helper("Input_helper");
			if($_SERVER['REQUEST_METHOD'] == "POST"){
			$this->login();
			}
  	}

	public function index()
	{
		// echo md5("test");
		$data['title'] = "Kopi Uber";
		$data['content'] = "login/index";
		$this->load->view('login/index',$data);
		
	}

	public function login(){
		$d = $_POST;
		$cekData = $this->db->get_where("user", ['username' => $d['username']])->row_array();
		if($cekData < 1){
			$this->session->set_flashdata("message", ['warning', 'Username anda tidak Terdaftar']);
		}else if(md5($d['password']) != $cekData['password']){
			$this->session->set_flashdata("message", ['warning', 'Password anda Salah']);
		}else if($cekData['status'] == 2){
			$this->session->set_flashdata("message", ['warning', 'Akun anda belum disetujui oleh admin']);
		}else if($cekData['status'] == 3){
			$this->session->set_flashdata("message", ['warning', 'Akun anda tidak tersedia']);
		}else if($cekData['level'] == 2){
			$_SESSION['kd'] = $cekData['kd_user'];
			$_SESSION['username'] = $cekData['username'];
			$_SESSION['nama'] = $cekData['nama'];
			$_SESSION['level'] = $cekData['level'];
			echo json_encode();
			redirect(base_url('dashboard'));
		}else if($cekData['level'] == 1){
			$_SESSION['kd'] = $cekData['kd_user'];
			$_SESSION['username'] = $cekData['username'];
			$_SESSION['nama'] = $cekData['nama'];
			$_SESSION['level'] = $cekData['level'];
			redirect(base_url('dashboard1'));
		}elseif ($cekData['level'] == 3) {
			$_SESSION['kd'] = $cekData['kd_user'];
			$_SESSION['username'] = $cekData['username'];
			$_SESSION['nama'] = $cekData['nama'];
			$_SESSION['level'] = $cekData['level'];
			redirect(base_url('dashboard2'));
		}elseif ($cekData['level'] == 4) {
			$_SESSION['kd'] = $cekData['kd_user'];
			$_SESSION['username'] = $cekData['username'];
			$_SESSION['nama'] = $cekData['nama'];
			$_SESSION['level'] = $cekData['level'];
			redirect(base_url('home_mitra'));
		}elseif ($cekData['level'] == 5) {
			$_SESSION['kd'] = $cekData['kd_user'];
			$_SESSION['username'] = $cekData['username'];
			$_SESSION['nama'] = $cekData['nama'];
			$_SESSION['level'] = $cekData['level'];
			redirect(base_url('home_anggota'));
		}
	}
	public function logout(){
		session_destroy();
		redirect(base_url());
	}
}
