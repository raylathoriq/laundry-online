<?php

$id_user = $_GET['id_user'];
 require 'function.php';

if(hapusUser($id_user)){
    echo"
            <script>
            alert('berhasil dihapus')
            document.location.href = 'user.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal dihapus')
            document.location.href = 'user.php';
            </script>
        ";
}

?>