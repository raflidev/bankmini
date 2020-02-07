<?php
Class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN BANK MINI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(85,6,'ID AKUN',1,0);
        $pdf->Cell(27,6,'NAMA',1,0);
        $pdf->Cell(25,6,'ALAMAT',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('akun')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(85,6,$row->id_akun,1,0);
            $pdf->Cell(27,6,$row->nama,1,0);
            $pdf->Cell(25,6,$row->alamat,1,1); 
        }

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'ID TRANSAKSI',1,0);
        $pdf->Cell(85,6,'ID AKUN',1,0);
        $pdf->Cell(27,6,'TANGGAL',1,0);
        $pdf->Cell(25,6,'TRANSAKSI',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('transaksi')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(40,6,$row->id_transaksi,1,0);
            $pdf->Cell(85,6,$row->id_akun,1,0);
            $pdf->Cell(27,6,$row->tanggal,1,0);
            $pdf->Cell(25,6,$row->transaksi,1,1); 
        }
        $pdf->Output();
    }
}