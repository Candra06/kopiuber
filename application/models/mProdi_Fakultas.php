<?php

class mProdi_Fakultas extends CI_Model{

    public function tampilDataFakultas(){
        $q = $this->db->query("SELECT * FROM fakultas");
        $ada = $q->result_array();
        return $ada;
    }

    public function tampilDataProdi(){
        $q = $this->db->query("SELECT fk.kd_fakultas, fk.fakultas, pd.kd_prodi, pd.prodi FROM fakultas fk, prodi pd WHERE pd.kd_fakultas=fk.kd_fakultas");
        $ada = $q->result_array();
        return $ada;
    }

    public function inputProdi()
    {
        $date = date('Y-m-d H:i:s');
        $kode_prodi = $this->M_front->get_kode(4);

        $array = array(
            'kd_prodi' => $kode_prodi,
            'kd_fakultas' => $this->input->post('fakultas'),
            'prodi' => $this->input->post('prodi'),
            'create_by' => 1,
            'create_at' => $date
        );

        $result = $this->db->insert('prodi', $array);

        $d = array();
        if($result){
            $d = ['respons' => 'berhasil daftar'];
        }else{
            $d = ['respons' => 'Gagal daftar'];
        }
    }

    public function inputFakultas()
    {
        $date = date('Y-m-d H:i:s');
        $kode_fakultas = $this->M_front->get_kode(4);

        $array = array(
            'kd_fakultas' =>  $kode_fakultas,
            'fakultas' => $this->input->post('fakultas'),
            'create_by' => 1,
            'create_at' => $date
        );

        $result = $this->db->insert('fakultas', $array);

        $d = array();
        if($result){
            $d = ['respons' => 'berhasil daftar'];
        }else{
            $d = ['respons' => 'Gagal daftar'];
        }
        return $d;
    }
}
?>