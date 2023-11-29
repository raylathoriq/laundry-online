<?php
require 'function.php';
$id_transaksi = $_GET['id_detail'];
$transaksi = mysqli_query($conn,"SELECT *  FROM transaksi JOIN outlet AS o USING(id_outlet) WHERE id_outlet = '$_SESSION[id_outlet]'");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    
</head>
<body>
    <h3 class="text-center mt-5">Laporan Outlet <?=$_SESSION['nama_outlet']?></h3>

    <div class="container">
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Jumlah Transaksi</th>
                    <th>Pemasukan</th>
                </tr>
            </thead>
        </table>

    </div>
    

        <!-- <script>window.print()</script> -->
</body>
</html>