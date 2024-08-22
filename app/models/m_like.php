<?php

require_once '../controllers/conn.php';
class like {
    public function suka($FotoId, $UserId, $TanggalLike){
        $conn = new database();
        $sql = "INSERT INTO foto VALUES (NULL, '$FotoId',  '$TanggalLike', '$UserId')";
        
        $result = mysqli_query($conn->koneksi, $sql);
        return $result;
    }
    public function user($foto, $id) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT * FROM likefoto WHERE FotoID = $foto AND UserID = $id");
        $data = mysqli_num_rows($query);
        return $data;
    }
    public function jumlah($foto) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT * FROM likefoto WHERE FotoID = $foto");
        $data = mysqli_num_rows($query);
        return $data;
    }

    public function unlike($id) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "DELETE FROM likefoto WHERE UserID = $id");
    }
}