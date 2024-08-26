<?php
require_once'../models/m_like.php';

$like = new like();

if (isset($_GET['aksi'])) {
    $user = $_SESSION['data']['UserId'];
    $foto = $_SESSION['foto']['FotoId'];
    $aksi = $_GET['aksi'];

    if ($aksi == 'like') {
        $TanggalLike = date('Y-m-d');
        $like->suka($foto, $user, $TanggalLike);
    } elseif ($aksi == 'delete') {
        $like->unlike($foto, $user);
    }

    header("Location: ../views/home.php");
}
