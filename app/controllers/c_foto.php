<?php 

include_once '../models/m_foto.php';

$foto = new Foto();

if (isset($_POST['tambah'])) {
    

    if ($_GET['aksi'] == 'tambah') {
        $JudulFoto = $_POST['JudulFoto'];
        $DeskripsiFoto = $_POST['DeskripsiFoto'];
        $TanggalUnggah = $_POST['TanggalUnggah'];
        $AlbumId = $_POST['AlbumId'];
        
        $LokasiFile = $_FILES['LokasiFile'];
        
        $foto->TambahFoto($JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile,  $AlbumId, $UserId);
        
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
    
            if ($result) {
                echo "<script>alert('Data Berhasil Dihapus');window.location='../views/tampil_data.php'</script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus');window.location='../views/tampil_data.php'</script>";
            }
        }
    }

