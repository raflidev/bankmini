<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-0 m-0">
                <div class="sub">
                    Ganti Password
                </div>
                <?= form_open('dashboard/changeProses') ?>
                    <div class="form-row ">
                        <div class="col-12">
                            <div>
                                <input type="password" class="form-control white" name="oldpass" placeholder="Password Lama">
                            </div>                         
                            <div>
                                <input type="password" class="form-control white" name="newpass" placeholder="Password Baru" name="nama">
                            </div>
                            <div>
                                <input type="password" class="form-control white" name="newpass2" placeholder="Konfirmasi Password Baru" name="nama">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </form>
            </div>
            

            </div>
        </div>

    </div>
</div>
<?php include "template/footer.php" ?>