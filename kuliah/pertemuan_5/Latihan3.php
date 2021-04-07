<?php 
$Produk =[
			["SANDISK", "120GB", "SSD", "260000"],
			["ADATA XPG SX8200 PRO", "512GB", "SSD NVME", "1500000"],
			["APACER", "240GB", "SSD", "530000"]
];

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Produk</title>
 </head>
 <body>

 <h1>Daftar Produk</h1>
<?php foreach($Produk as $pro) : ?>
<ul>
<li>Nama :<?= $pro[0]; ?></li>
<li>Kapasitas :<?= $pro[1]; ?></li>
<li>Kategori :<?= $pro[2]; ?></li>
<li>Harga<?= $pro[3]; ?></li>
</ul>
<?php endforeach; ?>




 
 </body>
 </html>