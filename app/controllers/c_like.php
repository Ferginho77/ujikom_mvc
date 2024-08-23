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
    $id = $_SESSION['data']['UserId'];

    $like->unlike($id);
    header("Location: ../views/home.php");
}