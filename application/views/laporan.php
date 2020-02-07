<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
    <?= $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-md-8 p-0 m-0">
                <div class="sub">
                    Laporan <a href="<?= base_url('laporan') ?>" class="badge badge-warning">Download</a>
                </div>
              
                <div class="bgtable-L">                    
                    <table class="table table-sm ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach($laporan as $row) :?>                        
                            <tr>                            
                                <td><?= $no++ ?></td>
                                <td><?= $row->id_akun ?></td>
                                <td><?= $row->nama ?></td>
                                <td>Rp.<?= $row->saldo ?></td>                                
                            </tr>                           
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
<?php include "template/footer.php" ?>