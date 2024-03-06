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
    <title>Petugas</title>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <br><br>
    <div class="container">
        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <center>
                <h2>DAFTAR PELANGGAN</h2>
            </center>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
            </svg>
            <a href="v_tambah_pelanggan.php"" class=" btn btn-outline-success">Tambah Pelanggan</a>
            <br><br>
            <table border="1" class="table table-striped table-hover">
                <tr>
                    <thead class="table-info">
                        <td>ID Pelanggan</td>
                        <td>Nama Pelanggan</td>
                        <td>Alamat Pelanggan</td>
                        <td>Telepon Pelanggan</td>
                        <td colspan="2"></td>
                    </thead>
                </tr>
                <?php
                include "../config.php";
                $sql = mysqli_query($koneksi, "SELECT  * FROM tb_pelanggan");
                foreach ($sql as $pelanggan) {
                ?>

                    <tr>
                        <td><?= $pelanggan['id_pelanggan'] ?></td>
                        <td><?= $pelanggan['nama_pelanggan'] ?></td>
                        <td><?= $pelanggan['alamat_pelanggan'] ?></td>
                        <td><?= $pelanggan['telepon_pelanggan'] ?></td>
                        <td><a href="m_hapus_pelanggan.php?id_pelanggan=<?= $pelanggan['id_pelanggan'] ?>" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293z" />
                                </svg>&nbsp;Hapus</a></td>
                        <td><a href="v_detail_penjualan.php?id_pelanggan=<?= $pelanggan['id_pelanggan'] ?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
                                </svg>&nbsp;Beli</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>