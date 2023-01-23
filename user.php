<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>
    <?php include('./template/nav.php') ?>

    <div class="container pt-5">
        <h3 class="text-secondary">Data Konsumen</h3>
        <hr>
        <div class="table-responsive pt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th class="text-center">
                            <a href="./user.add.php" class="btn btn-warning btn-sm">
                                <i class="bi bi-plus"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $sql = "SELECT
                    *
                FROM
                    pengguna
                WHERE
                    role = 0
                ;";
                $query = mysqli_query($connection, $sql);
                $i = 1;

                ?>
                <?php while(list($id, $nama, $username, $kata_sandi, $role) = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $username ?></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="./user.edit.php?id=<?= $id ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="./user.delete.php?id=<?= $id ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                        <?php $i++ ?>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('./template/foot.php') ?>