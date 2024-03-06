<?php

include "../config.php";

$id_pelanggan = $_GET['id_pelanggan'];

$sql = mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");

if ($sql) {
    header('location: v_penjualan.php');
}
