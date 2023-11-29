<?php

require 'function.php';
$id_transaksi = $_GET['id_detail'];
$transaksi = mysqli_query($conn,"SELECT * FROM transaksi JOIN outlet AS o USING(id_outlet) JOIN member AS m USING(id_member) JOIN user AS u USING(id_user) JOIN paket AS p USING(id_paket) WHERE id_transaksi = '$id_transaksi'");
$paket = mysqli_query($conn,"SELECT * FROM paket WHERE id_outlet = '$_SESSION[id_outlet]'");
$row = mysqli_fetch_array($transaksi);
$harga = $row['harga'];
$jumlah = $row['qty'];
$total = $harga * $jumlah; 


if(isset($_POST['bayar'])){
    if(editTransaksi($_POST)){
        echo"<script>
            alert('status pembayaran berhasil diperbarui')
            document.location.href='transaksi.php';
            </script>";
    }else{
        echo"<script>
            alert('status pembayaran gagal diperbarui')
            document.location.href='transaksi.php';
            </script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>

    <?php 
    include 'component/sidebar.php';
    ?>
    <h3>Detail Transaksi</h3>
    
        <div class="col-12 mt-5 dataOutlet">
            <div class="card text-start">
              <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Outlet</th>
                            <th>Pelanggan</th>
                            <th>Paket</th>
                            <th>Kode Invoice</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Kasir</th>
                            
                        </tr>
                    </thead>
                    <thead>
                        
                        
                        <?php foreach($transaksi as $t):?>
                        <tr>
                            
                            <td><?= $t['nama_outlet']?></td>
                            <td><?= $t['nama']?></td>
                            <td><?= $t['nama_paket']?> <?= $t['jenis']?></td>
                            <td><?= $t['kode_invoice']?></td>
                            <td><?= $t['tgl']?></td>
                            <td><?= $t['tgl_bayar']?></td>
                            <td><?= $t['status']?></td>
                            <td><?= $t['pembayaran']?></td>
                            <td><?= $t['qty']?></td>
                            <td><?= $t['nama_USER']?></td>
                            
                        </tr>
                        <?php endforeach;?>
                    </thead>
                </table>
              </div>
            </div>
        </div>
        <div class="float-end mt-3">
        <a href="invoice.php?id_detail=<?=$t['id_transaksi']?>" class="btn btn-danger">Buat PDF Invoice</a>
        <a href="deletetransaksi.php?id_detail=<?=$t['id_transaksi']?>" onclick="return confirm('yakin ingin mengahapus transaksi ini?')" class="btn btn-danger">Hapus</a>
    </div>

        <h3 class="mt-5">Update Status Pembayaran</h3>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $t['id_transaksi']?>">
                    <div class="tgl_bayar mb-3">
                        <label for="" class="form-label">Tanggal Bayar</label>
                        <input type="date" class="form-control w-50 border border-1 border-dark" name="tgl_byr">
                    </div>
                    <div class="status mb-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-select w-50 border border-1 border-dark" name="status">
                            <option value="" selected disabled></option>
                            <option value="baru">baru</option>
                            <option value="diproses">diproses</option>
                            <option value="selesai">selesai</option>
                            <option value="diambil">diambil</option>
                        </select>
                    </div>
                    <div class="pembayaran mb-3">
                        <label for="" class="form-label">Pembayaran</label>
                        <select class="form-select w-50 border border-1 border-dark" name="pembayaran">
                            <option value="" selected disabled></option>
                            <option value="dibayar">dibayar</option>
                            <option value="belumbayar">belumbayar</option>
                        </select>
                    </div> 
                    <h5>Total : RP <?= $total?></h5>
                    <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                </form>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach($paket as $p):?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $p['jenis']?></td>
                            <td><?= $p['nama_paket']?></td>
                            <td><?= $p['harga']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

    
</body>
</html>