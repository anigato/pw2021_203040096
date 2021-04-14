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