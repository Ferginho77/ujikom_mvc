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
                    if(empty($tampil->read_album($_GET['AlbumId']))) {
                        echo "<h2>Tidak Ada Foto Yang Di Upload</h2>";
                    } else {
                    ?>  
                    <a href="album.php" class="btn btn-danger">Kembali</a>
        <div class="card mt-2" data-aos="fade-up">  
            <?php  foreach ($tampil->read_album($_GET['AlbumId'])as $x ) :  ?>
            <div class="card-body">
                <div class="row tm-mb-90 tm-gallery">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <a  href="edit_foto.php?FotoId=<?= $x->FotoId; ?>&AlbumId=<?= $x->AlbumId ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <a onclick="return confirm('Apakah Yakin Akan hapus?')" href="../controllers/c_foto.php?FotoId=<?= $x->FotoId; ?>&aksi=hapus" class="btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                <img src="../../assets/img/<?= $x->LokasiFile ?>" width="280px" height="350px" alt="foto">
                                        <h3><?= $x->JudulFoto ?></h3>
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <p><?= $x->DeskripsiFoto ?></p>
                                </div>
                        </div>   
                </div>
            </div>
            <?php endforeach;?>
        <?php }?>
        </div>
        
    </section>
</main>