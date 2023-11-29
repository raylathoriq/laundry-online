<?php

require 'function.php';
$id_outlet = $_GET['id_outlet'];
$outlet = mysqli_query($conn,"SELECT * FROM outlet WHERE id_outlet = '$id_outlet'");


if(isset($_POST['kirim'])){
    if(editOutlet($_POST)){
        echo"
            <script>
            alert('berhasil diedit')
            document.location.href = 'outlet.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal diedit')
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
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
</head>
<body>
    <?php 
    include  'component/sidebar.php';
    ?>
    <h3>Data Outlet</h3>
    <?php foreach($outlet as $o):?>
    <div class="table mt-5">
        <form action="" method="post">
            <table class="table table-borderless">
                <input type="hidden" name="id" value="<?= $o['id_outlet']?>">
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td><input type="text" name="outlet" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $o['nama_outlet']?>"></td>
                </tr>
                <tr>
                    <td>Alamat  </td>
                    <td>:</td>
                    <td><input type="text" name="alamat" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $o['alamat']?>"></td>
                </tr>
                <tr>
                    <td>No.telp</td>
                    <td>:</td>
                    <td><input type="text" name="telp" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $o['telp']?>"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary" name="kirim">Simpan Perubahan</button>
        </form>

        
    </div>
    <?php endforeach;?>
    


</body>
</html>