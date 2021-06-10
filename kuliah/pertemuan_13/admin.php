<?php
// koneksi ke database
require "functions.php";
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
$product = query("SELECT * FROM products");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$product = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Panel</title>

	<?php require_once 'parts/link-style.php' ?>
</head>

<body>

	<?php require_once 'parts/navbar.php' ?>
	<div id="page"></div>
	<div class="container">
		<div class="m-3">
			<div class="card" style="width: 100%;" id="product-row">
				<div class="card-body">
					<div class="row">
						<div class="col-md-5">
							<div class="add">
								<a href="tambah.php" class="btn btn-sm btn-outline-danger">Add New</a>
							</div>
						</div>
						<?php if (!empty($keyword)) : ?>
							<p>Looking product with keyword '<?= $keyword ?>'</p>
						<?php endif; ?>

					</div>
					<div class="col-md-2">
						<div class="logout float-right">

						</div>
					</div>
				</div>

				<div class="container-fluid mt-5">
					<div class="table-responsive">
						<table class="table table-hover table-sm" cellspacing="0">
							<caption>List of Storage</caption>
							<thead class="table-info">
								<tr class="text-center">
									<th>NO</th>
									<th>IMG</th>
									<th>NAME</th>
									<th>PRICE</th>
									<th>CAPACITY</th>
									<th>CATEGORY</th>
									<th colspan="2">ACTION</th>
								</tr>
							</thead>
							<?php if (empty($product)) : ?>
								<tr>
									<td colspan="8">
										<h2>Product not found, please use general keywords</h2>
									</td>
								</tr>
							<?php else : ?>
								<?php $i = 1; ?>
								<?php foreach ($product as $row) : ?>
									<tr class="text-center">
										<td><?= $i++; ?></td>
										<td><img src="img/<?= $row["img"]; ?>" alt="" class="img-tumbnail rounded" width="100px"></td>
										<td><?= strtoupper($row["name"]); ?></td>

										<td><?= rupiah($row["price"]); ?></td>
										<td>
											<?php
											$cate = $row["category"];
											$capa = $row["capacity"];
											if (preg_match("/SSD/i", $cate)) {
												echo $capa, strlen($capa) == 1 ? "TB" : "GB";
											} else {
												echo $capa, "GB";
											}
											?>
										</td>
										<td><?php
											$cate = $row["category"];
											switch ($cate) {
												case "SSD":
													echo "<span class='badge badge-info'>" . $row["category"] . "</span>";
													break;

												case "SSD NVME":
													echo "<span class='badge badge-success'>" . $row["category"] . "</span>";
													break;

												case "SSHD":
													echo "<span class='badge badge-warning'>" . $row["category"] . "</span>";
													break;

												case "HDD":
													echo "<span class='badge badge-primary'>" . $row["category"] . "</span>";
													break;
											} ?>
										</td>
										<td rowspan="2" class="row">
											<a href="ubah.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info col-md-6 update-link"><i class="fas fa-pencil-alt"></i></a>
											<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger col-md-6 delete-link"><i class="fas fa-trash-alt"></i></a>
										</td>
										<td></td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</table>
					</div>
				</div>

			</div>
		</div>


	</div>
	</div>
	<?php require_once 'parts/script.php' ?>
	<script>
		jQuery(document).ready(function($) {
			$('.delete-link').on('click', function() {
				var getLink = $(this).attr('href');

				Swal.fire({
					title: 'Warning!',
					text: 'Are you sure you want to delete it? data will be lost',
					icon: 'warning',
					// html:true,
					showCancelButton: true,
					cancelButtonColor: '#d33',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Yes, Delete It!'
				}).then((result) => {
					if (result.value) {
						Swal.fire({
							title: 'Success!',
							text: 'One Product has been deleted',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								window.location.href = getLink;
							}
						})
					}
				});
				return false;
			});
		});

		jQuery(document).ready(function($) {
			$('.update-link').on('click', function() {
				var getLink = $(this).attr('href');

				Swal.fire({
					title: 'Warning!',
					text: 'Are you sure you want to edit it?',
					icon: 'question',
					// html:true,
					showCancelButton: true,
					cancelButtonColor: '#d33',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Yes'
				}).then((result) => {
					if (result.value) {
						window.location.href = getLink;
					}
				});
				return false;
			});
		});

		
	</script>
</body>

</html>