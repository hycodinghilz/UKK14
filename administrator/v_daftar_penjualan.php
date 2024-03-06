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
  <title>Document</title>
</head>

<body>
  <?php include('navbar.php') ?>
  <br><br>
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <center>
        <h1>DAFTAR PENJUALAN</h1>
      </center>
      <br><br>
      <table border="1" class="table table-striped">
        <thead class="table-info">
          <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>ID Pelanggan</th>
            <th>Petugas</th>
          </tr>
        </thead>

        <?php
        //ambil koneksi
        include('../config.php');
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
        foreach ($sql as $penjualan) {
        ?>
          <tr>
            <td><?= $penjualan['id_penjualan'] ?></td>
            <td><?= $penjualan['tgl_penjualan'] ?></td>
            <td><?= $penjualan['total'] ?></td>
            <td><?= $penjualan['id_pelanggan'] ?></td>
            <td><?= $penjualan['id_login'] ?></td>
          </tr>
        <?php
        } ?>

      </table>



    </div>
  </div>
</body>

</html>