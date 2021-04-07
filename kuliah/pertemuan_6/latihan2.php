<?php 	
// $produk = [["SANDISK", "120GB", "SSD", "260000"],
// 			["APACER", "240GB", "SSD", "530000"],
// ];	

// Array Associative
// definisinya sama seperti array numerik,kecuali 
// key-nya adalah string yang kita buat sendiri
$produk = [
	[
		"nama"=>"SANDISK",
		 "kapasitas" => "120GB",
		 "kategori" =>"SSD",
		 "harga" =>"260000",
		 "gambar" =>"sandisk1.png"
    ],
    [
		 "nama"=>"APACER",
		 "kapasitas" => "033040023",
		 "kategori" =>"SSD",
		 "harga" =>"530000",
		"gambar" =>"ssd-apacer.png"
    ]
];

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar produk</title>
 </head>
 <body>
 <h1>Daftar produk</h1>
 <?php 	foreach($produk as $mhs) :?>

 <ul>
 	<li>
 		<img width="100" src="img/<?= $mhs["gambar"]; ?>">
 	</li>
 	<li>Nama :<?= $mhs["nama"]; ?></li>
 	<li>kapasitas :<?= $mhs["kapasitas"]; ?></li>
 	<li>kategori :<?= $mhs["kategori"]; ?></li>
 	<li>harga :<?= $mhs["harga"]; ?></li>
 </ul>
<?php 	endforeach; ?>
 
 </body>
 </html>