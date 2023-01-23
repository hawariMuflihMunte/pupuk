<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupuk |
    <?php

        switch(basename($_SERVER['SCRIPT_FILENAME'])) {
            case 'index.php':
                echo "Masuk";
                break;
            case 'page.php':
                echo "Home";
                break;
            case 'profile.php':
                echo "Profil";
                break;
            case 'user.php':
                echo "Data Konsumen";
                break;
            case 'user.add.php':
                echo "Tambah Konsumen";
                break;
            case 'user.edit.php':
                echo "Edit Konsumen";
                break;
            case 'product.php':
                echo "Data Produk";
                break;
            case 'product.add.php':
                echo "Tambah Produk";
                break;
            case 'product.edit.php':
                echo "Edit Produk";
                break;
            case 'transaction.php':
                echo "Data Pembelian";
                break;
            case 'transaction.user.php':
                echo "Pembelian produk";
                break;
        }
    
    ?>
    </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>