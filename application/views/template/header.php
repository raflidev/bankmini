<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/vendor/css/font.css">
    <script src="<?= base_url() ?>/vendor/js/chart.js"></script>
    <script src="<?= base_url() ?>/vendor/js/feather.min.js"></script>
    <title>BANKMINI — Dashboard</title>
</head>

<body>

    <div class="row">
        <div class="col-md-3 p-0 m-0 text-white text-center bg-dark side">
            <h4 class="mt-4 dashboard">BANKMINI</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link " href="<?=base_url()?>dashboard">Home</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('dashboard')?>/akun">Akun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('dashboard')?>/transaksi">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('dashboard')?>/history">History</a>
                </li>
                <span class="dropdown">
                    <li class="nav-item">
                        <a class="nav-link ml-4" href="#">Informasi <i data-feather="chevron-down"></i></a>
                    </li>
                    <ul class="dropdown-content">
                        <li class="nav-item">
                        <a href="<?=base_url('dashboard')?>/masterakun">Master Akun</a>
                        </li>
                        <li class="nav-item">
                        <a href="<?=base_url('dashboard')?>/masteruser">Master User</a>
                        </li>
                        <li class="nav-item">                            
                        <a href="<?=base_url('dashboard')?>/laporan">Laporan</a>
                        </li>
                        <li class="nav-item">
                        <a href="<?=base_url('dashboard')?>/change">Ganti Password</a>
                        </li>
                    </ul>
                </span>
            </ul>
        </div>
        <div class="col-md-9 p-0 m-0">
            <nav class="navbar navbar-expand-lg navbar-linear text-white ">
                <div class="navbar-nav ml-auto">                
                    Selamat datang, <?=  strtoupper($this->session->userdata('nama')); ?> <span class="ml-3"><a class="logout" href="<?= base_url() ?>/dashboard/Logout"><i data-feather="log-out"></i></a></span>
                </div>
            </nav>