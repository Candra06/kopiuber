<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	
    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
		$this->load->model("M_front");
		$this->load->model("MJabatan");
        if ($this->uri->segment(2) == "" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }
        if(!isset($_SESSION['kd'])){
            redirect('app');
        }
    }

	public function index()
	{
        $this->load->model("MPengurus");
        $data['data'] = $this->MJabatan->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Jabatan";
        $data['content'] = "jabatan/index";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);		
    }

    public function input(){
        $p = $_POST;

        try{
            $date = date('Y-m-d H:i:s');
            $kode_jabatan = $this->M_front->auto_kode(2); 
            $array = [
                'kd_jabatan' => $kode_jabatan,
                'jabatan' => $p['jabatan'],
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];
            $this->MJabatan->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }
    }

}
