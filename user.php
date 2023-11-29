<?php

require 'function.php';


$user = mysqli_query($conn,"SELECT * FROM outlet JOIN  user USING(id_outlet)");
$outlet = mysqli_query($conn,"SELECT * FROM outlet");
$title = 'User';



if(isset($_POST['tambah'])){
    if(tambahUser($_POST)>0){
        echo"
            <script>
            alert('berhasil ditambahkan')
            document.location.href = 'user.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal  ditambahkan')
            document.location.href = 'user.php';
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
    <h3>Daftar User</h3>
    <div class="row">

        <div class="addUser mt-5 col-6 ">
            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td>
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control mb-3" name="nama" placeholder="Nama">
                        </td>
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
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="form-label">Role</label>
                            <select name="role" class="form-select" id="">
                                <option value="owner">Owner</option>
                                <option value="admin">Admin</option>
                                <option value="karyawan">Karyawan</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary mt-3" name="tambah">Tambah</button>
            </form>
        </div>

        <div class="dataUser col-6">
            <div class="card text-start">
              <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Outlet</th>
                            <th>Role</th>
                            <th>Preview</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php foreach($user as $u):?>
                        <tr>
                            <td><?= $u['nama_USER']?></td>
                            <td><?= $u['nama_outlet']?></td>
                            <td><?= $u['role']?></td>
                            <td> <a href="actionuser.php?id_user=<?=$u['id_user']?>"><i class='bx bxs-bullseye ms-4'></i></a></td>
                            
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