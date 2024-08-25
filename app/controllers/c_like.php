<?php
require_once'../models/m_like.php';

$like = new like();

if ($_GET['aksi'] == 'like') {
    $user = $_SESSION['data']['UserId'];
    $foto = $_SESSION['foto']['FotoId'];
    $TanggalLike = date('Y-m-d');

    $like->suka($foto, $user, $TanggalLike);
    header("Location: ../views/home.php");
} elseif ($_GET['aksi'] == 'delete') {
    $UserId = $_SESSION['data']['UserId'];
    $FotoId = $_SESSION['foto']['FotoId'];

    $like->unlike($FotoId, $UserId);
    header("Location: ../views/home.php");
}