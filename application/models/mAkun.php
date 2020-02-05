<?php
class mAkun extends CI_MODEL{

    public function getAllAkun(){
        $query = $this->db->get('akun');
        return $query->result();
    }    
}