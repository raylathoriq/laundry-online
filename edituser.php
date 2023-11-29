<?php


require 'function.php';
$id_user = $_GET['id_user'];

$user = mysqli_query($conn,"SELECT * FROM user JOIN outlet USING(id_outlet) WHERE id_user = '$id_user'");
$outlet = mysqli_query($conn,"SELECT * FROM outlet");


if(isset($_POST['kirim'])){
    if(editUser($_POST)){
        echo"
            <script>
            alert('berhasil diedit')
            document.location.href = 'edituser.php?id_user=$id_user';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal diedit')
            document.location.href = 'edituser.php?id_user=$id_user';
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
    <h3>Data User</h3>
    <?php foreach($user as $u):?>
    <div class="table mt-5">
        <form action="" method="post">
            <table class="table table-borderless">
                <input type="hidden" name="id" value="<?= $u['id_user']?>">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="" class="form-control w-50 border border-1 border-dark"  value="<?= $u['nama']?>"></td>
                </tr>
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td>
                        <select name="outlet" id="" class="form-select w-50 border border-1 border-dark">
                            <?php foreach($outlet as $o):?>
                            <option value="<?= $o['id_outlet']?>" <?=$u['id_outlet'] == $o['id_outlet'] ? 'selected': '';?>><?= $o['nama_outlet']?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>
                        <select name="role" id="" class="form-select w-50 border border-1 border-dark">
                            <option value="owner" <?= $u['role'] == 'owner' ?'selected':'';?>>owner</option>
                            <option value="admin" <?= $u['role'] == 'admin' ? 'selected':''?>>admin</option>
                            <option value="karyawan" <?= $u['role'] == 'karyawan' ? 'selected':''?>>karyawan</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary" name="kirim">Simpan Perubahan</button>
        </form>

        
    </div>
    <?php endforeach;?>
    


</body>
</html>