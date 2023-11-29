<?php
require 'function.php';

$outlet = mysqli_query($conn,"SELECT * FROM outlet");
$title = 'Outlet';


if(isset($_POST['tambah'])){
    if(tambahOutlet($_POST)>0){
        echo"
            <script>
            alert('berhasil ditambahkan')
            document.location.href = 'outlet.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal  ditambahkan')
            document.location.href = 'outlet.php';
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
    <title><?= $title?></title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <?php include 'component/sidebar.php'?>
    <h3>Daftar Outlet</h3>
    <div class="row">

        <div class="col-4 addUser mt-5">
            <form action="" method="post">
                <table class="table table-borderless">
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Outlet</label>
                            <input type="text" class="form-control" name="outlet">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">

                        </td>
                    <tr>
                        <td>
                            <label for="" class="form-label">No.telp</label>
                            <input type="number" class="form-control" name="telp">
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
                            <th>Alamat</th>
                            <th>No.telp</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <thead>
                        
                        <?php $i = 1;?>
                        <?php foreach($outlet as $o):?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $o['nama_outlet']?></td>
                            <td><?= $o['alamat']?></td>
                            <td><?= $o['telp']?></td>
                            <td>
                                <a href="editoutlet.php?id_outlet=<?=$o['id_outlet']?>" class="btn btn-warning">Edit</a>  
                                <a href="deleteoutlet.php?id_outlet=<?=$o['id_outlet']?>" class="btn btn-danger" onclick= "return confirm('Yakin ingin hapus data?    ')">Hapus</a>     
                            
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