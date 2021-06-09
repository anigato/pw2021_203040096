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
	<title>Halaman Admin</title>
</head>

<body>
	<h1>Daftar Produk</h1>
	<a href="tambah.php">Tambah data Produk</a>
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Kapasitas</th>
			<th>Aksi</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach($product as $row) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td><img src="img/<?= $row["img"]; ?>" width="50"></td>
				<td><?= $row["name"]; ?></td>
				<td><?= $row["description"]; ?></td>
				<td><?= $row["price"]; ?></td>
				<td><?= $row["category"]; ?></td>
				<td><?= $row["capacity"]; ?></td>
				<td>
					<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
					<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</body>

</html>