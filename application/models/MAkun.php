<?php

class MAkun extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT * FROM jabatan");
        $ada = $q->result_array();
        return $ada;
    }

    public function updateData($data, $kode){
        $this->db->update("jabatan", $data, ['kd_jabatan' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_jabatan', $kode);
        $this->db->delete('jabatan');
        return true;
    }

    public function update($kode, $data)
    {
        $this->db->where('kd_jabatan', $kode);
        $this->db->update('jabatan', $data);
        return true;
    }

    public function insert($array){
        $this->db->insert("jabatan", $array);
    }

     
}
?>