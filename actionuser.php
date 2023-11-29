<?php

require 'function.php';
$id_user = $_GET['id_user'];

$user = mysqli_query($conn,"SELECT * FROM user JOIN outlet USING(id_outlet) WHERE id_user = '$id_user'");


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
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="" id="" class="form-control w-50 border border-1 border-dark" disabled value="<?= $u['nama_USER']?>"></td>
                </tr>
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td><input type="text" name="" id="" class="form-control w-50 border border-1 border-dark" disabled value="<?= $u['nama_outlet']?>"></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td><input type="text" name="" id="" class="form-control w-50 border border-1 border-dark" disabled value="<?= $u['role']?>"></td>
                </tr>
            </table>
        </form>

        <div class="action">
            <a href="edituser.php?id_user=<?=$u['id_user']?>" class="btn btn-warning">Edit</a>
            <a href="deleteuser.php?id_user=<?=$u['id_user']?>" class="btn btn-danger">Hapus</a>
        </div>
    </div>
    <?php endforeach;?>
    


</body>
</html>