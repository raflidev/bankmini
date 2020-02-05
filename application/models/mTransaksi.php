<?php
class mTransaksi extends CI_MODEL{

    public function getAllTransaksi(){
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function getCountTransaksi(){
        return $this->db->count_all_results('transaksi');
    }

    public function getLaporan(){
        return $this->db->get('laporan')->result();
    }

}
?>