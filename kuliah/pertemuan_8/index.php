<?php 
// koneksi ke database
$conn = mysqli_connect("Localhost", "root", "", "pw_kuliah");

// ambil data dari tabel produk / query data produk
$result = mysqli_query($conn, "SELECT * FROM products");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
<h1>Daftar produk</h1>

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

<?php $i=1; ?>
<?php while( $row = mysqli_fetch_assoc($result)) :?>
<tr>
	<td><?= $i;?></td>
	<td><img src="img/<?=  $row["img"]; ?>" width="50"></td>
	<td><?= $row["name"];?></td>
	<td><?= $row["description"];?></td>
	<td><?= $row["price"];?></td>
	<td><?= $row["category"];?></td>
	<td><?= $row["capacity"];?></td>
	<td>
		<a href="">ubah</a> |
		<a href="">hapus</a>
	</td>
	</tr>
	<?php $i++; ?>
<?php endwhile; ?>
</table>
</body>
</html>