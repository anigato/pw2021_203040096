<?php
require 'functions.php';

$id = $_GET["id"];



$product = query("SELECT * FROM products WHERE id = $id")[0];


// cek apakah tombol submit sudah diubah atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
 			<script>
 			alert('data berhasil diubah!');
 			document.location.href = 'index.php'
 			</script>
 		";
    } else {
        echo "
 			 <script>
 			alert('data gagal diubah!');
 			document.location.href = 'index.php'
 			</script>
 		";
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Update data products</title>
</head>

<body>
    <h1>Update data products</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $product["id"]; ?>">
        <ul>
            <li>
                <label for="name">name :</label>
                <input type="text" value="<?= $product["name"]; ?>" name="name" id="name" required>
            </li>
            <li>
                <label for="category">category :</label>
                <input type="text" value="<?= $product["category"]; ?>" name="category" id="category">
            </li>
            <li>
                <label for="capacity">capacity :</label>
                <input type="text" value="<?= $product["capacity"]; ?>" name="capacity" id="capacity">
            </li>
            <li>
                <label for="price">price:</label>
                <input type="text" value="<?= $product["price"]; ?>" name="price" id="price">
            </li>
            <li>
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="10"><?= $product["description"]; ?></textarea>
            </li>
            <li>
                <label for="img">img :</label>
                <input type="file" value="<?= $product["img"]; ?>" name="img" id="img">
            </li>
            <li>
                <button type="submit" name="submit">Update Data!</button>
            </li>
        </ul>


    </form>

</body>

</html>