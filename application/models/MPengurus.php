<?php

class MPengurus extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT pn.*, jb.kd_jabatan, jb.jabatan, ag.nama_anggota FROM pengurus pn, jabatan jb, anggota ag WHERE pn.kd_jabatan=jb.kd_jabatan AND pn.kd_anggota=ag.kd_anggota");
        $ada = $q->result_array();
        return $ada;
    }

    public function data_anggota(){
        $q = $this->db->query("SELECT * FROM anggota");
        $ada = $q->result_array();
        return $ada;
    }

    public function insert($data){
        $this->db->insert("pengurus", $data);
    }

    public function updateData($array, $kode){
        $this->db->update("anggota", $array, ['kd_anggota' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_pengurus', $kode);
        $this->db->delete('pengurus');
        return true;
    }

    public function registerAnggota()
    {
        $date = date('Y-m-d H:i:s');
        $kode_user = $this->M_front->auto_kode(6); 
        // $kode_user = 'test';
        $aaa = array(
            'kd_anggota' => $kode_user,
            'nama_anggota' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'kd_prodi' => $this->input->post('prodi'),
            'kd_fakultas' => $this->input->post('fakultas'),
            'status_mahasiswa' => 1,
            'golongan' => 2,
            'status_keanggotaan' => 2,
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'poin' => 0,
            'create_by' => $kode_user,
            'create_at' => $date
        );

        $result = $this->db->insert('anggota', $aaa);

        $user = array(
            'kd_user' => $kode_user,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('email'),
            'password' => md5($this->input->post('nim')),
            'level' => 5,
            'status' => 2,
            'create_by' => $kode_user,
            'create_at' => $date
        );

        $result = $this->db->insert('user', $user);
        $d = ['respon' => 'berhasil daftar'];
        
        return $result;
    }
}
?>