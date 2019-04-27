<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("MProduk");
        $this->load->model("MUsaha");
        $this->load->model("M_front");
        $this->load->library('upload');
        if ($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }
        // if(!isset($_SESSION['email'])){
        //     redirect('app');
        // }
        // if (($_SESSION['level']!=4) OR ($_SESSION['level']!=2)) {
        //     redirect('app');
        // }
    }

	public function index()
	{
        $this->load->model("MUsaha");
        $data['data'] = $this->MProduk->tampilData();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Produk";
        $data['content'] = "produk/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('mitra/index',$data);		
    }
    
    public function add()
    {
        $data['data'] = null;
        $data['kategori'] = $this->MProduk->kategori();
        $data['title'] = "Kopi Uber";
        $data['header'] = "Data Produk";
        $data['content'] = "produk/add";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('mitra/index',$data); 
    }

    public function input(){
        $p = $_POST;

        try{
            $config['upload_path'] = './asset/upload/barang/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./asset/upload/barang'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['new_image']= './asset/upload/barang'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                // $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $date = date('Y-m-d H:i:s');
                $kode_produk = $this->M_front->auto_kode(5); 
                $array = [
                    'kd_produk' => $kode_produk,
                    'nama_produk' => $p['nama_produk'],
                    'kategori' => $p['kategori'],
                    'kd_pemilik' => $_SESSION['kd'],
                    'harga' => $p['harga'],
                    'stok' => $p['stok'],
                    'status' => $p['status'],
                    'foto_produk' => $gambar,
                    'create_by' => $_SESSION['kd'],
                    'create_at' => $date
                ];

                $this->MProduk->insert($array);
                $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
                redirect(base_url("Produk"));
            }
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("Produk"));
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
