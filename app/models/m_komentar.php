<?php

require_once '../controllers/conn.php';
class komentar {
    public function insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar){
        $conn = new database();
        $sql = "INSERT INTO komentarfoto  VALUES (NULL, '$FotoId', '$UserId', '$IsiKomentar',  '$TanggalKomentar')";
        
        $result = mysqli_query($conn->koneksi, $sql);

    }
    public function read_komentar($foto)
    {
        $conn = new database();
        $data = mysqli_query($conn->koneksi, "SELECT komentarfoto.*, user.* FROM komentarfoto INNER JOIN user ON 
        komentarfoto.UserID = user.UserID WHERE FotoID = $foto");
       
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;   
        }
        return $hasil;
    }
    public function jumlah($id) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT * FROM komentarfoto WHERE FotoId = $id");
        $data = mysqli_num_rows($query);
        
        return $data;
    }

    public function delete($id, $user) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "DELETE FROM komentarfoto WHERE KomentarId = $id AND UserId = $user");
    }

}