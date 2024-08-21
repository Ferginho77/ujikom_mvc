<?php
session_start();
include_once '../controllers/conn.php';
 
class Foto {
    public function TambahFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId) {
     $conn = new database();
     $sql = "INSERT INTO foto VALUES (NULL, '$JudulFoto', '$DeskripsiFoto', '$TanggalUnggah', '$LokasiFile',  '$AlbumId', '$UserId')";

     $result = mysqli_query($conn->koneksi, $sql);

     $hasil = "SELECT * FROM foto WHERE JudulFoto  = '$JudulFoto'";
     $album = mysqli_query($conn->koneksi, $hasil);
     $cekk = mysqli_fetch_assoc($album);

     if ($result) {
        $_SESSION["foto"] = $cekk;
        echo "<script>alert('foto Berhasil Ditambahkan');window.location='../views/home.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambah');window.location='../views/uploads.php'</script>";
    }

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
  public function hapus($FotoId)
	{
		$conn = new database();
		$sql = "DELETE FROM foto WHERE FotoId = $FotoId";
		$result = mysqli_query($conn->koneksi, $sql);
		return $result;
	}
   public function tampil_foto(){
    $conn = new database();
		$data = mysqli_query($conn->koneksi, "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.UserID = user.UserID ORDER BY FotoID DESC");
        $hasil = [];
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
   }

}