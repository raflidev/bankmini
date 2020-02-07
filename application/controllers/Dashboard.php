<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    

    public function __construct(){
        
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('mUser');
        $this->load->model('mTransaksi');
        $this->load->model('mAkun');
        
    }
    
	public function index()
	{         
        if(!isset($this->session->login)){
            redirect('Login');
        }   
        $data['countUser'] = $this->mUser->getCountUser();
        $data['countTransaksi'] = $this->mTransaksi->getCountTransaksi();
        $tahun = date('Y');

        $query = $this->db->query("SELECT MONTH(tanggal) AS bulan, COUNT(*) AS jumlah_bulanan FROM transaksi WHERE YEAR(tanggal)= '$tahun' GROUP BY MONTH(tanggal)");                
        $data['laporan'] = $query->result();

        $this->load->view('template/header');
        $this->load->view('index', $data);
        $this->load->view('template/footer');    
    }

    public function akun()
    {
        $data['allAkun'] = $this->mAkun->getAllAkun();

        $this->load->view('akun',$data);
    }

    public function akunInsert()
    {
        $nama = $this->input->post('name');
        $noreg = $this->input->post('noreg');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_akun' => $noreg,
            'nama' => "$nama",
            'alamat' => "$alamat"
             
        );

        $this->db->insert('akun',$data);
        redirect(base_url('dashboard/akun'));
    }

    public function transaksi()
    {
        $data['allAkun'] = $this->mAkun->getAllAkun();
        $data['allTransaksi'] = $this->mTransaksi->getAllTransaksi();

        $this->load->view('transaksi',$data);
    }
    public function transaksiInsert(){
        $noreg = $this->input->post('noreg');
        $metode = $this->input->post('metode');
        $nominal = $this->input->post('nominal');
        $waktu = date('Y-m-d');
        
        if($metode == "debet"){
            $this->db->select_sum('transaksi');
            $this->db->where('id_akun',$noreg);
            $query = $this->db->get('transaksi')->row_array();            
            if((int)$query['transaksi'] <= $nominal){                
                redirect(base_url('dashboard/transaksi'));                
            }else{
                $data = array(
                    'id_akun' => $noreg,
                    'tanggal' => $waktu,
                    'transaksi' => -$nominal
                );
            }
        }else{
            $data = array(
                'id_akun' => $noreg,
                'tanggal' => $waktu,
                'transaksi' => (int)$nominal
            );
        }

        $this->db->insert('transaksi',$data);
        redirect(base_url('dashboard/transaksi'));
    }

    public function history()
    {
        $data['getHistory'] = $this->db->get('history')->result();
        $this->load->view('history',$data);
    }
    public function masterakun()
    {
        $data['allAkun'] = $this->mAkun->getAllAkun();

        $this->load->view('masterakun',$data);
    }
    public function masterAkunProses()
    {
        $noreg = $this->input->post('noreg');
        $nama = $this->input->post('nama');

        $simpan = $this->input->post('simpan');
        $hapus = $this->input->post('hapus');

        if(isset($simpan))
        {
            $this->db->set('nama',$nama);
            $this->db->where('id_akun',$noreg);
            $this->db->update('akun');
        }
        
        if(isset($hapus))
        {            

            $this->db->where('id_akun',$noreg);
            $this->db->delete('transaksi');
            $this->db->where('id_akun',$noreg);
            $this->db->delete('akun');
        }
        redirect(base_url('dashboard/masterakun'));
    }

    public function masteruser()
    {
        $data['nonUser'] = $this->mUser->getNonUser();

        $this->load->view('masteruser',$data);
    }

    public function acc($param)
    {
        $this->db->set('level',1);
        $this->db->where('username',$param);
        $this->db->update('user');

        redirect(base_url('dashboard/masteruser'));
    }

    public function deny($param)
    {        
        $this->db->where('username',$param);
        $this->db->delete('user');

        redirect(base_url('dashboard/masteruser'));
    }

    public function laporan()
    {
        $data['laporan'] = $this->mTransaksi->getLaporan();
       
        $this->load->view('laporan', $data);
    }
    public function change()
    {
        $this->load->view('change');
    }
    public function changeProses()
    {
        $oldpass = $this->input->post('oldpass');
        $newpass = $this->input->post('newpass');        
        $newpass2 = $this->input->post('newpass2');

        
        if($newpass == $newpass2){
            $this->db->set('password',$newpass);
            $this->db->where('password',$oldpass);
            $this->db->where('username',$this->session->nama);        
            $this->db->update('user');

            $this->session->sess_destroy();            
            redirect(base_url('dashboard/'));
        }else{
            redirect(base_url('dashboard/change'));
        }
    }
    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }
}
