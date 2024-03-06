<?php
session_start();
//cek session 
if ($_SESSION['login'] != 'admin') {
  //kembali ke halaman login
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administator</title>
</head>

<body>
  <?php include "navbar.php"; ?>
  <h1>Dasboard</h1>
  ID : <?= $_SESSION['id_login']; ?> <br> Pengguna : <?= $_SESSION['nama_pengguna']; ?>
  <?php
  //ambil koneksi
  include "../config.php";

  //hitung jumlah barang dari tb_barang
  $barang = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM tb_barang");
  $jumlahBarang = mysqli_fetch_assoc($barang);

  //hitung jumlah pembelian dari tb_penjualan
  $penjualan = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM tb_penjualan");
  $jumlahPenjualan = mysqli_fetch_assoc($penjualan);

  //hitung jumlah pengguna dari tb_pelanggan
  $pelanggan = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM tb_pelanggan");
  $jumlahPelanggan = mysqli_fetch_assoc($pelanggan);
  ?>
  <table border="1">
    <tr>
      <td>Data Barang</td>
      <td>Data Pembelian</td>
      <td>Data Pelanggan</td>
    </tr>
    <tr>
      <td><?= $jumlahBarang['Jumlah']; ?></td>
      <td><?= $jumlahPenjualan['Jumlah']; ?></td>
      <td><?= $jumlahPelanggan['Jumlah']; ?></td>
    </tr>
  </table>
</body>

</html>