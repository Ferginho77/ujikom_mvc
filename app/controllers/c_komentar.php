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
    }
}elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['KomentarId'];

    $komentar->delete($id);
    header("Location: ../views/home.php");
}