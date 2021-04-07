<?php 
// Latihan1 PHP Dasar
// Sintaks PHP

// Standart Output
// echo, print
// print_r
// var_dump

// penulisan sintaks PHP
// 1.PHP di dalam HTML
// 2.HTML di dalam PHP

// variabel dan Tipe data
// Variabel
// tidak boleh di awali oleh angka tapi boleh mengandung angka
$nama ="Khoerul Anam";
echo "Halo, nama saya $nama";

// Operator
// aritmatika
// + - * / %
$x = 10;
$y =20;
echo $x = $y;

// Penggabung string / concatination / concat
// 
$nama_depan = "Khoerul";
$nama_belakang = "Anam";
echo $nama_depan." ".$nama_belakang;

// Assignment
// =, +=, -=, *=, /=, %=, .=
$x = 1;
$x += 5;
echo $x;
$nama = "Khoerul";
$nama .= " ";
$nama .="Anam";
echo $nama;

// perbandingan
// <, >, <=, >=, ==, !=
var_dump(1 == "1");

// identitas
// ===, !==
var_dump(1 === "1");

// logika
// &&, ||,!
$x = 30;
var_dump($x < 20 || $x % 2 == 0);


 ?>