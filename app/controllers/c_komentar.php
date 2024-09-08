<?php
require_once '../models/m_komentar.php';

$komentar = new komentar();

if(isset($_POST['tambah'])){
    if(isset($_GET['aksi']) && $_GET['aksi'] == 'tambah'){
    $FotoId = $_POST['FotoId'];
    $UserId = $_SESSION['data']['UserId'];
    $IsiKomentar = $_POST['IsiKomentar'];
    $TanggalKomentar = date("Y-m-d");

    $komentar->insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar);
    header("Location: ../views/home.php");
    }
}elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['KomentarId'];
    $user = $_SESSION['data']['UserId'];

    $komentar->delete($id, $user);
    header("Location: ../views/home.php");
}

if(isset($_GET['aksiSelect'])){
    $FotoId = $_POST['FotoId'];
    $UserId = $_SESSION['data']['UserId'];
    $IsiKomentar = $_POST['IsiKomentar'];
    $aksi = $_GET['aksiSelect'];
    
    if ($aksi == 'tambahSelect') {
        $TanggalKomentar = date("Y-m-d");
        $komentar->insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar);
    }elseif ($aksi == 'hapusSelect') {
        $id = $_GET['KomentarId'];
        $user = $_SESSION['data']['UserId'];
        $komentar->delete($id, $user);
    }
    header("Location: ../views/selectfoto.php");
}
