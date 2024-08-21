<?php
session_start();
require_once '../controllers/conn.php';
class like {
    public function suka($FotoId, $UserId, $TanggalLike){
        $conn = new database();
        $sql = "INSERT INTO foto VALUES (NULL, '$FotoId',  '$TanggalLike', '$UserId')";
        
        $result = mysqli_query($conn->koneksi, $sql);
        return $result;
    }
}