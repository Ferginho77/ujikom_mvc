<?php
require_once'../../assets/layouts/navbar.php';

require_once '../models/m_foto.php';
require_once '../models/m_like.php';
require_once '../models/m_komentar.php';
// require_once '../controllers/conn.php';
$tampil = new Foto();
$komentar = new komentar();
$tampillike = new like();
?>

<h1> Selamat Datang <?= $_SESSION['data']['Username'] ?></h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <main class="mt-3">

            <section>
                <?php 
                $fotos = $tampil->tampil_foto();
                if (empty($fotos)) {
                    echo "<h2>Tidak Ada Postingan</h2>";
                } else {
                    foreach ($fotos as $x) : 
                ?>  
    <div class="card mt-2">
                    
        <div class="card-header">
            <h6>Postingan dari <?= $x->Username ?></h6>
           

        </div>
        <div class="card-body">
            <div class="row tm-mb-90 tm-gallery">
            <div class="row tm-mb-90 tm-gallery">
            
            </div>
               
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <img src="../../assets/img/<?= $x->LokasiFile ?>" width="280px" height="350px" alt="foto">
                        <h3><?= $x->JudulFoto ?></h3>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <p><?= $x->DeskripsiFoto ?></p>
                            <h6 class="text-secondary"> Like |<?= $tampillike->jumlah($x->FotoId) ?></h6>
                         </div>
                        <?php if ($tampillike->user($x->FotoId, $_SESSION['data']['UserId']) == 0) {?>
                            <a href="../controllers/c_like.php?FotoId=<? $x->FotoId?>&UserId<?= $_SESSION['data']['UserId']?>&aksi=like">Like</a>
                            <?php } else { ?>
                    <a href="../controllers/c_like.php?UserId=<?= $_SESSION['data']['UserId'] ?>&aksi=delete"><i class="text-secondary bx bxs-like"></i> Unlike</a>
                <?php } ?>
                </div>   
                </div>
               
        </div>
    </div>
    <?php endforeach;?>
    <?php }?>
</section>
</main>
        </div>
    </div>
</div>

