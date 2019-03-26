<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
			$this->load->model("M_front");
			$this->load->model("mAnggota");
			$this->load->model("mProdi_Fakultas");
			// if($_SERVER['REQUEST_METHOD'] == "POST"){
			// $this->register();
			// }
  	}

	public function index()
	{
		// echo md5("test");
		$this->load->model("M_front");
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/index";
		$this->load->view('frontend/index',$data);
		
	}

	public function registrasi()
	{
		$this->load->model("M_front");
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/register";
		$data['data_fakultas'] = $this->mProdi_Fakultas->tampilDataFakultas();
		$data['data_prodi'] = $this->mProdi_Fakultas->tampilDataProdi();
		$this->load->view('frontend/index',$data);
	}

	public function register(){
		$data = $this->mAnggota->registerAnggota();
		echo json_encode($data);
	}
	public function test(){
				echo "workds";
	}

	// public function daftar_anggota(){
	// 	$data = $this->M_front->daftarAnggota();
	// 	echo json_encode($data);
	// }

	public function visi(){
		$this->load->model("M_front");
		$data['visi'] = $this->M_front->tampil_visi();
		// $data['title'] = "Kopi Uber";
		// $data['content'] = "home/visi";
		echo json_encode();
	}

	public function getProdi()
	{
		$data = $_POST;
		$fak = $data['get_option'];
		$fakultas = $this->M_front->getFakultas($fak);
		echo "<option value=''>Pilih Prodi</option>";
		foreach ($fakultas as $fk) {
			echo "<option value='$fk[kd_prodi]'>$fk[prodi]</option>";
		}
	}

	public function logout(){
		session_destroy();
		redirect(base_url());
	}
	
    // public function register(){
    //     $p = $_POST;

    //     try{
    //         $date = date('Y-m-d H:i:s');
    //         $kode
    //     }
    // }
}
