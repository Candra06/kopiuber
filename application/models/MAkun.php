<?php

class MAkun extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT akun.kode, akun.nama, ska.sub_klasifikasi, ka.klasifikasi 
            FROM akun, sub_klasifikasi_akun ska, klasifikasi_akun ka 
            WHERE akun.sub_klasifikasi=ska.kode AND ska.kode_klasifikasi=ka.kode");
        $ada = $q->result_array();
        return $ada;
    }

    public function tampilDataKlasifikasi(){
        $q = $this->db->query("SELECT * FROM klasifikasi_akun");
        $ada = $q->result_array();
        return $ada;
    }

    public function tampilDataSubKlasifikasi(){
        $q = $this->db->query("SELECT * FROM sub_klasifikasi_akun");
        $ada = $q->result_array();
        return $ada;
    }

    public function updateData($data, $kode){
        $this->db->update("jabatan", $data, ['kd_jabatan' => $kode]);
    }

    public function deleteData($kode, $param)
    {
        if ($param == "1") {
            $this->db->where('kode', $kode);
            $this->db->delete('klasifikasi_akun');
            return true;
        } else if($param == "2"){
            $this->db->where('kode', $kode);
            $this->db->delete('sub_klasifikasi_akun');
            return true;
        } elseif($param == "3"){
            $this->db->where('kode', $kode);
            $this->db->delete('akun');
            return true;
        }
        
        
    }

    public function update($kode, $data)
    {
        $this->db->where('kd_jabatan', $kode);
        $this->db->update('jabatan', $data);
        return true;
    }

    public function insert_klas($array){
        $this->db->insert("klasifikasi_akun", $array);
        return false;
    }

    public function insert_sub_klas($array){
        $this->db->insert("sub_klasifikasi_akun", $array);
    }

    public function insert($array){
        $this->db->insert("jabatan", $array);
    }

     
}
?>