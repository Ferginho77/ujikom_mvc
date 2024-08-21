<?php
require_once '../models/m_komentar.php';

$komen = new komentar();

if(isset($_POST['tambah'])){
    $FotoId = $_SESSION['album']['FotoId'];
    $UserId = $_SESSION['data']['UserId'];
    $IsiKomentar = $_POST['IsiKomentar'];
    $TanggalKomentar = date("Y-m-d");

    $komen->insert_komen($FotoId, $UserId, $IsiKomentar, $TanggalKomentar);
}