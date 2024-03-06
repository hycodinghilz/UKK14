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
    <title>Ubah Barang</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <br><br>
    <div class="container">
        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <center>
                <h1>UBAH BARANG</h1>
            </center>
            <br><br>
            <?php
            include "../config.php";
            $id_barang = $_GET['id_barang'];
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
            $barang = mysqli_fetch_assoc($sql);
            ?>
            <form action="m_ubah_barang.php" method="post">
                <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
                <table border="1" class="table table-striped">
                    <tr>
                        <th>Nama Barang</th>
                        <th>:</th>
                        <th><input type="text" name="nama_barang" id="" value="<?= $barang['nama_barang'] ?>" readonly style="background-color: red;"></th>
                    </tr>
                    <tr>
                        <th>Stok Barang</th>
                        <th>:</th>
                        <th><input type="text" name="stok_barang" id="" value="<?= $barang['stok_barang'] ?>"></th>
                    </tr>
                    <tr>
                        <th>Harga Barang</th>
                        <th>:</th>
                        <th><input type="text" name="harga_barang" id="" value="<?= $barang['harga_barang'] ?>" readonly style="background-color: red;"></th>
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