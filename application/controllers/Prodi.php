<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("mProdi_Fakultas");
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
        $this->load->model("mProdi_Fakultas");
        $data['data'] = $this->mProdi_Fakultas->tampilDataProdi();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Prodi";
        $data['content'] = "prodi/index";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        $data['dataFakultas'] = $this->mProdi_Fakultas->tampilDataFakultas();
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);		
    }

    public function fakultas()
    {
        $this->load->model("mProdi_Fakultas");
        $data['data'] = $this->mProdi_Fakultas->tampilDataProdi();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Fakultas";
        $data['content'] = "fakultas/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function inputProdi(){
        $data = $this->mProdi_Fakultas->inputProdi();
		echo json_encode($data);
    }

    public function inputFakultas(){
        $data = $this->mProdi_Fakultas->inputFakultas();
		echo json_encode($data);
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
