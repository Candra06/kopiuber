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
			$this->load->helper("Response_Helper");
			$this->load->helper("Input_helper");
			$this->load->helper('url');
			$this->load->model("M_front");
			$this->load->model("MAnggota");
			$this->load->model("MUser");
			$this->load->model("MProdi_Fakultas");
			// if($_SERVER['REQUEST_METHOD'] == "POST"){
			// $this->register();
			// }
			if ($this->uri->segment(2) == "registrasi" && $_SERVER['REQUEST_METHOD'] == "POST") {
				$this->register();
			}
  	}

	public function index()
	{
		// echo md5("test");
		$this->load->model("M_front");
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/index";
		$data['pengurus'] = $this->M_front->pengurus();
		$this->load->view('frontend/index',$data);
		
	}

	public function registrasi()
	{
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/register";
		$data['data_fakultas'] = $this->MProdi_Fakultas->tampilDataFakultas();
		$data['data_prodi'] = $this->MProdi_Fakultas->tampilDataProdi();
		$this->load->view('frontend/index',$data);
	}

	public function register(){
		$p = $_POST;

		try{
				$date = date('Y-m-d H:i:s');
				$kode_user = $this->M_front->auto_kode(6); 
				$kode_user_anggota = $this->M_front->auto_kode(4); 
				$pass = md5($p['nim']);
				$array = [
						'kd_anggota' => $kode_user,
						'nama_anggota' => $p['nama'],
						'nim' => $p['nim'],
						'tgl_lahir' => $p['tanggal'],
						'tempat_lahir' => $p['tempat'],
						'kd_prodi' => $p['prodi'],
						'kd_fakultas' => $p['fakultas'],
						'status_mahasiswa' => 1,
						'golongan' => 2,
						'poin' => 0,
						'persetujuan' => 1,
						'status_keanggotaan' => 2,
						'no_hp' => $p['no_hp'],
						'alamat' => $p['alamat'],
						'email' => $p['email'],
						'create_by' => $kode_user,
						'create_at' => $date
				];

				$user = [
					'kd_user' => $kode_user_anggota,
					'kd_anggota' => $kode_user,
					'level' => 5,
					'username' => $p['email'],
					'password' => $pass,
					'status' => 2,
					'create_by' => $kode_user,
					'create_at' => $date
				];
				$this->MUser->insert_anggota($user);
				$this->MAnggota->insert($array);
				$this->session->set_flashdata("message", ['success', 'Registrasi Berhasil, silahkan tunggu persetujuan Admin :) ']);
				echo "<script>location.reload()</script>";
		}catch (Exception $e){
				$this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
				echo "<script>location.reload()</script>";
		}
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
}
