<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 p-0 m-0">
                <div class="sub">
                    History
                </div>
              
                <div class="bgtable-L">                    
                    <table class="table table-sm ">
                        <thead>
                            <tr>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach($getHistory as $row) :?>                        
                            <tr>                      
                                <td><?= $row->id_akun ?></td>
                                <td><?= $row->nama ?></td>
                                <td>Rp.<?= $row->transaksi ?></td>                                
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