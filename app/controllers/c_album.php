<?php

include_once '../models/m_album.php';

$album = new Album();

try{
    if(isset($_POST['tambah'])){

        if($_GET['aksi'] == ['tambah']){
            $NamaAlbum = $_POST['NamaAlbum'];
            $Deskripsi = $_POST['Deskripsi'];
            $TanggalDibuat = date('Y-m-d');
            $UserId = $_SESSION['UserId'];
        
            $album->TambahAlbum($NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId);
           
            if ($album) {
                echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/album.php'</script>";
            } else {
                echo "<script>alert('Data Gagal Ditambah');window.location='../views/album.php'</script>";
            }
        }
       
    }
}catch (Exception $e) {
    echo $e->getMessage();
}
