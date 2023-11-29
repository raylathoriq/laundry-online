<?php
session_start();
require 'config/config.php';


function tambahUser($data){
    global $conn; 

    $nama = htmlspecialchars($data['nama']);
    $outlet = htmlspecialchars($data['outlet']);
    $password = htmlspecialchars($data['password']);
    $role = htmlspecialchars($data['role']);


    $validasi = mysqli_query($conn,"SELECT nama_USER FROM user WHERE nama_USER ='$nama'");
    if(mysqli_fetch_assoc($validasi)){
        echo "<script>
            alert('nama sudah tersedia')
            document.location.href = 'user.php';
            </script>";
        return false;
    }

    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO user VALUES('','$outlet','$nama','$password','$role')");

    return mysqli_affected_rows($conn);
}

function editUser($data){
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $outlet = htmlspecialchars($data['outlet']);
    $role = htmlspecialchars($data['role']);

    mysqli_query($conn,"UPDATE user SET  id_outlet ='$outlet' ,nama = '$nama' , role = '$role' WHERE id_user = '$id'");
    return mysqli_affected_rows($conn);
}


function hapusUser($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM user WHERE id_user = '$id'");
    return mysqli_affected_rows($conn);
}


function tambahPaket($data){
    global $conn;

    $outlet = htmlspecialchars($data['outlet']);
    $jenis_paket = htmlspecialchars($data['jenis_paket']);
    $nama_paket = htmlspecialchars($data['nama_paket']);
    $harga = htmlspecialchars($data['harga']);

    mysqli_query($conn,"INSERT INTO paket VALUES ('','$outlet','$jenis_paket','$nama_paket','$harga')");
    return mysqli_affected_rows($conn);
}


function editPaket($data){
    global $conn;


    $id = $data['id'];
    $outlet = htmlspecialchars($data['outlet']);
    $jenis_paket = htmlspecialchars($data['jenis_paket']);
    $nama_paket = htmlspecialchars($data['nama_paket']);
    $harga = htmlspecialchars($data['harga']);

    mysqli_query($conn,"UPDATE paket SET id_outlet = '$outlet', jenis = '$jenis_paket' , nama_paket = '$nama_paket' , harga = '$harga' WHERE id_paket = '$id'");

    return mysqli_affected_rows($conn);

}


function tambahOutlet($data){
    global $conn;

    $outlet = htmlspecialchars($data['outlet']);
    $alamat = htmlspecialchars($data['alamat']);
    $telp = htmlspecialchars($data['telp']);

    mysqli_query($conn,"INSERT INTO outlet VALUES ('','$outlet','$alamat','$telp')");
    return mysqli_affected_rows($conn);
}

function editOutlet($data){
    global $conn;
    $id = $data['id'];
    $outlet = htmlspecialchars($data['outlet']);
    $alamat = htmlspecialchars($data['alamat']);
    $telp = htmlspecialchars($data['telp']);

    mysqli_query($conn,"UPDATE outlet SET nama_outlet ='$outlet',alamat = '$alamat',telp = '$telp' WHERE id_outlet = '$id'");
    return mysqli_affected_rows($conn);
}

function hapusOutlet($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM outlet WHERE id_outlet ='$id'");
    return mysqli_affected_rows($conn);
}


function tambahMember($data){
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $telp = htmlspecialchars($data['telp']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);

    mysqli_query($conn,"INSERT INTO member VALUES('','$nama','$alamat','$jenis_kelamin','$telp')");
    return mysqli_affected_rows($conn);
}

function editmember($data){
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $telp = htmlspecialchars($data['telp']);

    mysqli_query($conn,"UPDATE member SET nama = '$nama',alamat ='$alamat', telp = '$telp' WHERE id_member ='$id'");
    return mysqli_affected_rows($conn);
}

function hapusMember($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM member WHERE id_member = '$id'");
    return mysqli_affected_rows($conn);

}


function transaksi($data){
    global $conn;

    $outlet = htmlspecialchars($data['outlet']);
    $pelanggan = htmlspecialchars($data['pelanggan']);
    $paket = htmlspecialchars($data['paket']);
    $tgl_kun = htmlspecialchars($data['tgl_kun']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $pj = htmlspecialchars($data['pj']);

    mysqli_query($conn, "INSERT INTO transaksi VALUES('', '$outlet', '$paket', LPAD(FLOOR(RAND() * 9999999999), 10, '0'), '$pelanggan', '$tgl_kun', '', '', '', '$jumlah', '$pj')");


    return mysqli_affected_rows($conn);

}

function editTransaksi($data){
    global $conn;
    $id = $data['id'];
    $tgl_bayar = htmlspecialchars($data['tgl_byr']);
    $status = htmlspecialchars($data['status']);
    $pembayaran = htmlspecialchars($data['pembayaran']);

    mysqli_query($conn,"UPDATE transaksi SET tgl_bayar = '$tgl_bayar',status = '$status' , pembayaran = '$pembayaran' WHERE id_transaksi = '$id'");

    return mysqli_affected_rows($conn);
}

function hapusTransaksi($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM transaksi WHERE id_transaksi = '$id'");
    return mysqli_affected_rows($conn);
}
?>