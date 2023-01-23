<?php include('./php/session.php') ?>

<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>
    <?php include('./template/nav.php') ?>

        <?php
        
            if (isset($_REQUEST['beli'])) {
                $id_user = $_SESSION['id'];
                $id_barang = $_REQUEST['id'];
                $jumlah_beli_kg = $_REQUEST['jumlah'];

                $sql = "INSERT INTO pembelian (
                    id_pengguna,
                    id_produk,
                    jumlah_beli_produk
                )
                VALUES (
                    $id_user,
                    $id_barang,
                    $jumlah_beli_kg
                )
                ;";
                $query = mysqli_query($connection, $sql);

                if ($query) {
                    $select = "SELECT * FROM pembelian WHERE id_pengguna = $id_user AND id_produk = $id_barang;";
                    $select = mysqli_query($connection, $select);
                    list($id, $id_pengguna, $id_produk, $jumlah_beli_produk) = mysqli_fetch_array($select);

                    $sql = "UPDATE
                        produk
                    SET
                        jumlah_produk_kg = jumlah_produk_kg - $jumlah_beli_kg
                    WHERE
                        id = $id_produk
                    ;";
                    $query = mysqli_query($connection, $sql);

                    if ($query) {
                        echo "<script>
                            window.alert('Berhasil membeli produk')
                            window.location.href = './page.php'
                        </script>";
                    } else {
                        echo "<script>
                            window.alert('Gagal membeli produk. Terjadi kesalahan sistem')
                            window.location.href = './page.php'
                        </script>";    
                    }

                } else {
                    echo "<script>
                        window.alert('Gagal membeli produk. Terjadi kesalahan sistem')
                        window.location.href = './page.php'
                    </script>";
                }
            }
        
        ?>

        <div class="container pt-5">
            <h3 class="text-secondary">Produk</h3>
            <hr>
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
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $id ?>">
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
                                            <input type="number" min="1" max="<?= $jumlah_kg ?>" name="jumlah" class="form-control" placeholder="Jumlah" aria-label="jumlah" aria-describedby="jumlah" required>
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <button type="submit" name="beli" class="btn btn-primary btn-sm"><i class="bi bi-cart-check"></i></button>
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