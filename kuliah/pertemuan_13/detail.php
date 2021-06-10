<?php
// koneksi ke database
require "functions.php";
if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
}
$id = $_GET['id'];
$product = query("SELECT * FROM products where id = $id")[0];
?>
<!DOCTYPE html>
<html>

<head>
    <title>ANIGASTORE - <?= $product["name"] ?></title>

    <?php require_once 'parts/link-style.php' ?>
</head>

<body>

    <?php require_once 'parts/navbar.php' ?>

    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                <li class="breadcrumb-item"><a href="#"><?= $product["category"] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $product["name"] ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6">
                <div class="gambar">
                    <img src="img/<?= $product["img"] ?>" alt="" class="img-tumbnail rounded">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-uppercase"><?= $product["name"] ?></h2>
                <p><?= shortDesc(htmlspecialchars_decode($product["description"]), 200); ?></p>

                <table class="table mt-3">
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
                </table>

                <h3 class="text-danger font-weight-bold"><?= rupiah($product["price"]); ?></h3>

            </div>

        </div>
        <div class="row ml-1 pt-5">
            <div class="col-md-6">
                <div class="p">Bagikan :</div>
                <div class="share mt-2">
                    <div class="addthis_inline_share_toolbox_c0ma"></div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
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
                                    </table>
                                </div>
                            </div>
                            <?= htmlspecialchars_decode($product["description"]) ?>
                        </div>
                        <div class="tab-pane fade" id="disscusion" role="tabpanel" aria-labelledby="disscusion-tab">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php require_once 'parts/script.php' ?>
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