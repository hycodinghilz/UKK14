<?php

include "../config.php";

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$stok_barang = $_POST['stok_barang'];
$harga_barang = $_POST['harga_barang'];

$sql = mysqli_query($koneksi, "UPDATE tb_barang SET id_barang='$id_barang', nama_barang='$nama_barang', stok_barang='$stok_barang', harga_barang='$harga_barang' WHERE id_barang='$id_barang'");

if ($sql) {
    header('location: v_stok_barang.php');
}
