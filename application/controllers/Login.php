<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	public function index()
	{
        if(isset($this->session->nama)){
            redirect(base_url('dashboard/'));    
        }
		$this->load->view('login.php');
    }
    public function proses()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $masuk = $this->input->post('masuk');
        $daftar = $this->input->post('daftar');

        if(isset($masuk)){
            $query = $this->db->query("select * from user where username='$user' and password='$pass' and level=1");
            $row = $query->row();
            if($query->num_rows() > 0){
                $newdata = array(
                    'login'  => 'true',
                    'nama'     => "$row->username"                
                );        
                $this->session->set_userdata($newdata);
                redirect('dashboard');
            }else{
                redirect('login');
            }
        }

        if(isset($daftar)){            

            $data = array(
                'username' => "$user",
                'password' => "$pass",
                'level' => 0
            );

            $this->db->insert('user',$data);
            redirect('login');    
        }

    }    
}
