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
            $this->mPelanggan->insert($array);
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

    public function progresCek($kode){
       $p = $_POST;

       try{
           $date = date('Y-m-d H:i:s');
           $array = [
                'modified_at' => $date,
                'modified_by' => $_SESSION['kd'],
                'progres' => 1
           ];
           $this->mBarang->progres_Cek($array,$kode);
           $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
           redirect(base_url("barang"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("barang"));
        }
    }

    public function progresPerbaikan($kode){
        $p = $_POST;

        try{
           $date = date('Y-m-d H:i:s');
           $array = [
                'modified_by' => $date,
                'modified_by' => $_SESSION['kd'],
                'progres' => 2
           ];
           $this->mBarang->progres_Cek($array,$kode);
           $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
           redirect(base_url("barang"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("barang"));
       }
    }

    public function progresSelesai($kode){
        $p = $_POST;

        try{
           $date = date('Y-m-d H:i:s');
           $array = [
                'modified_by' => $date,
                'modified_by' => $_SESSION['kd'],
                'progres' => 4
           ];
           $this->mBarang->progres_Cek($array,$kode);
           $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
           redirect(base_url("barang"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("barang"));
        }
    }

    public function gantiSparepart($kode){
        
    }
}
