<?php require_once'../../assets/layouts/navbar.php';
session_start();
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                    <div class="card-header">
                        Tambah Album
                    </div>
                  <div class="card-body">
                    <form action="../controllers/c_album.php?aksi=tambah" method="POST">
                        <label for="">Nama Album</label>
                        <input type="text" name="NamaAlbum" class="form-control" required>
                        <label for="">Deskripsi</label>
                        <textarea type="text" name="Deskripsi" class="form-control" required></textarea>
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
                        <tbody>
                            <?php
                            //   include_once '../controllers/conn.php';
                            //   $conn = new database;
                            //   $id = $_SESSION['data']['AlbumId'];
                            //   $sql = "SELECT * FROM album WHERE AlbumId = '$id'";
                            //   $result = mysqli_query($conn->koneksi, $sql);
                            //   $data = mysqli_fetch_assoc($result);
                              // var_dump($data);
                            ?>
                            <tr>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>