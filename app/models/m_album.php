<?php
include_once '../controllers/conn.php';
session_start();


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
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/album.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/album.php'</script>";
        }

    }
    public function tampil_data()
	{

		$conn = new database();
		$data = mysqli_query($conn->koneksi, "SELECT * FROM album ORDER BY AlbumId desc ");
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
	}
    function tampil_data_id($id)
	{
		$conn = new database();
		$query = mysqli_query($conn->koneksi, "SELECT * FROM album WHERE AlbumId = $id");
		while ($row = mysqli_fetch_object($query)) {
			$hasil[] = $row;
		}

		return $hasil;
	}
    public function EditAlbum($AlbumId, $NamaAlbum, $Deskripsi, $TanggalDibuat, $UserId){
        $conn = new database();
        $sql = "UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi', TanggalDibuat='$TanggalDibuat', UserId='$UserId' WHERE AlbumId = '$AlbumId'";
        $result = mysqli_query($conn->koneksi, $sql);
    
        if ($result) {
            echo "<script>alert('Data Berhasil Di Edit');window.location='../views/album.php'</script>";
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