<?php include('./php/connection.php') ?>

<?php

$id = $_GET['id'];

$sql = "DELETE
FROM
    pengguna
WHERE
    id = $id
;";
$query = mysqli_query($connection, $sql);

if ($query) { // success
    echo "<script>
        window.alert('Berhasil menghapus konsumen')
        window.location.href = './user.php'
    </script>";
    exit();
} else { // error
    echo "<script>
        window.alert('Gagal menghapus konsumen. Terjadi kesalahan sistem')
        window.location.href = './user.php'
    </script>";
    exit();
}