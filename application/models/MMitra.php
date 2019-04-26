<?php

class MMitra extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM mitra");
        $ada = $q->result_array();
        return $ada;
    }

    public function insert($array){
        $this->db->insert("mitra", $array);
    }

    public function insert_user($user){
        $this->db->insert("user", $user);
    }

    public function updateData($array, $kode){
        $this->db->update("mitra", $array, ['kd_mitra' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_mitra', $kode);
        $this->db->delete('mitra');
        return true;
    }
}
?>