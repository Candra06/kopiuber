<?php

class M_front extends CI_Model{

    public function get_kode($maxLength){
        $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=1; $x<=$maxLength; $x++ ) {
        $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;
    }

    public function auto_kode($maxLength){
        $chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                    "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=1; $x<=$maxLength; $x++ ) {
            $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;
    }

    public function get_produk(){
        $q = "SELECT * FROM produk";
        $db_result = $this->db->query($q);
        $result_object = $db_result->result_array();
        return $result_object;
    }

    public function getFakultas($fak)
    {
        $q = $this->db->query("SELECT * FROM prodi WHERE kd_fakultas='$fak'");
        return $q->result_array();
    }

    public function tampil_visi(){
        $q = "SELECT v.*, m.* FROM visi v, misi m WHERE m.kd_visi = v.kd_visi";
        $data = $q->result_array();
        $data;
    }

    public function kategori(){
        $q = $this->db->query("SELECT * FROM kategori_usaha");
        return $q->result_array();
        
    }

    public function produk(){
        $q = "SELECT v.*, m.* FROM visi v, misi m WHERE m.kd_visi = v.kd_visi";
        $data = $q->result_array();
        $data;
    }

    public function notifikasi()
    {
        $q = $this->db->query("SELECT * FROM anggota WHERE status_keanggotaan = '2'");
        $data = $q->result_array();
        return $data;
    }

    public function pengurus()
    {
        $q = $this->db->query("SELECT ag.*, pn.*, jb.*, pr.*, fk.* FROM anggota ag, pengurus pn, jabatan jb, prodi pr, fakultas fk WHERE pn.kd_anggota=ag.kd_anggota AND pn.kd_jabatan=jb.kd_jabatan AND ag.kd_prodi=pr.kd_prodi AND pr.kd_fakultas=fk.kd_fakultas");
        $data = $q->result_array();
        return $data;
    }

    public function kirim_email($tujuan){
        // $config = array(     
        //     'protocol' => 'smtp',
        //         'smtp_host' => 'ssl://smtp.googlemail.com',
        //         'smtp_port' => 465,
        //         'smtp_user' => 'rswaluyojati123@gmail.com',
        //         'smtp_pass' => 'rswj12345',
        //         'mailtype'  => 'html', 
        //         'charset'   => 'iso-8859-1'
        // );
        // $this->load->library('email', $config);
        // $this->email->set_newline("\r\n");
        $this->load->library('email');

        $config['protocol']    = 'smtp';

        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        // $config['smtp_host']    = 'ssl://smtp.googlemail.com';

        $config['smtp_port']    = '465';

        $config['smtp_timeout'] = '7';

        $config['smtp_user']    = 'koperasidigital.kopiuber@gmail.com';

        $config['smtp_pass']    = 'bismillah5758';

        $config['charset']      = 'utf-8';

        $config['newline']      = "\r\n";

        $config['mailtype']     = 'text'; // or html

        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);
        $this->email->from('koperasidigital.kopiuber@gmail.com', 'Kopi Uber');
        $this->email->cc('koperasidigital.kopiuber@gmail.com');
        $this->email->to($tujuan);
        $this->email->subject('Pemberitahuan');
        $this->email->message('Selamat anda berhasil bergabung.');

        $kirim = $this->email->send();
        return $kirim;
        
    }

   public function apiTerima($array, $kode)
   {
    $this->db->update("anggota", $array, ['kd_anggota' => $kode]);
   }

   public function apiTerimaUser($array1, $kode)
   {
    $this->db->update("user", $array1, ['kd_user' => $kode]);
   }

   
}
?>