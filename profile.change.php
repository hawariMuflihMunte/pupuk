<?php include('./php/session.php') ?>

<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>

<?php
    $id = $_SESSION['id'];

    if (isset($_REQUEST['ubah'])) {
        $kata_sandi = mysqli_real_escape_string($connection, trim($_REQUEST['kata_sandi']));

        $sql = "UPDATE
            pengguna
        SET
            kata_sandi = '$kata_sandi'
        WHERE
            id = $id
        ;";
        $query = mysqli_query($connection, $sql);

        if ($query) { // success
            echo "<script>
                window.alert('Berhasil mengubah kata sandi')
                window.location.href = './profile.php'
            </script>";
        } else { // error
            echo "<script>
                window.alert('Gagal mengubah kata sandi. Terjadi kesalahan sistem')
            </script>";
        }
    }

?>

    <div class="container pt-5">
        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Edit Kata Sandi</h5>
                <hr>
                <form action="" method="post">
                    <p class="card-text">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="kata_sandi"><i class="bi bi-person-fill-lock"></i></span>
                            <input
                                type="password"
                                name="kata_sandi"
                                class="form-control"
                                placeholder="Kata sandi"
                                aria-label="kata_sandi"
                                aria-describedby="kata_sandi">
                        </div>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="./profile.php" class="btn btn-secondary btn-sm">Kembali</a>
                        <button type="submit" name="ubah" class="btn btn-warning btn-sm">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('./template/foot.php') ?>