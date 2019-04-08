<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	
    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("MJabatan");
		$this->load->model("M_front");
        $this->load->model("MPengurus");
        $this->load->model("MUser");
        $this->load->library('upload');
        if ($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
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
        $data['data'] = $this->MPengurus->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Pengurus";
        $data['content'] = "pengurus/index";
        $data['head'] = "Edit Profil";
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("anggota", ['kd_anggota' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);		
    }

    public function add(){
        
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Pengurus";
        $data['content'] = "pengurus/add";
        $data['data_anggota'] = $this->MPengurus->data_anggota();
        $data['data_jabatan'] = $this->MJabatan->tampilData();
        $data['notif'] = $this->M_front->notifikasi();
        $data['data1'] = $this->db->get_where("anggota", ['kd_anggota' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function input(){
        $p = $_POST;
        $pass = md5('kopiuber57');

        try{
        $config['upload_path'] = './asset/upload/pengurus/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('foto')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./asset/upload/pengurus'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '80%';
            $config['new_image']= './asset/upload/pengurus'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            // $this->image_lib->resize();

            $gambar=$gbr['file_name'];
            $date = date('Y-m-d H:i:s');
            $kd_pengurus = $this->M_front->auto_kode(3); 
            $kd_akun = $this->M_front->auto_kode(4); 

            $data = [
                'kd_pengurus' => $kd_pengurus,
                'kd_anggota' => $p['anggota'],
                'kd_akun' => $kd_akun,
                'email' => $p['email'],
                'kd_jabatan' => $p['jabatan'],
                'foto' => $gambar,
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];

            $array = [
                'kd_user' => $kd_akun,
                'kd_anggota' => $p['anggota'],
                'username' => $p['email'],
                'password' => $pass,
                'level' => 6,
                'status' => 1,
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];
            $this->MPengurus->insert($data);
            $this->MUser->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("pengurus"));
            }
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("pengurus"));
        }
    }

    public function delete($kode){
        try{
            $this->MPengurus->deleteData($kode);
            $this->mUser->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("pengurus"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal hapus data '.$this->uri->segment(1)]);
            redirect(base_url("pengurus"));
        }
    }
    }



