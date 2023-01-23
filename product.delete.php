<?php include('./php/connection.php') ?>

<?php

$id = $_GET['id'];

$sql = "DELETE
FROM
    produk
WHERE
    id = $id
;";
$query = mysqli_query($connection, $sql);

if ($query) { // success
    echo "<script>
        window.alert('Berhasil menghapus produk')
        window.location.href = './product.php'
    </script>";
    exit();
} else { // error
    echo "<script>
        window.alert('Gagal menghapus produk. Terjadi kesalahan sistem')
        window.location.href = './product.php'
    </script>";
    exit();
}