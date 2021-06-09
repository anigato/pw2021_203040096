<?php
// ambil file function.php
require 'php/function.php';
// query
$res = query("select*from products");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>ANIGASTORE - Halaman Utama</title>
    <style>

    </style>
</head>

<body>

    <div class="container">
        <div class="my-3">
            <h2>Produk Terlaris</h2>
            <a href="php/admin.php">Halaman Admin</a>
            <hr>
            <div class="row">
                <?php foreach ($res as $row) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-no-top my-3">
                            <a class="text-decoration-none products" on href="php/detail.php?id=<?= $row['id'] ?>">
                                <div class="card-body">
                                    <div class="gambar-index text-center">
                                        <img src="assets/img/<?= $row["img"] ?>" alt="" class="img-tumbnail rounded">
                                    </div>
                                    <h6 class="text-center font-weight-bold text-info mt-2"><?= $row["name"] ?></h6>
                                    <h6 class="text-center text-danger font-weight-bolder"><?= rupiah($row["price"]); ?></h6>
                                </div>
                            </a>
                            <input id="btn-cart" type="button" class="btn-info form-control btn-cart" value="Tambahkan Ke Keranjang"></input>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>