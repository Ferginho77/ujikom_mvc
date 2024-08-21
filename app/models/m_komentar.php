<?php
session_start();
require_once '../controllers/conn.php';
class komentar {
    public function insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar){
        $conn = new database();
        $sql = "INSERT INTO komentarfoto VALUES (NULL, '$FotoId', '$UserId', $IsiKomentar,  '$TanggalKomentar')";
        
        $result = mysqli_query($conn->koneksi, $sql);
        return $result;
    }
}