<?php
// koneksi ke database
$conn = mysqli_connect("Localhost", "root", "", "pw_kuliah");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $category = htmlspecialchars($data["category"]);
    $capacity = htmlspecialchars($data["capacity"]);
    $description = htmlspecialchars($data["description"]);
    $price = htmlspecialchars($data["price"]);

    //  upload gambar
    $img = upload();
    if (!$img) {
        return false;
    }

    $query = "INSERT INTO products
                VALUES 
                ('', '$name', '$category', '$capacity', '$description', '$price','$img')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $name = htmlspecialchars($data["name"]);
    $category = htmlspecialchars($data["category"]);
    $capacity = htmlspecialchars($data["capacity"]);
    $description = htmlspecialchars($data["description"]);
    $price = htmlspecialchars($data["price"]);
    $img = htmlspecialchars($data["img"]);

    if( $_FILES['img'] ['error'] === 4 ) {
		$img = $imgLama;
	} else {
		$img = upload();
	}

    $query = "UPDATE products SET
 				name = '$name',
 				category = '$category',
 				capacity = '$capacity',
 				description = '$description',
 				price = '$price',
 				img = '$img'
 				WHERE id = $id
 				";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['img']['name'];
    $ukuranFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];

    //  cek apakah tidak ada img yang di upload
    if ($error === 4) {
        echo "<script>
				alert('pilih img terlebih dahulu!');
		</script>";
        return false;
    }
    // cek apakah yang diupload adalah img
    $ekstensiimgValid = ['jpg', 'jpeg', 'png'];
    $ekstensiimg = explode('.', $namaFile);
    $ekstensiimg = strtolower(end($ekstensiimg));
    if (!in_array($ekstensiimg, $ekstensiimgValid)) {
        echo "<script>
				alert('yang anda upload bukan img!');
		</script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
				alert('ukuran Gambar terlalu besar!');
		</script>";
        return false;
    }

    // lolos pengecekan, img siap diupload
    // generate nama img baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiimg;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function cari($keyword)
{
    $query = "SELECT * FROM products 
				WHERE 
				name LIKE '%$keyword%' OR
				category LIKE '%$keyword%' OR
				capacity LIKE '%$keyword%'
				";
    return query($query);
}
