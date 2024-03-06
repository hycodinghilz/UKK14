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
  <title>Ubah Barang</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <?php include "navbar.php" ?>
  <br><br>
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <center>
        <h1>UBAH BARANG</h1>
      </center>
      <br><br>
      <?php
      //ambil koneksi 
      include "../config.php";

      //ambil id_barang dari url 
      $id_barang = $_GET['id_barang'];

      //cari id_login di tb_login
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
      //ambil datanya 
      $barang = mysqli_fetch_assoc($sql);
      ?>
      <form action="m_ubah_barang.php" method="post">
        <input type="hidden" name="id_barang" id="" value="<?= $barang['id_barang'] ?>">
        <table border="1" class="table table-striped">
          <tr>
            <th><span class="input-text" id="addon-wrapping">Nama Barang</span></th>
            <th><span class="input-text" id="addon-wrapping">:</span></th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-bag-plus-fill"></i></span>
              <input type="text" class="form-control" name="nama_barang" id="" value="<?= $barang['nama_barang'] ?>" aria-describedby="addon-wrapping">
            </th>
          </tr>
          <tr>
            <th><span class="input-text" id="addon-wrapping">Stok Barang</span></th>
            <th><span class="input-text" id="addon-wrapping">:</span></th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-cart-plus-fill"></i></span>
              <input type="text" class="form-control" name="stok_barang" id="" value="<?= $barang['stok_barang'] ?>" aria-describedby="addon-wrapping">
            </th>
          </tr>
          <tr>
            <th><span class="input-text" id="addon-wrapping">Harga</span></th>
            <th><span class="input-text" id="addon-wrapping">:</span></th>
            <th class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="text" class="form-control" name="harga_barang" id="" value="<?= $barang['harga_barang'] ?>" aria-describedby="addon-wrapping">
            </th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th><input type="submit" class="btn btn-success" value="Simpan"></th>
          </tr>
        </table>
    </div>
    </form>
</body>

</html>