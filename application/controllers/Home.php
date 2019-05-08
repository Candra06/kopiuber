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
			} else if($this->uri->segment(2) == "home" && $_SERVER['REQUEST_METHOD'] == "POST"){
				$this->transaksi_pulsa();
			}
  	}

	public function index()
	{
		// echo md5("test");
		$this->load->model("M_front");
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/index";
		$data['pengurus'] = $this->M_front->pengurus();
		$data['kategori'] = $this->M_front->kategori();
		$data['operator'] = $this->M_front->get_operator();
		$data['saldo'] = $this->M_front->get_saldo();
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

	public function get_nominal()
	{
		$data = $_POST;
		$nm = $data['get_option'];
		$nominal = $this->M_front->get_nominal($nm);
		echo "<option value=''>Pilih Nominal</option>";
		foreach ($nominal as $fk) {
			echo "<option value='$fk[kd_pulsa]'>$fk[nominal]</option>";
		}
	}

	public function cek_out(){
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/cek_out";
		$p = $this->db->query("SELECT tp.*, op.operator as opr, ag.nama_anggota FROM transaksi_pulsa tp LEFT JOIN anggota ag ON tp.kd_anggota=ag.kd_anggota , operator op WHERE tp.operator=op.id_operator  ORDER BY tgl_transaksi DESC")->row_array();
		$data['nomor'] = $p['no_hp'];
		$data['operator'] = $p['opr'];
		$data['harga'] = $p['harga'];
		$anggota = '';
		if ($p['nama_anggota'] == NULL) {
			$anggota = "Anda tidak terdaftar sebagai anggota koperasi.";
		} else {
			$anggota = $p['nama_anggota'];
		}
		$data['anggota'] = $anggota;
		$this->load->view('frontend/index',$data);
	}

	public function proses_transaksi(){
		$p = $_POST;
		try{
			$nomor = $p['nomor'];
			$q = $this->db->query("SELECT * FROM transaksi_pulsa WHERE no_hp='$nomor' AND status_transaksi = 0 ORDER BY tgl_transaksi DESC")->row_array();
			$r = $this->db->query("SELECT * FROM produk WHERE kd_produk='XIDWK'")->row_array();
		
			$stok_akhir = (int)$r['stok']-(int)$q['nominal'];
			$hasil = ['stok' =>$stok_akhir];
			$kode = $r['kd_produk'];
			$array = [
				'status_transaksi' => 1
			];
			$transaksi = $q['kd_transaksi'];
			$this->M_front->proses_transaksi($hasil,$kode,$array,$transaksi);
			
			redirect(base_url("Home/success"));
			$this->session->set_flashdata("message", ['success', 'Selamat Transaksi Berhasil :) '.$this->uri->segment(1)]);
		}catch(Exception $e){
			
			redirect(base_url("Home/cek_out"));
			$this->session->set_flashdata("message", ['danger', 'Transaksi Gagal '.$this->uri->segment(1)]);
		}
	}

	public function success(){
		$this->load->model("M_front");
		$data['title'] = "Kopi Uber";
		$data['content'] = "home/transaksi_berhasil";
		$this->load->view('frontend/index',$data);
	}

	public function transaksi_pulsa(){
		$p = $_POST;

		try{
			$anggota = $p['anggota'];
			$date = date('Y-m-d H:i:s');
				$kode_transaksi = $this->M_front->auto_kode(3);
				$tgl_trans = date('dmY');
				$nominal = $p['nominal'];
				$kode = "TP"."$tgl_trans"."$kode_transaksi";
				$d = $this->db->query("SELECT nominal, harga FROM pulsa WHERE kd_pulsa='$nominal'")->row_array();
				
				$q = $this->db->query("SELECT kd_anggota FROM anggota WHERE kd_anggota='$anggota'")->row_array();
			if ($anggota != '') {
				if ($q > 0 ) {
					$array = [
						'kd_transaksi' => $kode,
						'nominal' => $d['nominal'],
						'harga' => $d['harga'],
						'no_hp' => $p['no_hp'],
						'operator' => $p['operator'],
						'tgl_transaksi' => $date,
						'kd_anggota' => $anggota,
						'status_pembayaran' => 0,
						'status_transaksi' => 0
					];
				} else {
					$array = [
						'kd_transaksi' => $kode,
						'nominal' => $d['nominal'],
						'harga' => $d['harga'],
						'operator' => $p['operator'],
						'no_hp' => $p['no_hp'],
						'tgl_transaksi' => $date,
						'status_pembayaran' => 0,
						'status_transaksi' => 0
					];
				}
			} else {
				$array = [
						'kd_transaksi' => $kode,
						'nominal' => $d['nominal'],
						'harga' => $d['harga'],
						'operator' => $p['operator'],
						'no_hp' => $p['no_hp'],
						'tgl_transaksi' => $date,
						'status_pembayaran' => 0,
						'status_transaksi' => 0
				];
			}
				$this->M_front->insert_transaksi($array);
				$this->session->set_flashdata("message", ['success', 'Transaksi Berhasil :) ']);
				// echo "<script>location.reload()</script>";
				redirect(base_url("Home/cek_out"));
		}catch (Exception $e){
				$this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
				// echo "<script>location.reload()</script>";
		}
	}
}
