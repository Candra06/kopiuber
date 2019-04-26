<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("MMitra");
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
        $this->load->model("MMitra");
        $data['data'] = $this->MMitra->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Mitra";
        $data['content'] = "mitra/index";
        $data['notif'] = $this->M_front->notifikasi();
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);		
    }
    
    public function add()
    {
        $data['data'] = null;
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Mitra";
        $data['content'] = "mitra/add";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data); 
    }

    public function input(){
        $p = $_POST;

        try{
            $date = date('Y-m-d H:i:s');
            $kode_user = $this->M_front->auto_kode(4); 
            $array = [
                'kd_mitra' => $kode_user,
                'nama_mitra' => $p['nama'],
                'alamat' => $p['alamat'],
                'status' => $p['status'],
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];

            $user = [
                'kd_user' => $kode_user,
                'kd_anggota' => '-',
                'username' => $p['username'],
                'password' => md5('mitrakopiuber'),
                'status' => 1,
                'level' => 4,
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];
            $this->MMitra->insert($array);
            $this->MMitra->insert_user($user);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("mitra"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("mitra"));
        }
    }

    public function edit($kode){       
        $data['title'] = "Prima Comp";
        $data['header'] = "Ubah Data Pelanggan";
        $data['content'] = "mitra/add";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data'] = $this->db->get_where("mitra", ['kd_mitra' => $kode])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function update($kode){
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        try{
            $array = [
                'nama' => $p['nama'],
                'alamat' => $p['alamat'],
                'no_hp' => $p['no_hp'],
                'pekerjaan' => $p['pekerjaan'],
                'modified_by' => 1,
                'modified_date' => $date
            ];
            $this->MMitra->updateData($array, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("mitra"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("mitra"));
        }
    }

    public function delete($kode){
        try{
            $this->MMitra->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("mitra"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal hapus data '.$this->uri->segment(1)]);
            redirect(base_url("mitra"));
        }
    }
}
