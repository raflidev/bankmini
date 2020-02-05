<?php
class mUser extends CI_MODEL{

    public function getAllUser(){
        $query = $this->db->get('user');
        return $query->result();
    }

    public function getCountUser(){
        return $this->db->count_all_results('user');
    }

    public function getNonUser(){
        $query = $this->db->get_where('user', array('level' => 0));
        return $query->result();
    }
    
}
?>