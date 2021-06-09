<?php
require 'functions.php';
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "
 			<script>
 			alert('data berhasil ditambahkan!');
 			document.location.href = 'index.php';
 			</script>
 		";
    } else {
        echo "
 			 <script>
 			alert('data gagal ditambahkan!');
 			document.location.href = 'index.php';
 			</script>
 		";
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah data Produk</title>
</head>

<body>
    <h1>Tambah data Produk</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="name">name :</label>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="category">category :</label>
                <input type="text" name="category" id="category">
            </li>
            <li>
                <label for="capacity">capacity :</label>
                <input type="text" name="capacity" id="capacity">
            </li>
            <li>
                <label for="price">price:</label>
                <input type="text" name="price" id="price">
            </li>
            <li>
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </li>
            <li>
                <label for="img">img :</label>
                <input type="file" name="img" id="img">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>


    </form>

</body>

</html>