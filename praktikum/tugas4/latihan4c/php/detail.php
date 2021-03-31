<?php
require 'function.php';

if (!isset($_GET['id'])) {
    header("location: ../index/php");
    exit;
}
$id = $_GET['id'];

$product = query("select*from products where id=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <div class="font-weight-bold font-size-11 mb-2 "><?= $product["category"] ?> &raquo; <?= $product["brand"] ?> &raquo; <?= $product["name"] ?></div>

        <div class="row">
            <div class="col-lg-6">
                <div class="gambar">
                    <img src="../assets/img/<?= $product["img"] ?>" alt="" class="img-tumbnail rounded">
                </div>
                <div class="share mt-2">
                    <div class="addthis_inline_share_toolbox_joi1"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                    if($product["stok"]>50){
                        echo "<span class='badge badge-success'>Stok tersisa ".$product["stok"]." produk</span>";
                    } else if($product["stok"]>10){
                        echo "<span class='badge badge-warning'>Stok tersisa ".$product["stok"]." produk</span>";
                    } else {
                        echo "<span class='badge badge-danger'>Stok tersisa ".$product["stok"]." produk</span>";
                    }
                ?>
                <h1 class="font-weight-bold text-uppercase"><?= $product["name"] ?></h1>
                <?= (str_word_count($product["description"]) > 200 ? substr($product["description"], 0, 200) . "...." : $product["description"]); ?>

                <table class="table mt-3">
                    <tr>
                        <td>SKU Produk</td>
                        <td>:</td>
                        <td><?= $product["sku"] ?></td>
                    </tr>
                    <tr>
                        <td>Merk</td>
                        <td>:</td>
                        <td><?= $product["brand"] ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td><?= $product["category"] ?></td>
                    </tr>
                    <tr>
                        <td>Kapasitas</td>
                        <td>:</td>
                        <td><?php
                            $cate = $product["category"];
                            $capa = $product["capacity"];
                            if (preg_match("/SSD/i", $cate)) {
                                echo $capa, strlen($capa) == 1 ? " TB" : " GB";
                            } else {
                                echo $capa, " GB";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td>Berat</td>
                        <td>:</td>
                        <td><?= $product["weight"] ?>gr</td>
                    </tr>
                </table>

                <h4><?= rupiah($product["price"]); ?></h4>

            </div>
        </div>

        <div class="keterangan">
            <nav>
                <div class="nav nav-tabs" id="desc-tab" role="tablist">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Deskripsi</a>
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Ulasan</a>
                    <a class="nav-link" id="disscusion-tab" data-toggle="tab" href="#disscusion" role="tab" aria-controls="disscusion" aria-selected="false">Diskusi</a>
                </div>
            </nav>
            <div class="tab-content" id="desc-tabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"><?= $product["description"] ?></div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">tab ulasan</div>
                <div class="tab-pane fade" id="disscusion" role="tabpanel" aria-labelledby="disscusion-tab">tab diskusi</div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e9e4256855b7795"></script>



</body>

</html>