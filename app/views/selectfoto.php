<?php
require_once'../../assets/layouts/navbar.php';

require_once '../models/m_foto.php';
require_once '../models/m_like.php';
require_once '../models/m_album.php';
// require_once '../controllers/conn.php';
$tampil = new Foto();
$album = new Album();
$tampillike = new like();
?>


<section>  <?php 
              
                if(empty($tampil->read($_SESSION['data']['UserId']))) {
                    echo "<h2>Tidak Ada Foto Yang Di Upload</h2>";
                } else {
                ?>  
    <div class="card mt-2">
        <?php  foreach ($tampil->read($_SESSION['data']['UserId'])as $x ) :  ?>
        <div class="card-body">
            <div class="row tm-mb-90 tm-gallery">
            <div class="row tm-mb-90 tm-gallery">
            </div>
               
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <img src="../../assets/img/<?= $x->LokasiFile ?>" width="280px" height="350px" alt="foto">
                        <h3><?= $x->JudulFoto ?></h3>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <p><?= $x->DeskripsiFoto ?></p>
                         </div>
                      <a  href="edit_foto.php?<?= $x->FotoId; ?>&AlbumId=<?= $x->AlbumId; ?>" class="btn btn-warning">Edit</a>
                      <a onclick="return confirm('Apakah Yakin Akan hapus?')" href="../controllers/c_foto.php?aksi=hapus" class="btn btn-danger" >Hapus</a>
                </div>   
                </div>
               
        </div>
    </div>
    <?php endforeach;?>
    <?php }?>
</section>