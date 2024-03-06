<?php

include "../config.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$telepon_pelanggan = $_POST['telepon_pelanggan'];

$id_login = $_POST['id_login'];
$tgl_penjualan = date('Ymd');
$total = 0;

$sql = mysqli_query($koneksi, "INSERT INTO tb_pelanggan VALUES('$id_pelanggan', '$nama_pelanggan', '$alamat_pelanggan', '$telepon_pelanggan')");

$data = mysqli_query($koneksi, "INSERT INTO tb_penjualan VALUES(Null,'$tgl_penjualan','$total','$id_pelanggan','$id_login')");


if ($sql) {
    header('location: v_penjualan.php');
}
