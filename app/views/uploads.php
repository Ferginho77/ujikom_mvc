<?php require_once'../../assets/layouts/navbar.php';
require_once '../models/m_album.php';
$conn = new database();
$tampil = new Album();
?>
<div class= "container">
    <div class= "row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4>halaman upload</h4>
                    <form action="../controllers/c_foto.php?aksi=tambah" method="post" enctype="multipart/form-data">
                        <?php ?>
                    <input type="text" name="FotoId" id="FotoId" hidden>
                    <input type="text" name="UserId" id="UserId" value="<?= $_SESSION['data']['UserId']?>" hidden >
                        <div class="form-group">
                            <label>Judul Foto</label>
                            <input type="text" class="form-control" name="JudulFoto">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Foto</label>
                            <textarea name="DeskripsiFoto" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>pilih gambar</label>
                            <input type="file" name="LokasiFile" class="form-control"  >
                            <small class="text-danger">file harus berupa: *.jpg *.png</small>
                        </div>
                        <div class="form-group">
                            <label>Pilih Album Foto</label>
                            <select name="AlbumId" class="form-select">
                            <?php foreach (($tampil->read_album($_SESSION['data']['UserId'])) as $x) : ?>
                                <option value="<?= $x->AlbumId ?>"><?= $x->NamaAlbum ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn-input btn btn-outline-info mt-3 ">Tambah Foto</button>
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>