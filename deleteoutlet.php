<?php

$id_outlet = $_GET['id_outlet'];
require 'function.php';

if(hapusOutlet($id_outlet)){
    echo"
    <script>
    alert('berhasil dihapus')
    document.location.href = 'outlet.php';
    </script>
    ";

    }else{
    echo"
        <script>
        alert('gagal dihapus')
        document.location.href = 'outlet.php';
        </script>
    ";
}

?>
