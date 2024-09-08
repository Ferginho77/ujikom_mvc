<?php require_once'../../assets/layouts/navbar.php';
require_once'../models/m_album.php';
$album = new Album();

?>
<main>
    <a class="btn text-white bg-danger" href="album.php">Kembali</a>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        Edit Profil Anda
                    </div>
                    <div class="card-body">
                        <form action="../controllers/c_album.php?aksi=edit" class="p-2" method="post">
                            <?php 
                            foreach ($album->update($_GET['AlbumId']) as $album) :  ?>
                        
                        <input type="text" name="AlbumId" value="<?= $album->AlbumId?>" hidden>
                            <div class="form-group">
                                <label for="Nama">Nama Album</label>
                                <input class="form-control" type="text" name="NamaAlbum" value="<?= $album->NamaAlbum ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input class="form-control" type="text" name="Deskripsi" value="<?= $album->Deskripsi  ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Dibuat</label>
                                <input class="form-control" type="text" name="TanggalDibuat" value="<?= $album->TanggalDibuat  ?>">
                            </div>
                            <?php endforeach; ?>
                            <button type="submit" name="edit" class="btn btn-outline-info mt-3">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>