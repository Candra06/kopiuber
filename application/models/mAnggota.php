<?php

class MAnggota extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT ag.*, pr.kd_prodi, pr.prodi, fk.kd_fakultas, fk.fakultas, 
                                (CASE WHEN (ag.status_mahasiswa= '1') THEN 'Mahasiswa Aktif'
                                        WHEN (ag.status_mahasiswa='2') THEN 'Alumni' END) AS st_mahasiswa,
                                (CASE WHEN (ag.golongan= '1') THEN 'Anggota Aktif'
                                    WHEN (ag.golongan='2') THEN 'Anggota Pasif' END) AS golongan,
                                (CASE WHEN (ag.status_keanggotaan= '1') THEN 'Aktif'
                                    WHEN (ag.status_keanggotaan='2') THEN 'Belum diverifikasi' END) AS st_anggota
                                FROM anggota ag, prodi pr, fakultas fk 
                                WHERE pr.kd_fakultas=fk.kd_fakultas AND ag.status_keanggotaan!='3' AND ag.kd_prodi=pr.kd_prodi AND ag.kd_fakultas=fk.kd_fakultas");
        $ada = $q->result_array();
        return $ada;
    }

    public function insert($array){
        $this->db->insert("anggota", $array);
    }

    public function progres_Cek($array, $kode){
        $this->db->update("barang_servis", $array, ['kd_barang' => $kode]);
    }



    public function updateData($array, $kode){
        $this->db->update("anggota", $array, ['kd_anggota' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_anggota', $kode);
        $this->db->delete('anggota');
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