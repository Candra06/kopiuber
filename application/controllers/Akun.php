<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	
    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
		$this->load->model("M_front");
		$this->load->model("MAkun");
        if ($this->uri->segment(2) == "" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }else if($this->uri->segment(3) == "klasifikasi_akun" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->input_klas($this->uri->segment(3));
        }else if($this->uri->segment(3) == "sub_klasifikasi_akun" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->input_sub_klas($this->uri->segment(3));
        }
        if(!isset($_SESSION['kd'])){
            redirect('app');
        }
    }

	public function index($param)
	{
        echo $param;
        if ($param == "akun") {
            $this->load->model("MPengurus");
            $data['data'] = $this->MAkun->tampilData();
            $data['sub_klas'] = $this->MAkun->tampilDataSubKlasifikasi();
            $data['title'] = "Kopi Uber";
            $data['header'] = "Data Akun";
            $data['content'] = "akun/index";
            $data['head'] = "Edit Profil";
            $data['notif'] = $this->M_front->notifikasi();
            $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
            $this->load->view('backend/index',$data);
        } else if($param == "klasifikasi_akun"){
            $this->load->model("MPengurus");
            $data['data'] = $this->MAkun->tampilDataKlasifikasi();
            $data['title'] = "Kopi Uber";
            $data['header'] = "Data Klasifikasi Akun";
            $data['content'] = "klasifikasi_akun/index";
            $data['head'] = "Edit Profil";
            $data['notif'] = $this->M_front->notifikasi();
            $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
            $this->load->view('backend/index',$data);
        } elseif($param == "sub_klasifikasi_akun"){
            $this->load->model("MPengurus");
            $data['data'] = $this->MAkun->tampilDataSubKlasifikasi();
            $data['title'] = "Kopi Uber";
            $data['klas'] = $this->MAkun->tampilDataKlasifikasi();
            $data['header'] = "Data Sub Klasifikasi Akun";
            $data['content'] = "sub_klasifikasi/index";
            $data['head'] = "Edit Profil";
            $data['notif'] = $this->M_front->notifikasi();
            $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
            $this->load->view('backend/index',$data);
        }
        
        		
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

    public function input_klas(){
        $p = $_POST;

        try{
            $date = date('Y-m-d H:i:s');
            $kode_jabatan = $this->M_front->auto_kode(2); 
            $array = [
                'kode' => $p['kode_klas'],
                'klasifikasi' => $p['klasifikasi'],
                'create_by' => $_SESSION['kd'],
                'create_at' => $date,
                'status' => 1
            ];
            $this->MAkun->insert_klas($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data Klasifikasi Akun']);
            redirect(base_url("Akun/index/klasifikasi_akun"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            echo "<script>location.reload()</script>";
        }
    }

    public function input_sub_klas(){
        $p = $_POST;

        try{
            $date = date('Y-m-d H:i:s');
            $array = [
                'kode' => $p['kode'],
                'sub_klasifikasi' => $p['sub_klas'],
                'kode_klasifikasi' => $p['klas'],
                'create_by' => $_SESSION['kd'],
                'create_at' => $date
            ];
            $this->MAkun->insert_sub_klas($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("Akun/index/sub_klasifikasi_akun"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }
    }

    public function update($kode){
        $p = $_POST;
        try{
            $date = date('Y-m-d H:i:s');
            $data = [
                'jabatan' => $p['jabatan_edit'],
                'modified_by' => $_SESSION['kd'],
                'modified_at' => $date
            ];
            $this->MJabatan->updateData($data, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }
    }

    public function update_klasifikasi($kode){
        $p = $_POST;
        try{
            $date = date('Y-m-d H:i:s');
            $data = [
                'klasifikasi' => $p['jabatan_edit'],
                'modified_by' => $_SESSION['kd'],
                'modified_at' => $date
            ];
            $this->MJabatan->updateData($data, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("akun/klasifikasi_akun"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("akun/klasifikasi_akun"));
        }
    }

    public function update_sub_klas($kode){
        $p = $_POST;
        try{
            $date = date('Y-m-d H:i:s');
            $data = [
                'sub_klasifikasi' => $p['sub_klas_edit'],
                'kode_klasifikasi' => $p['kode_klas_edit'],
                'modified_by' => $_SESSION['kd'],
                'modified_at' => $date
            ];
            $this->MJabatan->updateData($data, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }
    }

    public function delete($kode, $param){
        try{
            if ($param == 1) {
                $this->MAkun->deleteData($kode, $param);
                $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
                redirect(base_url("akun/index/klasifikasi_akun"));
            } else if($param == 2){
                $this->MAkun->deleteData($kode, $param);
                $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
                redirect(base_url("akun/index/sub_klasifikasi_akun"));
            } elseif($param == 3){
                $this->MAkun->deleteData($kode, $param);
                $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
                redirect(base_url("akun/index/akun"));
            }
            
            
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("jabatan"));
        }
    }

}
