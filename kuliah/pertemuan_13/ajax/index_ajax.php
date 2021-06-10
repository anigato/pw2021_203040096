<?php
// koneksi ke database
require "../functions.php";
$keyword = $_GET["keyword"];

$query =  " SELECT * FROM products 
	WHERE 
	name LIKE '%$keyword%' OR
	category LIKE '%$keyword%' OR
	capacity LIKE '%$keyword%'
	";
$product = query($query);

?>
<div class="row">
	<?php foreach ($product as $row) : ?>
		<div class="col-lg-3 col-sm-6">
			<div class="card card-no-top my-3">
				<a class="text-decoration-none products" on href="detail.php?id=<?= $row['id'] ?>">
					<div class="card-body">
						<div class="gambar-index text-center">
							<img src="img/<?= $row["img"] ?>" alt="" class="img-tumbnail rounded">
						</div>
						<h6 class="text-center font-weight-bold text-info mt-2 text-uppercase"><?= $row["name"] ?></h6>
						<h6 class="text-center text-danger font-weight-bolder"><?= rupiah($row["price"]); ?></h6>
					</div>
				</a>
				<input id="btn-cart" type="button" class="btn-info form-control btn-cart" value="Tambahkan Ke Keranjang"></input>
			</div>
		</div>
	<?php endforeach; ?>
</div>