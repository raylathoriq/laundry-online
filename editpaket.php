<?php

require 'function.php';
$id_paket = $_GET['id_paket'];
$paket = mysqli_query($conn,"SELECT * FROM paket JOIN outlet USING(id_outlet) WHERE id_paket = '$id_paket'");
$outlet = mysqli_query($conn,"SELECT * FROM outlet");



if(isset($_POST['kirim'])){
    if(editPaket($_POST)){
        echo"
            <script>
            alert('berhasil diedit')
            document.location.href = 'paket.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal diedit')
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
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
</head>
<body>
    <?php 
    include  'component/sidebar.php';
    ?>
    <h3>Data Paket</h3>
    <?php foreach($paket as $p):?>
    <div class="table mt-5">
        <form action="" method="post">
            <table class="table table-borderless">
                <input type="hidden" name="id" value="<?= $p['id_paket']?>">
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td>
                        <select name="outlet" class="form-select w-50 border border-dark border-1" id="">
                            <?php foreach($outlet as $o):?>
                                <option value="<?= $o['id_outlet']?>" <?= $p['id_outlet'] == $o['id_outlet'] ? 'selected':''?>><?= $o['nama_outlet']?></option>
                            <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                <tr>
                    <td>Jenis Paket</td>
                    <td>:</td>
                    <td><input type="text" name="jenis_paket" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $p['jenis']?>"></td>
                </tr>
                <tr>
                    <td>Nama Paket</td>
                    <td>:</td>
                    <td><input type="text" name="nama_paket" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $p['nama_paket']?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input type="text" name="harga" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $p['harga']?>"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary" name="kirim">Simpan Perubahan</button>
        </form>

        
    </div>
    <?php endforeach;?>
    


</body>
</html>