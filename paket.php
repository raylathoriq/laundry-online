<?php

require 'function.php';

$paket = mysqli_query($conn,"SELECT * FROM outlet JOIN paket USING(id_outlet)");
$outlet = mysqli_query($conn,"SELECT * FROM outlet");
$title = 'Paket';


if(isset($_POST['tambah'])){
    if(tambahPaket($_POST)>0){
        echo"
            <script>
            alert('berhasil ditambahkan')
            document.location.href = 'paket.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal  ditambahkan')
            document.location.href = 'paket.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <?php include 'component/sidebar.php'?>
    <h3>Daftar Paket</h3>
    <div class="row">
        <div class="col-4 addUser mt-5" >
            <form action="" method="post">
                <table class="table table-borderless">
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Outlet</label>
                            <select name="outlet" class="form-select" id="">
                                <option value="" selected disabled></option>
                                <?php foreach ($outlet as $o):?>
                                <option value="<?= $o['id_outlet']?>"><?= $o['nama_outlet']?></option>
                                <?php endforeach ;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Jenis</label>
                            <select name="jenis_paket" id="" class="form-select">
                                <option value="" selected disabled></option>
                                <option value="kiloan">Kiloan(Kaos+Celana)</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                            </select>
                        </td>
                    <tr>
                        <td>
                            <label for="" class="form-label">Nama Paket</label>
                            <select name="nama_paket" class="form-select" id="">
                                <option value="" selected disabled></option>
                                <option value="cuci">Cuci</option>
                                <option value="cuci+setrika">Cuci+Setrika</option>
                                <option value="setrika">Setrika</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary mt-3" name="tambah">Tambah</button>
            </form>
        </div>

        <div class="col-8 dataPaket">
            <div class="card text-start">
              <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Outlet</th>
                            <th>Jenis Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php foreach($paket as $p):?>
                        <tr>
                            <td><?= $p['nama_outlet']?></td>
                            <td><?= $p['jenis']?></td>
                            <td><?= $p['nama_paket']?></td>
                            <td><?= "RP". " " .$p['harga']?></td>
                            <td>
                                <a href="editpaket.php?id_paket=<?= $p['id_paket']?>" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                            
                        </tr>
                        <?php endforeach;?>
                    </thead>
                </table>
              </div>
            </div>
        </div>
    </div>
</body>
</html>