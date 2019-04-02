<?php

class MJabatan extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM jabatan");
        $ada = $q->result_array();
        return $ada;
    }

    public function progres_Cek($array, $kode){
        $this->db->update("barang_servis", $array, ['kd_barang' => $kode]);
    }

    public function updateData($array, $kode){
        $this->db->update("jabatan", $array, ['kd_jabatan' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_jabatan', $kode);
        $this->db->delete('jabatan');
        return true;
    }

    public function insert($array){
        $this->db->insert("jabatan", $array);
    }
}
?>