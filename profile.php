<?php include('./template/head.php') ?>
<?php include('./php/connection.php') ?>
    <?php include('./template/nav.php') ?>

    <div class="container pt-5">
        <h5 class="text-secondary">Profil</h5>
        <hr>
        <div class="border p-3">
            <div class="d-flex gap-5">
                <p>Nama</p>
                <span>:</span>
                <p><?= $_SESSION['name'] ?></p>
            </div>
            <div class="d-flex gap-3">
                <p>Username</p>
                <span>:</span>
                <p class="ms-4"><?= $_SESSION['username'] ?></p>
            </div>
            <div class="d-flex gap-5">
                <p>Role</p>
                <span>:</span>
                <p><?= $_SESSION['role'] == 1 ? 'Administrator' : 'Konsumen' ?></p>
            </div>
            <hr>
            <div class="d-flex justify-content-center">
                <p>
                    <a href="./profile.change.php">Ganti kata Sandi</a>
                </p>
            </div>
        </div>
    </div>

<?php include('./template/head.php') ?>