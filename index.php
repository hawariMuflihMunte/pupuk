<?php include('./php/session.php') ?>

<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>

<?php

    if (isset($_REQUEST['masuk'])) {
        $username = mysqli_real_escape_string($connection, trim($_REQUEST['username']));
        $kata_sandi = mysqli_real_escape_string($connection, trim($_REQUEST['kata_sandi']));

        $sql = "SELECT
            *
        FROM
            pengguna
        WHERE
            username = '$username' AND
            kata_sandi = '$kata_sandi'
        ;";
        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) { // success
            list(
                $id,
                $nama_lengkap,
                $username,
                $kata_sandi,
                $role
            ) = mysqli_fetch_array($query);

            $_SESSION['id'] = $id;
            $_SESSION['name'] = $nama_lengkap;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            header('location: ./page.php');
            exit();
        } else { // error
            echo "<script>
                window.alert('Username/kata sandi salah')
            </script>";
        }
    }

?>

<div class="container mt-5 pt-5">
    <div class="card mx-auto" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title">Pupuk</h5>
            <h6 class="card-subtitle mb-0 text-muted">masuk</h6>
            <hr>
            <form action="" method="post">
                <p class="card-text">
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
                    <span></span>
                    <button type="submit" name="masuk" class="btn btn-primary">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('./template/foot.php') ?>