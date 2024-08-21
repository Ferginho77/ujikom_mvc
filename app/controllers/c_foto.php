<?php 

include_once '../models/m_foto.php';

$foto = new Foto();

if (isset($_POST['tambah'])) {
    if ($_GET['aksi'] == 'tambah') {
        $JudulFoto = $_POST['JudulFoto'];
        $DeskripsiFoto = $_POST['DeskripsiFoto'];
        $TanggalUnggah = date("Y-m-d");
        $AlbumId = $_SESSION['album']['AlbumId'];
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
            $JudulFoto = $_POST['JudulFoto'];
            $DeskripsiFoto = $_POST['DeskripsiFoto'];
            $TanggalUnggah = $_POST['TanggalUnggah'];
            $LokasiFile = $_FILES['LokasiFile'];
            $AlbumId = $_POST['AlbumId'];
            $foto->UpdateFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId);
            }
           
    else {
        if ($_GET['aksi'] == 'hapus') {
            $FotoId = $_GET['fotoId'];
            $result = $foto->hapus($FotoId);
    
        }
    }

