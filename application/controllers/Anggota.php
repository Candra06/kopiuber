<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        // $this->load->model("mBarang");
        $this->load->model("M_front");
        $this->load->model("mUser");
        if ($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }
        // if(!isset($_SESSION['email'])){
        //     redirect('app');
        // }
    }

	public function index()
	{
        $this->load->model("mAnggota");
        $data['data'] = $this->mAnggota->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Anggota";
        $data['content'] = "anggota/index";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("anggota", ['kd_anggota' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);		
    }

    public function add(){
        
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Anggota";
        $data['content'] = "anggota/add";
        $data['data'] = null;
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("anggota", ['kd_anggota' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function input(){
        $p = $_POST;
        $pass = md5($p['nim']);
        try{
            $date = date('Y-m-d H:i:s');
            $kode_user = $this->M_front->auto_kode(6); 
            $array = [
                'kd_anggota' => $kode_user,
                'nama_anggota' => $p['nama'],
                'nim' => $p['nim'],
                'tgl_lahir' => $p['tanggal'],
                'tempat_lahir' => $p['tempat']
                'kd_prodi' => $p['prodi'],
                'kd_fakultas' => $p['fakultas'],
                'status_mahasiswa' => 1,
                'golongan' => 2,
                'status_keanggotaan' => 1,
                'no_hp' => $p['no_hp'],
                'alamat' => $p['alamat'],
                'email' => $p['email'],
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];

            $user = [
                'kd_user' => $kode_user,
                'kd_anggota' => $kode_user,
                'level' => 5,
                'username' => $p['email'],
                'password' => $pass,
                'status' => 2,
                'create_by' => $_SESSION['kd'],
                'create_date' => $date
            ];
            $this->MUser->insert_anggota($user);
            $this->MAnggota->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("anggota"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("anggota"));
        }
    }

    

    public function edit($kode){       
        $data['title'] = "Kopi Uber";
        $data['header'] = "Ubah Data Anggota";
        $data['content'] = "pelanggan/add";
        $data['data'] = $this->db->get_where("pelanggan", ['kd_pelanggan' => $kode])->row_array();
		$this->load->view('backend/index',$data);
    }


}
