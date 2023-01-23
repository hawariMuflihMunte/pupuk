<?php include('./php/session.php') ?>

<?php if (!isset($_SESSION['role'])): ?>
    <?php
        header('location: ./index.php');
        exit();
    ?>
<?php else: ?>
    <?php if ($_SESSION['role'] == 1): ?>
        <!-- Admin # -->
        <?php include('./template/head.php') ?>
        <?php include('./php/connection.php') ?>
            <?php include('./template/nav.php') ?>
            <div class="container pt-5">
                <div class="d-flex gap-3">
                    <div class="card" style="width: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Konsumen</h5>
                            <hr>
                            <p class="card-text text-muted">
                                Data konsumen
                            </p>
                            <a href="./user.php" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Produk</h5>
                            <hr>
                            <p class="card-text text-muted">
                                Data produk
                            </p>
                            <a href="./product.php" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card" style="width: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Pembelian</h5>
                            <hr>
                            <p class="card-text text-muted">
                                Data Pembelian
                            </p>
                            <a href="./transaction.php" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php include('./template/foot.php') ?>
        <!-- # Admin -->
    <?php else: ?>
        <!-- User # -->
        <?php include('./template/head.php') ?>
        <?php include('./php/connection.php') ?>
            <?php include('./template/nav.php') ?>

            <?php
            
                if (isset($_REQUEST['return'])) {
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
                                window.alert('Berhasil mengembalikan produk')
                                window.location.href = './page.php'
                            </script>";
                        } else {
                            echo "<script>
                                window.alert('Gagal mengembalikan produk. Terjadi kesalahan sistem')
                                window.location.href = './page.php'
                            </script>";
                        }

                    } else {
                        echo "<script>
                            window.alert('Gagal mengembalikan produk. Terjadi kesalahan sistem')
                            window.location.href = './page.php'
                        </script>";
                    }
                }
            
            ?>
            
            <div class="container pt-5">
                <h4 class="text-secondary">Selamat Datang</h4>
                <hr>
                <?php
                
                $id = $_SESSION['id'];
                $sql = "SELECT
                    *
                FROM
                    pembelian
                WHERE
                    id_pengguna = $id
                ;";
                $query = mysqli_query($connection, $sql);

                ?>
                <?php if (mysqli_num_rows($query) > 0): ?>
                    <h5 class="text-secondary pt-3">Produk yang dibeli</h5>
                    <div class="table-responsive pt-3">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                            $id = $_SESSION['id'];
                            $sql = "SELECT
                                pb.id id,
                                pb.id_produk id_produk,
                                pr.nama_produk nama_produk,
                                pr.gambar_produk gambar,
                                pb.jumlah_beli_produk jumlah
                            FROM
                                pembelian pb
                            JOIN produk pr ON
                                pb.id_produk = pr.id
                            WHERE
                                pb.id_pengguna = $id
                            ;";
                            $query = mysqli_query($connection, $sql);
                            $i = 1;

                            ?>
                            <?php while(list($id, $id_produk, $nama_produk, $gambar, $jumlah_kg) = mysqli_fetch_array($query)): ?>
                                <tr>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                        <td><?= $i ?></td>
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
                                        <td></td>
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                <button type="submit" name="return" onclick="return confirm('Yakin ingin mengembalikan produk ini?')" class="btn btn-danger btn-sm"><i class="bi bi-cart-x"></i></button>
                                            </div>
                                        </td>
                                    </form>
                                    <?php $i++ ?>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <h5 class="text-secondary">
                        Tidak ada produk yang dibeli
                    </h5>
                <?php endif; ?>
            </div>
        <?php include('./template/foot.php') ?>
        <!-- # User -->
    <?php endif; ?>
<?php endif; ?>