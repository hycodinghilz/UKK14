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
  <title>DAFTAR BARANG</title>
</head>

<body>
  <?php include "navbar.php"; ?>
  <br><br>
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <center>
        <h1>DAFTAR BARANG</h1>
      </center>
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="45" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
      </svg>
      <a href="v_tambah_barang.php" class="btn btn-outline-success">Tambah Barang</a>
      <br>
      <br>
      <table border="1" class="table table-striped table-hover">
        <tr class="table-info">
          <th>Id Barang</th>
          <th>Nama Barang</th>
          <th>Stok</th>
          <th>Harga</th>
          <th colspan="2">

          </th>
        </tr>
        <?php
        //ambil koneksi
        include "../config.php";
        //ambil data di tb_barang
        $sql = mysqli_query($koneksi, 'SELECT * FROM tb_barang ORDER BY id_barang DESC');
        foreach ($sql as $barang) {
        ?>
          <tr>
            <td><?= $barang['id_barang'] ?> </td>
            <td><?= $barang['nama_barang'] ?></td>
            <td><?= $barang['stok_barang'] ?></td>
            <td><?= $barang['harga_barang'] ?></td>
            <td><a href="v_ubah_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-success">
                <center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                  </svg>&nbsp;Ubah</center>
              </a></td>
            <td><a href="m_hapus_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-dark">
                <center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                  </svg>&nbsp;Hapus</center>
              </a></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>