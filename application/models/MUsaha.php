<?php

class MUsaha extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT ju.*, mt.alamat, ku.kategori FROM jenis_usaha ju, mitra mt, kategori_usaha ku WHERE ju.kd_mitra=mt.kd_mitra AND ju.kd_kategori=ku.kd_kategori");
        $ada = $q->result_array();
        return $ada;
    }

    public function kategori(){
        $q = $this->db->query("SELECT * FROM kategori_usaha");
        $ada = $q->result_array();
        return $ada;
    }

    public function insert($array){
        $this->db->insert("jenis_usaha", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("jenis_usaha", $array, ['kd_usaha' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_usaha', $kode);
        $this->db->delete('jenis_usaha');
        return true;
    }
}
?>