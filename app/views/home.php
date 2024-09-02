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
                <div class="card border-dark mt-2">      
                        <div class="card-header ">
                            <h6>Postingan dari <?= $x->Username ?></h6>
                        <h6 class="position-absolute top-0 end-0"><?= $x->TanggalUnggah ?></h6>
                        </div>
                    <div class="card-body">
                        <div class="row tm-mb-90 tm-gallery">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                                <img src="../../assets/img/<?= $x->LokasiFile ?>" width="280px" height="350px" alt="foto">
                                    <h3><?= $x->JudulFoto ?></h3>
                                    <p><?= $x->DeskripsiFoto ?></p>
                                        <div class="align-items-center justify-content-evenly ">
                                            <h6 class="text-secondary"> Like |<?= $tampillike->jumlah($x->FotoId) ?> Komentar | <?= $komentar->jumlah($x->FotoId)?></h6> 
                                            <?php if ($tampillike->user($x->FotoId, $_SESSION['data']['UserId'])) { ?>
                                                <a class="fs-2" href="../controllers/c_like.php?FotoId=<?= $x->FotoId ?>&UserId=<?= $_SESSION['data']['UserId'] ?>&aksi=delete"><i class="fas fa-heart text-danger"></i></a>
                                            <?php } else { ?>
                                                <a class="fs-2" href="../controllers/c_like.php?FotoId=<?= $x->FotoId ?>&UserId=<?= $_SESSION['data']['UserId']  ?>&aksi=like"><i class="far fa-heart text-danger"></i></a>
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
                                                        href="../controllers/c_komentar.php?KomentarId=<?= $komen->KomentarId ?>&UserId=<?= $komen->UserId ?>&aksi=hapus">
                                                        <?= isset($_SESSION['data']['UserId']) && $_SESSION['data']['UserId'] == $komen->UserId ? '<i class="fas fa-times text-dark"></i>' : '' ?>
                                                    </a>
                                                    <h6 style="margin-left: 0%; display: inline-block;"><?= $komen->Username ?></h6>
                                                    <p style="margin-left: 0 %; display: inline-block; "><?= $komen->IsiKomentar; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php }?>
                                    <form class="row g-3 mt-3" action="../controllers/c_komentar.php?aksi=tambah" method="post">
                                        <div class="d-flex flex-row mb-3">
                                            <input type="text" name="IsiKomentar" class="form-control" placeholder="Beri Komentar" style="width: 200px;" required>
                                            <input type="hidden" name="Userid" value="<?= $x->UserId ?>" >
                                            <input type="hidden" name="FotoId" value="<?= $x->FotoId ?>" >
                                            <button class="btn btn-outline-info" type="submit" name="tambah"><i class="fab fa-telegram-plane"></i></button>
                                        </div>
                                    </form>
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
<script>
    function adjustColumnWidth() {
    const input = document.getElementById('textInput');
    const column = input.parentElement;

    // Mengatur lebar kolom agar sesuai dengan teks yang diinput
    column.style.width = input.value.length + 'ch';
}
</script>