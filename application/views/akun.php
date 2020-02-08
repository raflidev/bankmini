<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
    <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-md-5 p-0 m-0">
                <div class="sub">
                    Akun
                </div>
                <?= form_open('dashboard/akun') ?>
                    <div class="form-row ">
                        <div class="col-12">
                            <div>
                                <input type="number" name="noreg" value="<?= rand(); ?>" class="form-control white" placeholder="No Rekening" >
                                <?php echo form_error('noreg'); ?>
                            </div>
                            <div>
                                <input type="name" name="name" class="form-control white" placeholder="Nama">
                                <?php echo form_error('name'); ?>
                            </div>
                            <div>
                                <textarea class="form-control white" name="alamat" placeholder="Alamat" rows="3"></textarea>
                                <?php echo form_error('alamat'); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">simpan</button>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="bgtable">                    
                    <table class="table table-sm ">
                        <thead>
                            <tr>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Nama Lengkap</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($allAkun as $row):?>
                           <tr>
                                <td> <?= $row->id_akun ?> </td>
                                <td> <?= $row->nama ?> </td>
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