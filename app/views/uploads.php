<?php require_once'../../assets/layouts/navbar.php'?>
<div class= "container">
    <div class= "row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4>halaman upload</h4>
                    <form action="./controllers/c_foto.php?aksi=tambah" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Foto</label>
                            <input type="text" class="form-control" name="JudulFoto">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Unggah Foto</label>
                            <input type="date" class="form-control" name="TanggalUnggah">
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
                        <input type="submit" value="uploads" name="uploads" class="btn btn-danger my-3">
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>