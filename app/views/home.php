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
                        <div class="align-items-center justify-content-evenly ">
                            <p><?= $x->DeskripsiFoto ?></p>
                            <h6 class="text-secondary"> Like |<?= $tampillike->jumlah($x->FotoId) ?></h6> 
                            <?php if ($tampillike->user($x->FotoId, $_SESSION['data']['UserId']) == 0) {?>
                            <a class="fs-2" href="../controllers/c_like.php?FotoId=<? $x->FotoId?>&UserId<?= $_SESSION['data']['UserId']?>&aksi=like"><i class="far fa-heart text-danger"></i></a>
                            <?php } else { ?>
                            <a class="fs-2" href="../controllers/c_like.php?UserId=<?= $_SESSION['data']['UserId'] ?>&aksi=delete"><i class="fas fa-heart text-danger"></i></a>
                             <?php } 
                             if (empty($komentar->read_komentar(($x->FotoId)))){
                                echo "";
                             }else {  ?>
                             <?php foreach ($komentar->read_komentar(($x->FotoId)) as $komen) :?>
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h6><?= $komen->Username ?></h6>
                                    </div>
                                    <p><?= $komen->$_SESSION['komen']['IsiKomentar'];
                                    ?></p>
                                </div>
                         </div>
                         <?php endforeach; ?>
                        <?php }?>
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

