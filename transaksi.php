<?php

require 'function.php';
$title = 'Transaksi';
$transaksi = mysqli_query($conn,"SELECT * FROM transaksi JOIN outlet AS o USING(id_outlet) JOIN member AS m USING(id_member) JOIN user AS u USING(id_user) WHERE transaksi.id_outlet ='$_SESSION[id_outlet]'");
$outlet = mysqli_query($conn,"SELECT * FROM outlet");
$member = mysqli_query($conn,"SELECT * FROM member");
$user =mysqli_query($conn,"SELECT * FROM user WHERE role = 'karyawan'");
$paket = mysqli_query($conn,"SELECT * FROM paket WHERE id_outlet = '$_SESSION[id_outlet]'");

if(isset($_POST['tambah'])){
    if(transaksi($_POST)){
        echo"<script>
            alert('berhasil ditambahkan')
            document.location.href = 'transaksi.php';
            </script>";
    }else{
        echo"<script>
            alert('gagal ditambahkan')
            document.location.href = 'transaksi.php';
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
    <title><?=$title?></title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <?php 
        include 'component/sidebar.php';
    ?>

    <h3>Daftar Transaksi</h3>
    <div class="row">

        <div class="col-4 addUser mt-5">
            <form action="" method="post">
                <table class="table table-borderless">
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Outlet</label>
                            <select name="outlet" class="form-select" id="">
                                                                
                                <option value="<?=$_SESSION['id_outlet']?>"><?= $_SESSION['nama_outlet']?></option>
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Pelanggan</label>
                            <select name="pelanggan" class="form-select" id="">
                                <option value="" selected disabled></option>
                                <?php foreach($member as $m):?>
                                    <option value="<?= $m['id_member']?>"><?= $m['nama']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Paket</label>
                            <select name="paket" class="form-select" id="">
                                <option value="" selected disabled></option>
                                <?php foreach($paket as $p):?>
                                    <option value="<?= $p['id_paket']?>"><?= $p['nama_paket']?> <?= $p['jenis']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">TanggalKunjungan</label>
                            <input type="date" class="form-control" name="tgl_kun">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Kasir</label>
                            <select name="pj" class="form-select" id="">
                                <option value="" selected disabled></option>
                                <?php foreach($user as $u):?>
                                <option value="<?= $u['id_user']?>"><?=$u['nama_USER']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    
                </table>
                <button type="submit" class="btn btn-primary mt-3" name="tambah">Tambah</button>
            </form>
        </div>

        <div class="col-8 dataOutlet">
            <div class="card text-start">
              <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <th>Outlet</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Kasir</th>
                            <th>Preview</th>
                            
                        </tr>
                    </thead>
                    <thead>
                        
                        <?php $i = 1;?>
                        <?php foreach($transaksi as $t):?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $t['nama_outlet']?></td>
                            <td><?= $t['nama']?></td>
                            <td><?= $t['tgl']?></td>
                            <td><?= $t['nama_USER']?></td>
                            <td>
                               <a href="detailtransaksi.php?id_detail=<?=$t['id_transaksi']?>"><i class='bx bxs-bullseye ms-4'></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </thead>
                </table>
              </div>
            </div>
            <a href="laporan.php?id_detail=<?=$t['id_transaksi']?>" class="btn btn-danger mt-5 float-end">Buat PDF Laporan</a>
        </div>
    </div>
</body>
</html>