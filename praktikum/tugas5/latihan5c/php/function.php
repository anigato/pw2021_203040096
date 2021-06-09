<?php
// fungsi koneksi db
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "pw_tubes_203040096");
    return $conn;
}
// fungsi masukan hasil query ke array
function query($sql){
    $conn = koneksi();
    $res = mysqli_query($conn,"$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    return $rows;
}
// fungsi merubah format harga
function rupiah($harga)
{
    $hasil_harga = "Rp. " . number_format($harga, 2, ',', '.');
    return $hasil_harga;
}
// fungsi mempersingkat deskripsi
function shortDesc($desc,$longChar){
    if (strlen($desc) >= $longChar) {
        $data = substr($desc, 0, $longChar) . ".....";
    } else {
        $data = $desc;
    }
    return $data;
}

// tambah data ke database
function tambah($data){
    $conn = koneksi();

    $name = htmlspecialchars($data['name']);
    $brand = htmlspecialchars($data['brand']);
    $category = htmlspecialchars($data['category']);
    $capacity = htmlspecialchars($data['capacity']);
    $stok = htmlspecialchars($data['stok']);
    $weight = htmlspecialchars($data['weight']);
    $sku = htmlspecialchars($data['sku']);
    $price = htmlspecialchars($data['price']);
    $description = htmlspecialchars($data['description']);
    $img = htmlspecialchars($data['img']);

    $query = "insert into products values (null,'$sku','$name','$category','$brand','$stok','$capacity','$price','$weight','$img','$description')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); 
}

// hapus data
function hapus($id){
    $conn = koneksi();
    mysqli_query($conn,"delete from products where id = $id");
    return mysqli_affected_rows($conn);
}