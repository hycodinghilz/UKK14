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
    <title>Document</title>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container">
        <!-- <h1 class="text-primary" style="margin: 10px;"><u>DASBOARD</u></h1> -->
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <h4>ID : <?= $_SESSION['id_login']; ?></h4>
            </div>
            <div class="card-body-m">
                <blockquote class="blockquote mb-0">
                    <p>
                    <h6>&nbsp;&nbsp;&nbsp;Pengguna : <?= $_SESSION['nama_pengguna']; ?></h6>
                    </p>
                </blockquote>
            </div>
        </div>
        <img src="../img/petugas.jpg" class="img-fluid" alt="...">
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
                    <center><button type="button" class="btn btn-success" disabled><?= $jumlahBarang['Jumlah']; ?></button></center>
                </td>
                <td>
                    <center><button type="button" class="btn btn-success" disabled><?= $jumlahPenjualan['Jumlah']; ?></button></center>
                </td>
                <td>
                    <center><button type="button" class="btn btn-success" disabled><?= $jumlahPelanggan['Jumlah']; ?></button></center>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>