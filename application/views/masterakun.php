<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
    <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-md-5 p-0 m-0">
                <div class="sub">
                    Master Akun
                </div>
                <?= form_open('dashboard/masterakun') ?>
                    <div class="form-row ">
                        <div class="col-12">
                            <div>
                                <select class="form-control white" name="noreg" id="">
                                    <option value="">...</option>
                                    <?php foreach ($allAkun as $row): ?>
                                    <option value="<?= $row->id_akun ?>"><?= $row->nama." - ".$row->id_akun ?></option>
                                    <?php endforeach ?>
                                </select>              
                                <?php echo form_error('noreg'); ?>                 
                            </div>                         
                            <div>
                                <input type="text" class="form-control white" placeholder="Masukan nama baru" name="nama">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-secondary">Simpan</button>
                    <button type="submit" name="hapus" class="btn btn-danger">Hapus akun</button>
                </form>
            </div>
            

            </div>
        </div>

    </div>
</div>
<?php include "template/footer.php" ?>