<?php

class MProduk extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT pr.*, kt.kategori FROM produk pr, kategori_usaha kt WHERE pr.kategori=kt.kd_kategori");
        $ada = $q->result_array();
        return $ada;
    }

    public function insert($array){
        $this->db->insert("produk", $array);
    }

    public function kategori(){
        $q = $this->db->query("SELECT * FROM kategori_usaha");
        $ada = $q->result_array();
        return $ada;
    }

    public function updateData($array, $kode){
        $this->db->update("produk", $array, ['kd_produk' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_produk', $kode);
        $this->db->delete('produk');
        return true;
    }
}
?>