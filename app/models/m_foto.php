<?php

include_once '../controllers/conn.php';
 
class Foto {
    public function TambahFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId) {
     $conn = new database();
     $sql = "INSERT INTO foto VALUES (NULL, '$JudulFoto', '$DeskripsiFoto', '$TanggalUnggah', '$LokasiFile',  '$AlbumId', '$UserId')";
     $result = mysqli_query($conn->koneksi, $sql);

     $hasil = "SELECT * FROM foto WHERE JudulFoto  = '$JudulFoto'";
     $query = mysqli_query($conn->koneksi, $hasil);
     $cekk = mysqli_fetch_assoc($query);
     
     if ($result) {
        $_SESSION["foto"] = $cekk;
        header("Location: ../views/home.php");
    } else {
        echo "<script>alert('Data Gagal Ditambah');window.location='../views/uploads.php'</script>";
    }

    }
    public function UpdateFoto($FotoId, $JudulFoto, $DeskripsiFoto, $AlbumId, $UserId){
        $conn = new database();
        $sql = "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto',  AlbumId='$AlbumId', UserId='$UserId' WHERE FotoId = $FotoId";
       
        $result = mysqli_query($conn->koneksi, $sql);
       
        if ($result) {
            header("Location: ../views/selectfoto.php");
        } else {
            echo "<script>alert('Foto Gagal Di Edit');window.location='../views/selectfoto.php'</script>";
        }
    }
  public function hapus($FotoId)
	{
		$conn = new database();
		$sql = "DELETE FROM foto WHERE FotoId = $FotoId";
		$result = mysqli_query($conn->koneksi, $sql);
		return $result;
	}
   public function tampil_foto(){
    $conn = new database();
		$data = mysqli_query($conn->koneksi, "SELECT * FROM foto INNER JOIN user ON foto.UserId=user.UserId ORDER BY FotoId DESC");
        $hasil = [];
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
   }
   public function select($id)
   {
       $conn = new database();
       $query = mysqli_query($conn->koneksi, "SELECT * FROM foto WHERE FotoId = $id");
       $hasil = [];
       while ($row = mysqli_fetch_object($query)) {
           $hasil[] = $row;
       }
       return $hasil;
      
   }

   public function read($userId) {
    $conn = new database();
    $query = mysqli_query($conn->koneksi, "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.UserId = user.UserId WHERE foto.UserId = $userId ORDER BY FotoId DESC");
    $hasil = [];
    while ($row = mysqli_fetch_object($query)) {
        $hasil[] = $row;
    }
    return $hasil;
}

   public function read_album($album) {
    $conn = new database();
    $query = mysqli_query($conn->koneksi, "SELECT * FROM foto WHERE AlbumId = $album");
    $hasil = [];
       while ($row = mysqli_fetch_object($query)) {
           $hasil[] = $row;
       }
       return $hasil;
   }
  
}