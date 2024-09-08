<?php
include_once '../controllers/conn.php';



class Album {
    public function TambahAlbum($NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId){
        $conn = new database();
        $sql = "INSERT INTO album VALUES (NULL, '$NamaAlbum', '$Deskripsi', '$TanggalDibuat', '$UserId')";
            
        $result = mysqli_query($conn->koneksi, $sql);

        $hasil = "SELECT * FROM album WHERE NamaAlbum  = '$NamaAlbum'";
        $album = mysqli_query($conn->koneksi, $hasil);
        $cekk = mysqli_fetch_assoc($album);

        if ($result) {
            $_SESSION["album"] = $cekk;
            header("Location: ../views/album.php");
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/album.php'</script>";
        }

    }
    public function tampil_data()
	{

		$conn = new database();
		$data = mysqli_query($conn->koneksi, "SELECT * FROM album ORDER BY AlbumId desc ");
        $hasil = [];
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
	}
    function update($id)
	{
		$conn = new database();
		$query = mysqli_query($conn->koneksi, "SELECT * FROM album WHERE AlbumId = $id");
		$hasil = [];
		while ($d = mysqli_fetch_object($query)) {
			$hasil[] = $d;
		}
		return $hasil;
	}
    public function read_album($UserId){
        $conn = new database();
		$query = mysqli_query($conn->koneksi, "SELECT * FROM album WHERE UserId = $UserId ORDER BY AlbumId DESC");
		$hasil = [];
		while ($d = mysqli_fetch_object($query)) {
			$hasil[] = $d;
		}
		return $hasil;
    }
    
    public function EditAlbum($AlbumId, $NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId){
        $conn = new database();
        $sql = "UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi', TanggalDibuat='$TanggalDibuat', UserId='$UserId' WHERE AlbumId = '$AlbumId'";
        $result = mysqli_query($conn->koneksi, $sql);
    
        if ($result) {
            header("Location: ../views/album.php");
        } else {
            echo "<script>alert('Data Gagal Di Edit');window.location='../views/album.php'</script>";
        }
    }
   public function hapus($AlbumId)
	{
		$conn = new database();
		$sql = "DELETE FROM album WHERE AlbumId = $AlbumId";
		$result = mysqli_query($conn->koneksi, $sql);
		return $result;
        
	}
}