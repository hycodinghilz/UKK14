<?php
session_start();
//cek session 
if ($_SESSION['login'] != 'petugas') {
  //kembali ke halaman login
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Penjualan</title>
  <link rel="stylesheet" href="detail.css">
</head>

<body>
  <?php include "navbar.php" ?>
  <div class="container">
    <?php
    //ambil koneksi
    include "../config.php";
    //ambil data id_pelanggan dari URL
    $id_pelanggan = $_GET['id_pelanggan'];
    //cari datanya
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan INNER JOIN tb_penjualan ON tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan");
    // $pelanggan = mysqli_fetch_assoc($sql);

    foreach ($sql as $pelanggan) {

      //cek data berdasarkan id_pelanggan
      if ($pelanggan['id_pelanggan'] == $id_pelanggan) {
    ?>

        <div class="demo">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                  <div class="pricingTable blue">
                    <h3 class="title">Penjualan</h3>
                    <div class="price-value">
                      <br>
                      <span class="month"><b> <?= $pelanggan['id_pelanggan'] ?></b></span>
                    </div>
                    <ul class="pricing-content">
                      <li>Nama Pelanggan : <?= $pelanggan['nama_pelanggan'] ?></li>
                      <li>Alamat : <?= $pelanggan['alamat_pelanggan'] ?></li>
                      <li>Telepon : <?= $pelanggan['telepon_pelanggan'] ?></li>
                      <li class="disable"><i class="fa fa-times"></i></li>
                    </ul>
                    <!-- <a href="#" class="pricingTable-signup" <form action="m_beli_barang.php" method="post"> -->
                    <input type="hidden" name="id_penjualan" id="" value="<?= $pelanggan['id_penjualan']  ?>">
                    <input type="hidden" name="id_pelanggan" id="" value="<?= $pelanggan['id_pelanggan']  ?>">

                    <!-- //button -->
                    <form action="m_beli_barang.php" method="post">
                      <input type="hidden" name="id_penjualan" id="" value="<?= $pelanggan['id_penjualan']  ?>">
                      <input type="hidden" name="id_pelanggan" id="" value="<?= $pelanggan['id_pelanggan']  ?>">

                      <input type="submit" value="Tambah Barang" class="pricingTable-signup">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- daftar barang yang dibeli -->
        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
          <table class="table table-striped table-hover">
            <thead>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Sub Total</th>
              <th scope="col">Stok Barang</th>
              <th scope="col" colspan="2">Aksi</th>
            </thead>
            <?php
            //ambil data detail barang pada tb_detail_penjualan
            $data = mysqli_query($koneksi, "SELECT * FROM tb_detail_penjualan");

            //ambil data barang pada tb_barang
            $dataBarang = mysqli_query($koneksi, "SELECT * FROM tb_barang");

            //tampilkan data detail barang
            foreach ($data as $detail) {
              if ($detail['id_penjualan'] == $pelanggan['id_penjualan']) {

                //ambil data harga barang pada tb_barang
                foreach ($dataBarang as $barang) {
                  if ($barang['id_barang'] == $detail['id_barang']) {
                    $harga_barang =  $barang['harga_barang'];
                    $stok_barang = $barang['stok_barang'];
                  }
                }
            ?>
                <tr>
                  <!-- kolom pilih barang -->
                  <td>
                    <form action="m_update_barang_detail.php" method="post">
                      <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                      <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                      <select name="id_barang" id="" onchange="this.form.submit()" class="form-select" aria-label="Disabled select example">
                        <?php
                        foreach ($dataBarang as $barang) {
                        ?> <option value="<?= $barang['id_barang'] ?>" <?php if ($barang['id_barang'] == $detail['id_barang']) echo "selected"; ?>><?= $barang['nama_barang'] ?></option>
                        <?php } ?>
                      </select>
                    </form>
                  </td>


                  <!-- kolom jumlah barang dan sub total dan stok barang -->
                  <form action="m_hitung_sub_total.php" method="post">
                    <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                    <input type="hidden" name="id_barang" value="<?= $detail['id_barang'] ?>">
                    <td>
                      <div class="input-group mb-3">
                        <input type="text" name="harga_barang" id="" value="<?= $harga_barang ?>" readonly class="form-control" aria-describedby="basic-addon2">
                    </td>
                    <div class="input-group mb-3">
                      <td><input type="number" name="jumlah_barang" value="<?= $detail['jumlah_barang'] ?>" tabindex="1" onchange="this.form.submit()" class="form-control" aria-describedby="basic-addon2"></td>
                      <td>
                        <div class="input-group mb-3">
                          <input type="text" name="sub_total" id="" value="<?= $detail['sub_total'] ?>" readonly class="form-control" aria-describedby="basic-addon2">
                      </td>
                      <td>
                        <input type="text" name="stok_barang" value="<?= $stok_barang ?>" readonly class="form-control" aria-describedby="basic-addon2">
                      </td>
                      </td>
                  </form>

                  <!-- kolom hapus -->
                  <td>
                    <form action="m_hapus_detail_barang.php" method="post">
                      <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                      <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                      <input type="submit" value="Hapus" class="btn btn-dark">
                    </form>
                  </td>
                </tr>
            <?php   }
            }
            ?>

            <!-- kolom hitung total -->
            <form action="m_hitung_total.php" method="post">
              <input type="hidden" name="id_penjualan" value="<?= $detail['id_penjualan'] ?>">
              <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
              <tr>
                <?php
                //  hitung total pembelian dari tb_detail_penjualan
                $hitung = mysqli_query($koneksi, "SELECT SUM(sub_total) AS Total FROM tb_detail_penjualan WHERE id_penjualan='$pelanggan[id_penjualan]'");
                $total = mysqli_fetch_assoc($hitung);
                ?>
                <td colspan="2"></td>
                <td>Total</td>
                <div class="input-group mb-3">
                  <td><input type="text" name="total" id="" value="<?= $total['Total'] ?>" readonly class="form-control" aria-describedby="basic-addon2"></td>
                  <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td>Bayar</td>
                <div class="input-group mb-3">
                  <td><input type="number" name="bayar" id="bayar" onchange="this.form.submit()" tabindex="1" class="form-control" aria-describedby="basic-addon2"></td>
                  <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td>Kembali</td>
                <div class="input-group mb-3">
                  <td><input type="number" name="kembali" id="" value="<?php if (isset($_GET['kembali'])) {
                                                                          echo    $kembali = $_GET['kembali'];
                                                                        } ?>" readonly class="form-control" aria-describedby="basic-addon2"></td>
                  <td colspan="2"></td>
              </tr>
            </form>
          </table>
        </div>
  </div>
<?php }
    } ?>
</body>

</html>