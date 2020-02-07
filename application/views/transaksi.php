<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
    <?= $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-md-5 p-0 m-0">
                <div class="sub">
                    Transaksi
                </div>
                <?= form_open('dashboard/transaksiInsert') ?>
                    <div class="form-row ">
                        <div class="col-12">
                            <div>
                                <select class="form-control white" name="noreg" id="">
                                    <option value="">...</option>
                                    <?php foreach ($allAkun as $row): ?>
                                    <option value="<?= $row->id_akun ?>"><?= $row->nama." - ".$row->id_akun ?></option>
                                    <?php endforeach ?>
                                </select>                                
                            </div>
                            <div>
                                <select class="form-control white" name="metode" id="">
                                <option value="">...</option>
                                    <option value="kredit">Kredit</option>
                                    <option value="debet">Debet</option>
                                </select>
                            </div>
                            <div>
                                <input class="form-control white" placeholder="Nominal" name="nominal">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">simpan</button>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="bgtable">
                    <form>
                        <input type="number" class="form-control" placeholder="Search by No Rekening">
                    </form>
                    <table class="table table-sm ">
                        <thead>
                            <tr>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allTransaksi as $row) :?>
                            <tr>
                                <td><?= $row->id_akun ?></td>
                                <td><?= $row->transaksi ?></td>                                
                            </tr>
                        <?php endforeach ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<?php include "template/footer.php" ?>