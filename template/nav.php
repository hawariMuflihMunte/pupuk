<?php include('./php/session.php') ?>

<?php if (isset($_SESSION['role'])): ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./page.php">Pupuk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['SCRIPT_FILENAME']) == 'page.php' ? 'active' : '' ?>" aria-current="page" href="./page.php">Home</a>
                </li>
                <?php if ($_SESSION['role'] == 1): ?>
                    <li class="nav-item">
                        <a href="./user.php" class="nav-link <?= basename($_SERVER['SCRIPT_FILENAME']) == 'user.php' ? 'active' : '' ?>">Data Konsumen</a>
                    </li>
                    <li class="nav-item">
                        <a href="./product.php" class="nav-link <?= basename($_SERVER['SCRIPT_FILENAME']) == 'product.php' ? 'active' : '' ?>">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="./transaction.php" class="nav-link <?= basename($_SERVER['SCRIPT_FILENAME']) == 'transaction.php' ? 'active' : '' ?>">Data Pembelian</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="./transaction.user.php" class="nav-link">Produk</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown d-lg-none">
                    <button class="btn btn-transparent dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i>
                        <?php
                            $role = $_SESSION['role'] == 1 ? 'Administrator' : 'Konsumen';
                            $name = $_SESSION['name'];
                            echo "$name ($role)";
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item  <?= basename($_SERVER['SCRIPT_FILENAME']) == 'profile.php' ? 'active' : '' ?>" href="./profile.php"><i class="bi bi-person-gear"></i> Profil</a></li>
                        <li><a class="dropdown-item text-danger" href="./logout.php"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="dropdown d-none d-lg-block">
            <button class="btn btn-transparent dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
                <?php
                    $role = $_SESSION['role'] == 1 ? 'Administrator' : 'Konsumen';
                    $name = $_SESSION['name'];
                    echo "$name ($role)";
                ?>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item  <?= basename($_SERVER['SCRIPT_FILENAME']) == 'profile.php' ? 'active' : '' ?>" href="./profile.php"><i class="bi bi-person-gear"></i> Profil</a></li>
                <li><a class="dropdown-item text-danger" href="./logout.php"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </div>
    </nav>
<?php endif; ?>