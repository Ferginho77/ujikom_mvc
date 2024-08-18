<?php
session_start();
include_once '../controllers/conn.php';
 
class Foto {
    public function TambahFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId) {
     $conn = new database();
     $sql = "INSERT INTO foto VALUES (NULL, '$JudulFoto', '$DeskripsiFoto', '$TanggalUnggah', '$LokasiFile',  '$AlbumId', '$UserId')";

     $result = mysqli_query($conn->koneksi, $sql);
     return $result;
    
    }

    public function UpdateFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId){
        $conn = new database();
        $sql = "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah', LokasiFile='$LokasiFile', AlbumId='$AlbumId', UserId='$UserId'";

        $result = mysqli_query($conn->koneksi, $sql);
        if ($result) {

            // echo "data tidak gagal ditambahkan";
            echo "<script>alert('Foto Berhasil Ditambahkan');window.location='../views/home.php'</script>";

        } else {

            echo "Foto gagal ditambahkan";
        }
    }
    function hapus($FotoId)
	{
		$conn = new database();
		$sql = "DELETE FROM foto WHERE FotoId = $FotoId";
		$result = mysqli_query($conn->koneksi, $sql);
		return $result;
	}

}