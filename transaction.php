<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>
    <?php include('./template/nav.php') ?>

    <?php

        if (isset($_REQUEST['batal'])) {
            $id_user = $_SESSION['id'];
            $id_pembelian = $_REQUEST['id'];
            $id_produk = $_REQUEST['id_produk'];
            $jumlah_beli_kg = $_REQUEST['jumlah'];

            $sql = "UPDATE
                produk
            SET
                jumlah_produk_kg = jumlah_produk_kg + $jumlah_beli_kg
            WHERE
                id = $id_produk
            ;";
            $query = mysqli_query($connection, $sql);

            if ($query) {
                $sql = "DELETE
                FROM
                    pembelian
                WHERE
                    id = $id_pembelian
                ;";
                $query = mysqli_query($connection, $sql);

                if ($query) {
                    echo "<script>
                        window.alert('Berhasil membatalkan penjualan produk')
                        window.location.href = './transaction.php'
                    </script>";
                } else {
                    echo "<script>
                        window.alert('Gagal membatalkan penjualan produk. Terjadi kesalahan sistem')
                        window.location.href = './transaction.php'
                    </script>";
                }

            } else {
                echo "<script>
                    window.alert('Gagal membatalkan penjualan produk. Terjadi kesalahan sistem')
                    window.location.href = './transaction.php'
                </script>";
            }
        }
    
    ?>

    <div class="container pt-5">
        <h3 class="text-secondary">Data Pembelian</h3>
        <hr>
        <div class="table-responsive pt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pembeli</th>
                        <th>Gambar</th>
                        <th>Rincian</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $id = $_SESSION['id'];
                $sql = "SELECT
                    pb.id id_pembelian,
                    pb.id_pengguna id_pengguna,
                    pb.id_produk id_produk,
                    pg.nama_lengkap nama_pengguna,
                    pr.gambar_produk gambar,
                    pr.nama_produk nama_produk,
                    pb.jumlah_beli_produk jumlah
                FROM
                    pembelian pb
                JOIN produk pr ON
                    pr.id = pb.id_produk
                JOIN pengguna pg ON
                    pg.id = pb.id_pengguna
                ;";
                $query = mysqli_query($connection, $sql);
                $i = 1;

                ?>
                <?php while(list(
                        $id_pembelian,
                        $id_pengguna,
                        $id_produk,
                        $nama_pengguna,
                        $gambar,
                        $nama_produk,
                        $jumlah_kg
                    ) = mysqli_fetch_array($query)): ?>
                    <tr>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $id_pembelian ?>">
                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                            <td><?= $i ?></td>
                            <td><?= $nama_pengguna ?></td>
                            <td>
                                <img src="<?= $gambar ?>" alt="<?= $nama_produk ?>" width="100">
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <p>
                                        <?= $nama_produk ?>
                                    </p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="jumlah"><i class="bi bi-diagram-2-fill"></i></span>
                                        <input type="number" min="1" max="<?= $jumlah_kg ?>" name="jumlah" class="form-control" placeholder="Jumlah" aria-label="jumlah" aria-describedby="jumlah" readonly value="<?= $jumlah_kg ?>">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button type="submit" name="batal" onclick="return confirm('Yakin ingin membatalkan penjualan produk ini?')" class="btn btn-danger btn-sm"><i class="bi bi-cart-x"></i></button>
                                </div>
                            </td>
                        </form>
                        <?php $i++ ?>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('./template/foot.php') ?>