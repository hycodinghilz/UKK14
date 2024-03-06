<?php

session_start();

if ($_SESSION['login'] != 'petugas') {
    header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <br><br>
    <div class="container">
        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <center>
                <h1>TAMBAH PELANGGAN</h1>
            </center>
            <br><br>
            <form action="m_tambah_pelanggan.php" method="post">
                <input type="hidden" name="id_login" value="<?= $_SESSION['id_login'] ?>">
                <table border="1" class="table table-striped">
                    <tr>
                        <th><span class="input-text" id="addon-wrapping">ID Pelanggan</span></th>
                        <th><span class="input-text" id="addon-wrapping">:</span></th>
                        <th class="input-group">
                            <span class="input-group-text"><i class="bi bi-pin-fill"></i></span>
                            <input type="text" class="form-control" name="id_pelanggan" id="" value="<?= date('mis') ?>" aria-describedby="addon-wrapping">
                        </th>
                    </tr>
                    <tr>
                        <th><span class="input-text" id="addon-wrapping">Nama Pelanggan</span></th>
                        <th><span class="input-text" id="addon-wrapping">:</span></th>
                        <th class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" name="nama_pelanggan" id="" aria-describedby="addon-wrapping">
                        </th>
                    </tr>
                    <tr>
                        <th><span class="input-text" id="addon-wrapping">Alamat Pelanggan</span></th>
                        <th><span class="input-text" id="addon-wrapping">:</span></th>
                        <th class="input-group">
                            <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                            <input type="text" class="form-control" name="alamat_pelanggan" id="" aria-describedby="addon-wrapping">
                        </th>
                    <tr>
                        <th><span class="input-text" id="addon-wrapping">Telepon Pelanggan</span></th>
                        <th><span class="input-text" id="addon-wrapping">:</span></th>
                        <th class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" name="telepon_pelanggan" id="" aria-describedby="addon-wrapping">
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" class="btn btn-success" value="Simpan"></td>
                    </tr>
                </table>
        </div>
        </form>
</body>

</html>