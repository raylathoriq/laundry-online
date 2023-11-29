<?php
session_start();
require 'config/config.php';
$title = 'Dashboard';
$user = mysqli_query($conn,"SELECT * FROM user");



if(!isset($_SESSION['login'])){
  echo"<script>
        alert('Harap login terlebih dahulu')
        document.location.href = 'auth/login.php';
      </script>";
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
   
    <?php include 'component/sidebar.php';?>
    <h3 class="">Dashboard</h3>
    <?php
    if($_SESSION['role'] == 'admin'){
      echo"Admin :". "  " . $_SESSION['nama']; 
    }elseif($_SESSION['role'] =='karyawan'){
      echo" Kasir :". "  ". $_SESSION['nama'];
    }
    ?>
    <div class="row mt-5">
        <div class="col-3">
            <div class="card text-start">
              <div class="card-body">
                <h4 class="card-title text-center">Admin</h4>
                <?php
                $admin = mysqli_query($conn,"SELECT * FROM user WHERE role = 'admin'");
                $jumlah_admin = mysqli_num_rows($admin);
                ?>
                <p class="card-text text-center"><?= $jumlah_admin?></p>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-start">
              <div class="card-body bg-warning">
                <h4 class="card-title text-center">Karyawan</h4>
                <?php 
                $karyawan = mysqli_query($conn,"SELECT * FROM user WHERE role = 'karyawan'");
                $jumlah_karyawan= mysqli_num_rows($karyawan);
                ?>
                <p class="card-text text-center"><?= $jumlah_karyawan?></p>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-start">
              <div class="card-body bg-info">
                <h4 class="card-title text-center">Member</h4>
                <?php 
                $member = mysqli_query($conn,"SELECT * FROM member");
                $m = mysqli_num_rows($member);
                ?>
                <p class="card-text text-center"><?= $m?></p>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-start">
              <div class="card-body bg-primary">
                <h4 class="card-title text-center text-white">Paket</h4>
                <?php
                $paket = mysqli_query($conn,"SELECT * FROM paket");
                $p = mysqli_num_rows($paket);
                ?>
                <p class="card-text text-center text-white"><?= $p ?></p>
              </div>
            </div>
        </div>
    </div>
    
</body>
</html>