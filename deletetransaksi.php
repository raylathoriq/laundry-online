<?php
$id_transaksi = $_GET['id_detail'];
require 'function.php';

if(hapusTransaksi($id_transaksi)){
    echo"
            <script>
            alert('berhasil dihapus')
            document.location.href = 'transaksi.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal dihapus')
            document.location.href = 'transaksi.php';
            </script>
        ";
}

?>