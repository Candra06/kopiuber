<?php

class mUser extends CI_Model{

    public function tampilData(){
        $q = $this->db->query("SELECT *, (CASE 
                                WHEN (level = '1') THEN 'Admin'
                                WHEN (level = '2') THEN 'Teknisi'
                                WHEN (level = '3') THEN 'Operator' END) as jabatan,
                                (CASE WHEN (status = '1') THEN 'Aktif' ELSE 'Banned' END) as status
                                FROM user");
        $ada = $q->result_array();
        return $ada;
    }

    public function kode(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_user,2)) as kode FROM user", false);
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        $kode = "KU".$kd;
        $data = array(
            'kd_user' => $kode
        );
        return $kode;
    }

    public function insert($array){
        $this->db->insert("user", $array);
    }

    public function updateData($array, $kode){
        $this->db->update("user", $array, ['kd_user' => $kode]);
    }

    public function deleteData($kode)
    {
        $this->db->where('kd_user', $kode);
        $this->db->delete('user');
        return true;
    }

    function get_kode($maxlength) {
        $chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=0; $x<=$maxlength; $x++ ) {
            $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;
      }
}
?>