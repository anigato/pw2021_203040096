<?php
// koneksi ke database
require "functions.php";
$product = query("SELECT * FROM products");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$product = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>All Product</title>

	<?php require_once 'parts/link-style.php' ?>
</head>

<body>

	<?php require_once 'parts/navbar.php' ?>

	
	<div class="container">
		<div class="my-3">
			<h2 class="text-center text-danger">Daftar Produk</h2>
			<hr>
			<div id="product-row">
				<div class="row">
					<?php foreach ($product as $row) : ?>
						<div class="col-lg-3 col-sm-6">
							<div class="card card-no-top my-3">
								<a class="text-decoration-none products" on href="detail.php?id=<?= $row['id'] ?>">
									<div class="card-body">
										<div class="gambar-index text-center">
											<img src="img/<?= $row["img"] ?>" alt="" class="img-tumbnail rounded">
										</div>
										<h6 class="text-center font-weight-bold text-danger mt-2 text-uppercase"><?= $row["name"] ?></h6>
										<h6 class="text-center font-weight-bolder"><?= rupiah($row["price"]); ?></h6>
									</div>
								</a>
								<input id="btn-cart" type="button" class="btn-danger form-control btn-cart" value="Tambahkan Ke Keranjang"></input>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>


	<?php require_once 'parts/script.php' ?>
</body>

</html>