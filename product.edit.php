<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>

<?php

    $id = $_GET['id'];

    $sql = "SELECT
        *
    FROM
        produk
    WHERE
        id = $id
    ;";
    $query = mysqli_query($connection, $sql);
    list($id, $nama_produk, $gambar, $jumlah) = mysqli_fetch_array($query);

?>

<?php

    if (isset($_REQUEST['ubah'])) {
        $gambar = mysqli_real_escape_string($connection, trim($_REQUEST['gambar']));
        $nama_produk = mysqli_real_escape_string($connection, trim($_REQUEST['nama_produk']));
        $jumlah = mysqli_real_escape_string($connection, trim($_REQUEST['jumlah']));

        $sql = "UPDATE
            produk
        SET
            nama_produk ='$nama_produk',
            gambar_produk = '$gambar',
            jumlah_produk_kg = $jumlah
        WHERE
            id = $id
        ;";
        $query = mysqli_query($connection, $sql);

        if ($query) { // success
            echo "<script>
                window.alert('Berhasil mengubah data produk')
                window.location.href = './product.php'
            </script>";
        } else { // error
            echo "<script>
                window.alert('Gagal mengubah data produk. Terjadi kesalahan sistem')
            </script>";
        }
    }

?>

    <div class="container pt-5">
        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Edit Produk</h5>
                <hr>
                <form action="" method="post">
                    <p class="card-text">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="gambar"><i class="bi bi-card-image"></i></span>
                            <input
                                type="text"
                                name="gambar"
                                class="form-control"
                                placeholder="Link gambar"
                                aria-label="gambar"
                                aria-describedby="gambar"
                                value="<?= $gambar ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nama_produk">@</span>
                            <input
                                type="text"
                                name="nama_produk"
                                class="form-control"
                                placeholder="Nama produk"
                                aria-label="nama_produk"
                                aria-describedby="nama_produk"
                                value="<?= $nama_produk ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="jumlah"><i class="bi bi-diagram-2-fill"></i></span>
                            <input
                                type="number"
                                min="1"
                                name="jumlah"
                                class="form-control"
                                placeholder="Jumlah"
                                aria-label="jumlah"
                                aria-describedby="jumlah"
                                value="<?= $jumlah ?>">
                            <span class="input-group-text">kg</span>
                        </div>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="./product.php" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" name="ubah" class="btn btn-warning btn-sm">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('./template/foot.php') ?>