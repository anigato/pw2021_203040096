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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">HOME</a></li>
                <li class="breadcrumb-item"><a href="#"><?= $product["category"] ?></a></li>
                <li class="breadcrumb-item"><a href="#"><?= $product["brand"] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $product["name"] ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6">
                <div class="gambar">
                    <img src="../assets/img/<?= $product["img"] ?>" alt="" class="img-tumbnail rounded">
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                if ($product["stok"] > 50) {
                    echo "<span class='badge badge-success'>Stok Masih Banyak</span>";
                } else if ($product["stok"] > 10) {
                    echo "<span class='badge badge-warning'>Stok Sudah Sedikit</span>";
                } else {
                    echo "<span class='badge badge-danger'>Stok Hampir Habis</span>";
                }
                ?>
                <h2 class="font-weight-bold text-uppercase"><?= $product["name"] ?></h2>
                <p><?= (str_word_count($product["description"]) > 200 ? substr($product["description"], 0, 250) . "...." : $product["description"]); ?></p>

                <table class="table mt-3">
                    <tr>
                        <td>Merk</td>
                        <td>:</td>
                        <td><?= $product["brand"] ?></td>
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
                    <tr>
                        <td>Stok</td>
                        <td>:</td>
                        <td><?= $product["stok"] ?>pcs</td>
                    </tr>
                </table>

                <h3 class="text-danger font-weight-bold"><?= rupiah($product["price"]); ?></h3>

            </div>

        </div>
        <div class="row ml-1">
            <div class="col-lg-6">
                <div class="share mt-2">
                    <div class="addthis_inline_share_toolbox_joi1"></div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <form class="form-inline">
                    <div class="row">
                        <div class="col">
                            <label for="qty"></label>
                            <input type="number" class="form-control" placeholder="Jumlah" id="qty" name="qty">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Masukan Ke Keranjang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <div class="keterangan mt-3">
            <div class="card">
                <div class="card-header">
                    <nav>
                        <div class="nav nav-tabs" id="desc-tab" role="tablist">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Deskripsi</a>
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Ulasan</a>
                            <a class="nav-link" id="disscusion-tab" data-toggle="tab" href="#disscusion" role="tab" aria-controls="disscusion" aria-selected="false">Diskusi</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="desc-tabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Spesifikasi</h3>
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
                                </div>
                            </div>
                            <?= $product["description"] ?>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">tab ulasan</div>
                        <div class="tab-pane fade" id="disscusion" role="tabpanel" aria-labelledby="disscusion-tab">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e9e4256855b7795"></script>
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://anigastore.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//anigastore.disqus.com/count.js" async></script>



</body>

</html>