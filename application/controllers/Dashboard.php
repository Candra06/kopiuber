<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->helper("Input_helper");
        $this->load->model("M_front");
        $this->load->library('email');
        if ($this->uri->segment(2) == "index" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->terima();
        }
        
        // if(!isset($_SESSION['email'])){
        //     redirect('app');
        // }
        // if ($_SESSION['level'] != '1') {
        //     redirect('app');
        // }
        
    }

	public function index()
	{
        $this->load->model("M_front");
        $data['title'] = "Kopi Uber";
        $data['header'] = "Dashboard";
        $data['content'] = "dashboard/index";
        $data['head'] = "Edit Profil";
        $data['data'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
        $data['notif'] = $this->M_front->notifikasi();
        $this->load->view('backend/index',$data);

        
    }

    public function terima($kode)
    {
       
        $q = $this->db->get_where("anggota", ['kd_anggota' => $kode])->row_array();
        
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        try{
            $array = [
                'status_keanggotaan' => 1,
                'modified_by' => $_SESSION['kd'],
                'modified_at' => $date
            ];

            $array1 = [
                'status' => 1,
                'modified_by' => $_SESSION['kd'],
                'modified_at' => $date
            ];
            echo $q['email'];
            
            $k = $this->M_front->kirim_email($q['email']);
            echo json_encode($k);
            echo json_encode($q);
            // $this->M_front->apiTerima($array, $kode);
            // $this->M_front->apiTerimaUser($array1, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil memverifikasi data ']);
            // redirect(base_url("dashboard"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal memverifikasi data ']);
           redirect(base_url("dashboard"));
        }
    }

    public function tolak($kode)
    {
        
    }
}