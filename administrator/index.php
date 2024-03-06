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
  <div class="container">
    <h1>Dasboard</h1>
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">

      <!-- ID : <?= $_SESSION['id_login']; ?> <br> Pengguna : <?= $_SESSION['nama_pengguna']; ?> -->
      <br>
      <img src="../img/naga1.jpg" alt="" width="1070px" height="230px">
      <div class="card">
        <div class="card-header">
          ID : <?= $_SESSION['id_login']; ?>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>Pengguna</p>
            <footer class="blockquote-footer"><?= $_SESSION['nama_pengguna']; ?></footer>
          </blockquote>
        </div>
      </div>
    </div>
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


    <table border="1" class="table table-striped">
      <thead class="table-info">
        <th>
          <center>Data Barang</center>
        </th>
        <th>
          <center>Data Pembelian</center>
        </th>
        <th>
          <center>Data Pelanggan</center>
        </th>
      </thead>
      <tr>
        <td>
          <center><button type="button" class="btn btn-success">
              Barang <span class="badge text-bg-secondary"> <?= $jumlahBarang['Jumlah']; ?></span>
            </button></center>
        </td>
        <td>
          <center><button type="button" class="btn btn-success">
              Pembeli <span class="badge text-bg-secondary"> <?= $jumlahPenjualan['Jumlah']; ?></span>
            </button></center>
        </td>
        <td>
          <center><button type="button" class="btn btn-success">
              Pelanggan <span class="badge text-bg-secondary"> <?= $jumlahPelanggan['Jumlah']; ?></span>
            </button></center>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>