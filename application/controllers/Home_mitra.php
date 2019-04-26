<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_mitra extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->helper("Input_helper");
        $this->load->model("mProfil");
        
        if ($_SESSION['level'] != 4) {
            redirect('');
        }
    }

	public function index()
	{
        $data['title'] = "Kopi Uber";
        $data['header'] = "Dashboard";
        $data['content'] = "Dashboard/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
        $this->load->view('mitra/index',$data);
    }
    
    public function profil(){
        $data = $this->mProfil->profil1();
        echo json_encode($data);
    }

    public function profil2(){
        $data = $this->mProfil->profil2();
        echo json_encode($data);
     }
}