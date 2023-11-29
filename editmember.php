<?php


require 'function.php';
$id_member = $_GET['id_member'];
$member = mysqli_query($conn,"SELECT * FROM member WHERE id_member = '$id_member'");


if(isset($_POST['kirim'])){
    if(editmember($_POST)){
        echo"
            <script>
            alert('berhasil diedit')
            document.location.href = 'member.php?';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal diedit')
            document.location.href = 'member.php?';
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
    <h3>Data Customer</h3>
    <?php foreach($member as $m):?>
    <div class="table mt-5">
        <form action="" method="post">
            <table class="table table-borderless">
                <input type="hidden" name="id" value="<?= $m['id_member']?>">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $m['nama']?>"></td>
                </tr>
                <tr>
                    <td>Alamat  </td>
                    <td>:</td>
                    <td><input type="text" name="alamat" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $m['alamat']?>"></td>
                </tr>
                <tr>
                    <td>No.telp</td>
                    <td>:</td>
                    <td><input type="text" name="telp" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $m['telp']?>"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary" name="kirim">Simpan Perubahan</button>
        </form>

        
    </div>
    <?php endforeach;?>
    


</body>
</html>