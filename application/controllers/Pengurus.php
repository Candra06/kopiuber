<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	
    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("mKategori");
		$this->load->model("M_front");
		$this->load->model("MPengurus");
        // if ($this->uri->segment(2) == "index" && $_SERVER['REQUEST_METHOD'] == "POST") {
        //     $this->input();
        // } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
        //     $this->update($this->uri->segment(3));
        // }
        // if(!isset($_SESSION['email'])){
        //     redirect('app');
        // }
    }

	public function index()
	{
        $this->load->model("MPengurus");
        $data['data'] = $this->MPengurus->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Pengurus";
        $data['content'] = "pengurus/index";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        // $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);		
    }

}
