<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usaha extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("MMitra");
        $this->load->model("MUsaha");
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
        $this->load->model("MUsaha");
        $data['data'] = $this->MUsaha->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Usaha";
        $data['content'] = "usaha/index";
        $data['notif'] = $this->M_front->notifikasi();
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('mitra/index',$data);		
    }
    
    public function add()
    {
        $data['data'] = null;
        $data['kategori'] = $this->MUsaha->kategori();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Usaha";
        $data['content'] = "usaha/add";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('mitra/index',$data); 
    }

    public function input(){
        $p = $_POST;

        try{
            $date = date('Y-m-d H:i:s');
            $kode_usaha = $this->M_front->auto_kode(4); 
            $array = [
                'kd_usaha' => $kode_usaha,
                'kd_mitra' => $_SESSION['kd'],
                'nama_usaha' => $p['nama_usaha'],
                'kd_kategori' => $p['kategori'],
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];

            $this->MUsaha->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("usaha"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("usaha"));
        }
    }

    public function edit($kode){       
        $data['title'] = "Prima Comp";
        $data['header'] = "Ubah Data Pelanggan";
        $data['content'] = "usaha/add";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data'] = $this->db->get_where("usaha", ['kd_usaha' => $kode])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function update($kode){
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        try{
            $array = [
                
                'nama_usaha' => $p['nama'],
                'kategori' => $p['kategori'],
                'modified_by' => $_SESSION['kd'],
                'modified_at' => $date
            ];
            $this->MUsaha->updateData($array, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("usaha"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("usaha"));
        }
    }

    public function delete($kode){
        try{
            $this->MUsaha->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("usaha"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal hapus data '.$this->uri->segment(1)]);
            redirect(base_url("usaha"));
        }
    }
}
