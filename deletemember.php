<?php
$id_member = $_GET['id_member'];
 require 'function.php';

if(hapusMember($id_member)){
    echo"
            <script>
            alert('berhasil dihapus')
            document.location.href = 'member.php';
            </script>
        ";
    }else{
        echo"
            <script>
            alert('gagal dihapus')
            document.location.href = 'member.php';
            </script>
        ";
}

?>