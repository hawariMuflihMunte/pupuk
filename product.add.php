<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>

<?php

    if (isset($_REQUEST['tambah'])) {
        $gambar = mysqli_real_escape_string($connection, trim($_REQUEST['gambar']));
        $nama_produk = mysqli_real_escape_string($connection, trim($_REQUEST['nama_produk']));
        $jumlah = mysqli_real_escape_string($connection, trim($_REQUEST['jumlah']));

        $sql = "INSERT INTO produk (
            nama_produk,
            gambar_produk,
            jumlah_produk_kg
        )
        VALUES (
            '$nama_produk',
            '$gambar',
            $jumlah
        )
        ;";
        $query = mysqli_query($connection, $sql);

        if ($query) { // success
            echo "<script>
                window.alert('Berhasil menambah data produk')
                window.location.href = './product.php'
            </script>";
        } else { // error
            echo "<script>
                window.alert('Gagal menambah data produk. Terjadi kesalahan sistem')
            </script>";
        }
    }

?>

    <div class="container pt-5">
        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Tambah Produk</h5>
                <hr>
                <form action="" method="post">
                    <p class="card-text">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="gambar"><i class="bi bi-card-image"></i></span>
                            <input type="text" name="gambar" class="form-control" placeholder="Link gambar" aria-label="gambar" aria-describedby="gambar">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nama_produk">@</span>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" aria-label="nama_produk" aria-describedby="nama_produk">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="jumlah"><i class="bi bi-diagram-2-fill"></i></span>
                            <input type="number" min="1" name="jumlah" class="form-control" placeholder="Jumlah" aria-label="jumlah" aria-describedby="jumlah">
                            <span class="input-group-text">kg</span>
                        </div>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="./product.php" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" name="tambah" class="btn btn-warning btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('./template/foot.php') ?>