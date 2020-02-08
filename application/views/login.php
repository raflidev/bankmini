<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('vendor')?>/icon//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('vendor')?>/icon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('vendor')?>/icon//favicon-16x16.png">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/css/font.css">
    <title>BANKMINI — Login</title>
</head>

<body>
    <div class="row  align-items-center">
        <div class="col-md-6 m-0 p-0 text-center">
        <?= $this->session->flashdata('pesan'); ?>
            <h1>BANKMINI</h1>            
            <?= form_open('Login/proses') ?>
                <div class="form-row justify-content-center">
                    <div class="col-7">
                        <div>
                            <input type="username" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" name="masuk" class="btn btn-ungu">sign in</button>
                </div>
                <div>
                    <button type="submit" name="daftar" class="btn btn-secondary">sign up</button>
                </div>

            </form>
        </div>
        <div class="col-md-6">
            <img src="<?= base_url(); ?>/vendor/img/gedung.png" height="625" width="668" alt="">
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?= base_url(); ?>/vendor/js/bootstrap.min.js"></script>

</body>

</html>