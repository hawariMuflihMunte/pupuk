<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>


<?php

    $id = $_GET['id'];

    $sql = "SELECT
        *
    FROM
        pengguna
    WHERE
        id = $id
    ;";
    $query = mysqli_query($connection, $sql);
    list($id, $nama_lengkap, $username, $kata_sandi) = mysqli_fetch_array($query);

?>

<?php

    if (isset($_REQUEST['ubah'])) {
        $nama_lengkap = mysqli_real_escape_string($connection, trim($_REQUEST['nama_lengkap']));
        $username = mysqli_real_escape_string($connection, trim($_REQUEST['username']));

        $sql = "UPDATE
            pengguna
        SET
            nama_lengkap = '$nama_lengkap',
            username = '$username'
        WHERE
            id = $id
        ;";
        $query = mysqli_query($connection, $sql);

        if ($query) { // success
            echo "<script>
                window.alert('Berhasil mengubah data konsumen')
                window.location.href = './user.php'
            </script>";
        } else { // error
            echo "<script>
                window.alert('Gagal mengubah data konsumen. Terjadi kesalahan sistem')
            </script>";
        }
    }

?>

    <div class="container pt-5">
        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Edit Konsumen</h5>
                <hr>
                <form action="" method="post">
                    <p class="card-text">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nama_lengkap"><i class="bi bi-person-fill"></i></span>
                            <input
                                type="text"
                                name="nama_lengkap"
                                class="form-control"
                                placeholder="Nama Lengkap"
                                aria-label="nama_lengkap"
                                aria-describedby="nama_lengkap"
                                value="<?= $nama_lengkap ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username">@</span>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                placeholder="Username"
                                aria-label="Username"
                                aria-describedby="username"
                                value="<?= $username ?>">
                        </div>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="./user.php" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" name="ubah" class="btn btn-warning btn-sm">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('./template/foot.php') ?>