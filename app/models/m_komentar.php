<?php

require_once '../controllers/conn.php';
class komentar {
    public function insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar){
        $conn = new database();
        $sql = "INSERT INTO komentarfoto VALUES (NULL, '$FotoId', '$UserId', $IsiKomentar,  '$TanggalKomentar')";
        
        $result = mysqli_query($conn->koneksi, $sql);
        return $result;
        if ($result) {
            echo "<script>alert('Berhasil Berkomentar');window.location='../views/home.php'</script>";
        }else{
            echo "<script>alert('Gagal Berkomentar');window.location='../views/home.php'</script>";
        }
    }
    public function read_komentar($foto)
    {
        $conn = new database();
        $data = mysqli_query($conn->koneksi, "SELECT komentarfoto.*, user.* FROM komentarfoto INNER JOIN user ON komentarfoto.UserID = user.UserID WHERE FotoID = $foto");
        $hasil = [];
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
    }
    public function jumlah($foto) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT * FROM komentarfoto WHERE FotoID = $foto");
        $data = mysqli_num_rows($query);
        return $data;
    }
    
    public function delete($id) {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "DELETE FROM komentarfoto WHERE KomentarID = $id");
    }

}