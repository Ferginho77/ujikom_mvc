<?php require_once'../../assets/layouts/navbar.php';
require_once '../models/m_album.php';

$conn = new database();
$tampil = new Album();
?>
<main>
    <div class="container" data-aos="fade-down">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                        <div class="card-header">
                            Tambah Album
                        </div>
                    <div class="card-body">
                        <form action="../controllers/c_album.php?aksi=album" method="POST">
                            <label for="">Nama Album</label>
                            <input type="text" name="NamaAlbum" class="form-control" required>
                            <label for="">Deskripsi</label>
                            <textarea type="text" name="Deskripsi" class="form-control" required></textarea>
                            <input type="text" value="<?= $_SESSION['data']['UserId']?>" hidden>
                                <button type="submit" name="album" class="btn-input btn btn-outline-info mt-3 ">Tambah Album</button>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">
                        Data Album
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php if(empty($tampil->read_album($_SESSION['data']['UserId']))){
                                    echo "";
                            }
                            else{
                            ?>

                            <tbody>
                                <?php foreach ($tampil->read_album($_SESSION['data']['UserId']) as $x) : ?>
                                    <tr>
                                        <td><?= $x->NamaAlbum ?></td>
                                        <td><?= $x->Deskripsi ?></td>
                                        <td><?= $x->TanggalDibuat ?></td>
                                        <td>
                                        <a href="edit_album.php?AlbumId=<?= $x->AlbumId; ?>&aksi=edit"><button type="button" class="btn btn-round btn-primary"><i class="far fa-edit"></i></button></a>
                                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../controllers/c_album.php?AlbumId=<?= $x->AlbumId ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger"><i class="far fa-trash-alt"></i></button></a>
                                        <a class="btn btn-outline-info" href="dalbum.php?AlbumId=<?= $x->AlbumId ?>"><i class="fas fa-folder-open"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                <?php }?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>