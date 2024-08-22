<?php
require_once '../models/m_komentar.php';

$komentar = new komentar();

if(isset($_POST['tambah'])){
    $FotoId = $_SESSION['foto']['FotoId'];
    $UserId = $_SESSION['data']['UserId'];
    $IsiKomentar = $_POST['IsiKomentar'];
    $TanggalKomentar = date("Y-m-d");

    $komentar->insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar);
}elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['KomentarID'];

    $komentar->delete($id);
}