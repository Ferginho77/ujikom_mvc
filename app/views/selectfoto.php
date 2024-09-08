<?php
require_once'../../assets/layouts/navbar.php';

require_once '../models/m_foto.php';
require_once '../models/m_like.php';
require_once '../models/m_album.php';
require_once '../models/m_komentar.php';
// require_once '../controllers/conn.php';
$tampil = new Foto();
$album = new Album();
$tampillike = new like();
$komentar = new komentar();
?>

<main>
<section>  <?php 
                if(empty($tampil->read($_SESSION['data']['UserId']))) {
                    echo "<h2>Tidak Ada Foto Yang Di Upload</h2>";
                } else {
                ?> 
    <div class="card" data-aos="fade-up">
        <?php  foreach ($tampil->read($_SESSION['data']['UserId'])as $x ) :  ?>
        <div class="card-body">
            <div class="row tm-mb-90 tm-gallery">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <a  href="edit_foto.php?FotoId=<?= $x->FotoId; ?>&AlbumId=<?= $x->AlbumId ?>" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
                    <a onclick="return confirm('Apakah Yakin Akan hapus?')" href="../controllers/c_foto.php?FotoId=<?= $x->FotoId; ?>&aksi=hapus" class="btn btn-outline-danger" ><i class="far fa-trash-alt"></i></a>
                        <img src="../../assets/img/<?= $x->LokasiFile ?>" width="280px" height="350px" alt="foto">
                                <h3><?= $x->JudulFoto ?></h3>
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <p><?= $x->DeskripsiFoto ?></p>
                                </div>
                    </div>
                    <div class="align-items-center justify-content-evenly ">
                                            <h6 class="text-secondary"> Like |<?= $tampillike->jumlah($x->FotoId) ?> Komentar | <?= $komentar->jumlah($x->FotoId)?></h6> 
                                            <?php if ($tampillike->user($x->FotoId, $_SESSION['data']['UserId'])) { ?>
                                                <a class="fs-2" href="../controllers/c_like.php?FotoId=<?= $x->FotoId ?>&UserId=<?= $_SESSION['data']['UserId'] ?>&aksiSelect=deleteSelect"><i class="fas fa-heart text-danger"></i></a>
                                            <?php } else { ?>
                                                <a class="fs-2" href="../controllers/c_like.php?FotoId=<?= $x->FotoId ?>&UserId=<?= $_SESSION['data']['UserId']  ?>&aksiSelect=likeSelect"><i class="far fa-heart text-danger"></i></a>
                                            <?php } 
                                            if (empty($komentar->read_komentar(($x->FotoId)))){
                                                echo "";
                                            }else {  ?>
                                            <?php foreach ($komentar->read_komentar(($x->FotoId )) as $komen) :
                                                ?> 
                                        </div>
                                            <div class="d-flex p-2 alert alert-dark alert-dismissible fade show w-100 mt-2"  role="alert">
                                                <div class="d-flex flex-column">
                                                     <a onclick="return confirm('Apakah Yakin Akan hapus?')"   
                                                        href="../controllers/c_komentar.php?KomentarId=<?= $komen->KomentarId ?>&UserId=<?= $komen->UserId ?>&aksiSelect=hapusSelect">
                                                        <?= isset($_SESSION['data']['UserId']) && $_SESSION['data']['UserId'] == $komen->UserId ? '<i class="fas fa-times text-dark"></i>' : '' ?>
                                                    </a>
                                                    <h6 style="margin-left: 0%; display: inline-block;"><?= $komen->Username ?></h6>
                                                    <p style="margin-left: 0 %; display: inline-block; "><?= $komen->IsiKomentar; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php }?>
                                    <form class="row g-3 mt-3" action="../controllers/c_komentar.php?aksiSelect=tambahSelect" method="post">
                                        <div class="d-flex flex-row mb-3">
                                            <input type="text" name="IsiKomentar" class="form-control" placeholder="Beri Komentar" style="width: 200px;" required>
                                            <input type="hidden" name="Userid" value="<?= $x->UserId ?>" >
                                            <input type="hidden" name="FotoId" value="<?= $x->FotoId ?>" >
                                            <button class="btn btn-outline-info" type="submit" name="tambah"><i class="fab fa-telegram-plane"></i></button>
                                        </div>
                                 </div>
        </div>
    </div>
    <?php endforeach;?>
    <?php }?>
</section>
</main>