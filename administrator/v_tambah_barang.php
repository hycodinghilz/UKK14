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
  <title>Tambah Barang</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <?php include "navbar.php"; ?>
  <div class="container">
    <br><br>
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <center>
        <h1>TAMBAH BARANG</h1>
      </center>
      <br><br>
      <form action="m_tambah_barang.php" method="post">
        <table border="1" class="table table-striped">
          <tr>
            <th><span class="input-text" id="addon-wrapping">Nama Barang</span></th>
            <th><span class="input-text" id="addon-wrapping">:</span></th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-bag-plus-fill"></i></span>
              <input type="text" class="form-control" name="nama_barang" aria-describedby="addon-wrapping">
            </th>
          </tr>
          <tr>
            <th><span class="input-text" id="addon-wrapping">Stok Barang</span></th>
            <th><span class="input-text" id="addon-wrapping">:</span></th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-cart-plus-fill"></i></span>
              <input type="text" class="form-control" name="stok_barang" aria-describedby="addon-wrapping">
            </th>
          </tr>
          <tr>
            <th><span class="input-text" id="addon-wrapping">Harga</span></th>
            <th><span class="input-text" id="addon-wrapping">:</span></th>
            <th class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="text" class="form-control" name="harga_barang" aria-describedby="addon-wrapping">
            </th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th><input type="submit" class="btn btn-success" value="Simpan"></th>
          </tr>
        </table>
    </div>
</body>

</html>