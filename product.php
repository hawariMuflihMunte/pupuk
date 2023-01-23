<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>
    <?php include('./template/nav.php') ?>

    <div class="container pt-5">
        <h3 class="text-secondary">Data Produk</h3>
        <hr>
        <div class="table-responsive pt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Jumlah (kg)</th>
                        <th class="text-center">
                            <a href="./product.add.php" class="btn btn-warning btn-sm">
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
                    produk
                ;";
                $query = mysqli_query($connection, $sql);
                $i = 1;

                ?>
                <?php while(list($id, $nama_produk, $gambar, $jumlah_kg) = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <img src="<?= $gambar ?>" alt="<?= $nama_produk ?>" width="150">
                        </td>
                        <td><?= $nama_produk ?></td>
                        <td><?= $jumlah_kg ?></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="./product.edit.php?id=<?= $id ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="./product.delete.php?id=<?= $id ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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