<?php include "template/header.php" ?>
<div class="body-content">
    <div class="container">
    <?= $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-md-8 p-0 m-0">
                <div class="sub">
                    Master User
                </div>
              
                <div class="bgtable-L">          
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($nonUser as $row): ?>
                                <tr>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->level ?></td>
                                    <td><a class='badge badge-primary' href="acc/<?= $row->username ?>">Accept</a> | <a  class='badge badge-danger' href="deny/<?= $row->username ?>">Deny</a></td>
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