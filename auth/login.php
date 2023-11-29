<?php 
    session_start();
    require '../config/config.php';
    if(isset($_POST['login'])){
        $nama = $_POST['nama'];
        $password = $_POST['password'];


        $result = mysqli_query($conn,"SELECT * FROM user JOIN outlet USING(id_outlet) WHERE nama_USER = '$nama'");
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password ,$row['password'])){
                if($row['role'] == 'admin'){

                    $_SESSION['login'] = true;
                    $_SESSION['nama'] = $row['nama_USER'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['id_outlet'] = $row['id_outlet'];
                    $_SESSION['nama_outlet'] = $row['nama_outlet'];
                    header("location:../index.php");
                }elseif($row['role'] == 'karyawan'){
                    
                    $_SESSION['login'] = true;
                    $_SESSION['nama'] = $row['nama_USER'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['id_outlet'] = $row['id_outlet'];
                    $_SESSION['nama_outlet'] = $row['nama_outlet'];
                    header("location:../index.php");
                }
            }else{
                echo"<script>
                    alert('password salah')
                    document.location.href = 'login.php'
                    </script>";
            }
            }else{
                echo"<script>
                alert('Akun tidak tersedia')
                document.location.href = 'login.php'
                </script>";
            }
    }

?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">       
            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                <div class="wrapper">
                    <form action="" method="post">

                        <h3 class="text-center mb-5">Login Aplikasi Laundry</h3>
                        <div class=" nama mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control border border-dark border-1 border-none" name="nama" placeholder="Nama...">
                        </div>
                        <div class="password">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control border border-dark border-1" name="password" placeholder="Password...">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100" name="login">Login</button>
                    </div>
                    </form>
            </div>
            <div class="col-xl-8 bg-login d-none d-md-block">
                <div class="bg-login"></div>
            </div>
        </div>
    </div>


  <script src="../asset/js/bootstrap.min.js"></script>

</html>