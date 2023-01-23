<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>

<?php

    if (isset($_REQUEST['tambah'])) {
        $nama_lengkap = mysqli_real_escape_string($connection, trim($_REQUEST['nama_lengkap']));
        $username = mysqli_real_escape_string($connection, trim($_REQUEST['username']));
        $kata_sandi = mysqli_real_escape_string($connection, trim($_REQUEST['kata_sandi']));

        $sql = "INSERT INTO pengguna (
            nama_lengkap,
            username,
            kata_sandi
        )
        VALUES (
            '$nama_lengkap',
            '$username',
            '$kata_sandi'
        )
        ;";
        $query = mysqli_query($connection, $sql);

        if ($query) { // success
            echo "<script>
                window.alert('Berhasil menambah data konsumen')
                window.location.href = './user.php'
            </script>";
        } else { // error
            echo "<script>
                window.alert('Gagal menambah data konsumen. Terjadi kesalahan sistem')
            </script>";
        }
    }

?>

    <div class="container pt-5">
        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Tambah Konsumen</h5>
                <hr>
                <form action="" method="post">
                    <p class="card-text">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nama_lengkap"><i class="bi bi-person-fill"></i></span>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" aria-label="nama_lengkap" aria-describedby="nama_lengkap">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username">@</span>
                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="kata_sandi"><i class="bi bi-person-fill-lock"></i></span>
                            <input type="password" name="kata_sandi" class="form-control" placeholder="Kata sandi" aria-label="Kata_sandi" aria-describedby="kata_sandi">
                        </div>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="./user.php" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" name="tambah" class="btn btn-warning btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('./template/foot.php') ?>