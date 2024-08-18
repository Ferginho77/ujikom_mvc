<?php
include_once '../controllers/conn.php';
session_start();


class Album {
    public function TambahAlbum($NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId){
        $conn = new database();
        $sql = "INSERT INTO album VALUES (NULL, '$NamaAlbum', '$Deskripsi', '$TanggalDibuat', '$UserId')";
            
        $result = mysqli_query($conn->koneksi, $sql);
        return $result;
        if ($result) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/album.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/album.php'</script>";
        }
        
    }
}