<?php 

include_once '../models/m_foto.php';

$foto = new Foto();

if (isset($_POST['tambah'])) {
    if ($_GET['aksi'] == 'tambah') {
        $JudulFoto = $_POST['JudulFoto'];
        $DeskripsiFoto = $_POST['DeskripsiFoto'];
        $TanggalUnggah = date("Y-m-d");
        $AlbumId = $_POST['AlbumId'];
        $UserId = $_SESSION['data']['UserId'];
        $LokasiFile = $_FILES['LokasiFile']['name'];
        
        $can = array('jpg', 'png', 'jpeg');
        $x = explode('.', $LokasiFile);
        $ekstensi = strtolower(end($x));
        $tmp = $_FILES['LokasiFile']['tmp_name'];
        
    if (in_array($ekstensi, $can) == true) {
        move_uploaded_file($tmp, '../../assets/img/' . $LokasiFile);
        $foto->TambahFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId);
        // echo "<script>alert('Data Berhasil Ditambah');window.location='../views/home.php'</script>";
    }else {
        echo "<script>alert('Data gagal Ditambahkan');window.location='../views/uploads.php'</script>";
    }
    
}  
} 
if ($_GET['aksi'] == 'update') {
            $FotoId = $_POST['FotoId'];
            $JudulFoto = $_POST['JudulFoto'];
            $DeskripsiFoto = $_POST['DeskripsiFoto'];
            $AlbumId = $_GET['AlbumId'];
            $UserId = $_SESSION['data']['UserId'];
            $foto->UpdateFoto($JudulFoto, $DeskripsiFoto, $AlbumId, $UserId);
            }
           
    elseif ($_GET['aksi'] == 'hapus') {
            $FotoId = $_GET['FotoId'];
            $result = $foto->hapus($FotoId);
            if ($result) {
                echo "<script>alert('Data Berhasil Dihapus');window.location='../views/home.php'</script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus');window.location='../views/album.php'</script>";
            }
        }
    

