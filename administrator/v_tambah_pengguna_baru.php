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
  <title>Tambah Pengguna Baru</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <?php include "navbar.php" ?>
  <br><br>
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <center>
        <h1>TAMBAH PENGGUNA BARU</h1>
      </center>
      <br><br>
      <form action="m_tambah_pengguna_baru.php" method="post">
        <table border="1" class="table table-striped">
          <tr>
            <th>Nama</th>
            <th>:</th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
              <input type="text" class="form-control" name="nama_pengguna" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </th>
          </tr>
          <tr>
            <th>Username</th>
            <th>:</th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" class="form-control" name="username_pengguna" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </th>
          </tr>
          <tr>
            <th>Password</th>
            <th>:</th>
            <th class="input-group">
              <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
              <input type="text" class="form-control" name="password_pengguna" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </th>
          </tr>
          <tr>
            <th>Status</th>
            <th>:</th>
            <th><select name="status" id="" class="form-select" aria-label="Disabled select example">
                <option value="Administrator">Administrator</option>
                <option value="Petugas">Petugas</option>
              </select></th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th><input type="submit" value="Simpan" class="btn btn-success"></th>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>

</html>