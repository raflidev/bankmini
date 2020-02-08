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
        $this->load->library("form_validation");        
        
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
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('noreg', 'No Rekening', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('akun',$data);  
        }else{
            $nama = $this->input->post('name');
            $noreg = $this->input->post('noreg');
            $alamat = $this->input->post('alamat');
    
            $data = array(
                'id_akun' => $noreg,
                'nama' => "$nama",
                'alamat' => "$alamat"
                 
            );
    
            $this->db->insert('akun',$data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect(base_url('dashboard/akun'));
        }
    }


    public function transaksi()
    {
        $data['allAkun'] = $this->mAkun->getAllAkun();
        $data['allTransaksi'] = $this->mTransaksi->getAllTransaksi();

       

        $this->form_validation->set_rules('metode', 'Metode', 'required');
        $this->form_validation->set_rules('noreg', 'No Rekening', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('transaksi',$data);
        }else{
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
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berhasil</div>');
            redirect(base_url('dashboard/transaksi'));
        }

    }

    public function history()
    {
        $data['getHistory'] = $this->db->get('history')->result();
        $this->load->view('history',$data);
    }
    public function masterakun()
    {
        $data['allAkun'] = $this->mAkun->getAllAkun();

            
        $this->form_validation->set_rules('noreg', 'No Rekening', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('masterakun',$data);
        }else{
            $noreg = $this->input->post('noreg');
            $nama = $this->input->post('nama');
    
            $simpan = $this->input->post('simpan');
            $hapus = $this->input->post('hapus');
    
            if(isset($simpan))
            {
                $this->db->set('nama',$nama);
                $this->db->where('id_akun',$noreg);
                $this->db->update('akun');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            }
            
            if(isset($hapus))
            {            
    
                $this->db->where('id_akun',$noreg);
                $this->db->delete('transaksi');
                $this->db->where('id_akun',$noreg);
                $this->db->delete('akun');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');

            }
            redirect(base_url('dashboard/masterakun'));
        }

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
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil diregistrasi</div>');
        redirect(base_url('dashboard/masteruser'));
    }

    public function deny($param)
    {        
        $this->db->where('username',$param);
        $this->db->delete('user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil dihapus</div>');
        redirect(base_url('dashboard/masteruser'));
    }

    public function laporan()
    {
        $data['laporan'] = $this->mTransaksi->getLaporan();
       
        $this->load->view('laporan', $data);
    }
    public function change()
    {

        $this->form_validation->set_rules('oldpass', "Password Lama", 'required');
        $this->form_validation->set_rules('newpass', "Password Baru", 'required');
        $this->form_validation->set_rules('newpass2', "Konfirmasi Password Baru", 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('change');            
        }else{
            $oldpass = $this->input->post('oldpass');
            $newpass = $this->input->post('newpass');        
            $newpass2 = $this->input->post('newpass2');
    
            
            if($newpass == $newpass2){
                $this->db->set('password',$newpass);
                $this->db->where('password',$oldpass);
                $this->db->where('username',$this->session->nama);        
                $this->db->update('user');
    
                $this->session->sess_destroy();   
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                redirect(base_url('dashboard/'));
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal ganti password</div>');
                redirect(base_url('dashboard/change'));
            }
        }

    }
    public function Logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Logout</div>');
        redirect('dashboard');
    }
}
