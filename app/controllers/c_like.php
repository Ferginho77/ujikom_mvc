<?php
require_once'../models/m_like.php';

$like = new like();

if ($_GET['aksi'] == 'like') {
    $user = $_SESSION['data']['UserID'];
    $foto = $_SESSION['foto']['FotoID'];
    $TanggalLike = date('Y-m-d');

    $like->suka($foto, $user, $TanggalLike);
    header("Location: ../views/home.php");
} elseif ($_GET['aksi'] == 'delete') {
    $id = $_SESSION['data']['UserID'];

    $like->unlike($id);
    header("Location: ../views/home.php");
}