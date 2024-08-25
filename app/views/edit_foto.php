<?php
require_once'../../assets/layouts/navbar.php';

require_once '../models/m_foto.php';
// require_once '../controllers/conn.php';
$tampil = new Foto();
?>

<a class="btn text-white bg-danger" href="selectfoto.php">Kembali</a>
 <div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Edit Profil Anda
                </div>
                <div class="card-body">
                    <form action="../controllers/c_foto.php?aksi=update" class="p-2" method="post"  enctype="multipart/form-data">
                        <?php
                        require_once '../controllers/conn.php';
                        $conn = new database();
                        $id = $_SESSION['foto']['FotoId'];
                        $sql = "SELECT * FROM foto WHERE FotoId = '$id'";
                        $result = mysqli_query($conn->koneksi, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                    
                    <input type="text" name="FotoId" value="<?= $data['FotoId'] ?>" hidden>
                    <input type="text" name="AlbumId" value="<?= $data['AlbumId']?>" hidden>
                    <input type="text" name="UserId" value="<?= $data['UserId'] ?>" hidden>
                        <div class="form-group">
                            <label for="Nama">Judul Foto</label>
                            <input class="form-control" type="text" name="JudulFoto" value="<?= $data['JudulFoto']?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input class="form-control" type="text" name="DeskripsiFoto" value="<?= $data['DeskripsiFoto']?>">
                        </div>
                       
                        <button type="submit" name="update" class="btn btn-outline-info mt-3">Simpan Perubahan</button>
                  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>