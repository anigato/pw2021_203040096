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
    $img = htmlspecialchars($data["img"]);



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


function ubah($data){
    global $conn;
    $id = $data['id'];
    $name = htmlspecialchars($data["name"]);
    $category = htmlspecialchars($data["category"]);
    $capacity = htmlspecialchars($data["capacity"]);
    $description = htmlspecialchars($data["description"]);
    $price = htmlspecialchars($data["price"]);
    $img = htmlspecialchars($data["img"]);

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

function cari ($keyword) {
	$query = "SELECT * FROM products 
				WHERE 
				name LIKE '%$keyword%' OR
				category LIKE '%$keyword%' OR
				capacity LIKE '%$keyword%'
				";
	return query($query);
}