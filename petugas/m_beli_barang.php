<?php
include "../config.php";


$id_pelanggan = $_POST['id_pelanggan'];

$id_penjualan = $_POST['id_penjualan'];
$id_barang = 1;
$jumlah_barang = 0;
$sub_total = 0;

$sql = mysqli_query($koneksi, "INSERT INTO tb_detail_penjualan VALUES(Null,'$id_penjualan','$id_barang','$jumlah_barang','$sub_total')");

header("location: v_detail_penjualan.php?id_pelanggan=$id_pelanggan");
