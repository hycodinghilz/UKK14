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
  <title>Ubah Pengguna</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
</head>

<body>
  <?php include "navbar.php" ?>
  <br><br>
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <center>
        <h1>UBAH PENGGUNA</h1>
      </center>
      <br><br>
      <?php
      //ambil koneksi 
      include "../config.php";

      //ambil id_login dari url 
      $id_login = $_GET['id_login'];

      //cari id_login di tb_login
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_login='$id_login'");
      //ambil datanya 
      $pengguna = mysqli_fetch_assoc($sql);
      ?>
      <form action="m_ubah_pengguna.php" method="post">
        <input type="hidden" name="id_login" id="" value="<?= $pengguna['id_login'] ?>">
        <table border="1" class="table table-striped">
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td class="input-group">
              <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
              <input type="text" class="form-control" name="nama_pengguna" id="" value="<?= $pengguna['nama_pengguna'] ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td>:</td>
            <td class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" class="form-control" name="username_pengguna" id="" value="<?= $pengguna['username_pengguna'] ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </td>
          </tr>
          <tr>
            <td>Password</td>
            <td>:</td>
            <td class="input-group">
              <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
              <input type="text" class="form-control" name="password_pengguna" id="" value="<?= $pengguna['password_pengguna'] ?>" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </td>
          </tr>
          <tr>
            <td>Status</td>
            <td>:</td>
            <td><select name="status" id="" class="form-select" aria-label="Disabled select example">
                <?php
                if ($pengguna['status'] == "Administrator") {
                  echo "<option value='Administrator' selected>Administrator</option>";
                } else {
                  echo "<option value='Administrator'>Administrator</option>";
                }
                if ($pengguna['status'] == "Petugas") {
                  echo "<option value='Petugas' selected>Petugas</option>";
                } else {
                  echo "<option value='Petugas'>Petugas</option>";
                }
                ?>
              </select></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Simpan" class="btn btn-success"></td>
          </tr>
        </table>
    </div>
  </div>
  </form>
</body>

</html>