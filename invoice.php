<?php
require 'function.php';
$id_transaksi = $_GET['id_detail'];
$transaksi = mysqli_query($conn,"SELECT * FROM transaksi JOIN outlet AS o USING(id_outlet) JOIN member AS m USING(id_member) JOIN user AS u USING(id_user) JOIN paket AS p USING(id_paket) WHERE id_transaksi = '$id_transaksi'");
$row = mysqli_fetch_array($transaksi);
$harga = $row['harga'];
$jumlah = $row['qty'];
$total = $harga * $jumlah;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    
</head>
<body>
    <h3 class="text-center mt-5 mb-5">
        PDF Detail transaksi
    </h3>
        <?php foreach($transaksi as $t):?>
        <div class="row">
            <p class="fs-3 ms-5">Kode Invoice : <?= $t['kode_invoice']?></p>
            <hr>
            <p class="fs-3 ms-5">Outlet : <?= $t['nama_outlet']?></p>
            <p class="fs-3 ms-5">Paket : <?= $t['jenis']?> <?= $t['nama_paket']?></p>
            <p class="fs-3 ms-5">Nama Pelanggan : <?= $t['nama']?></p>
            <p class="fs-3 ms-5">Tanggal Kunjungan : <?= $t['tgl']?></p>
            <p class="fs-3 ms-5">Tanggal Bayar : <?= $t['tgl_bayar']?></p>
            <p class="fs-3 ms-5">Status : <?= $t['status']?></p>
            <p class="fs-3 ms-5">Pembayaran : <?= $t['pembayaran']?></p>
            <p class="fs-3 ms-5">Jumlah : <?= $t['qty']?></p>
            <p class="fs-3 text-end">Total : RP <?= $total?></p>
            <hr>
            <p class=" text-end fs-3">Kasir : <?=$t['nama_USER']?></p>
        </div>
        <?php endforeach;?>
    

        <script>window.print()</script>
</body>
</html>