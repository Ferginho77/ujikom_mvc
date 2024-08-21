<?php

include_once '../models/m_album.php';

$album = new Album();

try{
    if(isset($_POST['album'])){

        if(isset($_GET['aksi']) && $_GET['aksi'] == 'album'){
            $NamaAlbum = $_POST['NamaAlbum'];
            $Deskripsi = $_POST['Deskripsi'];
            $TanggalDibuat = date('Y-m-d');
            $UserId = $_SESSION['data']['UserId'];
           
            $album->TambahAlbum($NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId);
        }
       
    }  
    if ($_GET['aksi'] == 'edit') {
        $AlbumId = $_POST['AlbumId'];
        $NamaAlbum = $_POST['NamaAlbum'];
        $Deskripsi = $_POST['Deskripsi'];
        $TanggalDibuat = $_POST['TanggalDibuat'];  
        $UserId = $_SESSION['data']['UserId'];

        $album->EditAlbum($AlbumId, $NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId);
            
        }
        elseif($_GET['aksi'] == 'hapus') {
            $AlbumId = $_GET['AlbumId'];
            $result = $album->hapus($AlbumId);
    
            if ($result) {
                echo "<script>alert('Data Berhasil Dihapus');window.location='../views/album.php'</script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus');window.location='../views/album.php'</script>";
            }
        }  
}catch (Exception $e) {
    echo $e->getMessage();
}
