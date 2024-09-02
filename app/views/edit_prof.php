<?php require_once'../../assets/layouts/navbar.php';
 include_once '../controllers/conn.php';
?>
 <a class="btn text-white bg-danger" href="profile.php">Kembali</a>
     
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Edit Profil Anda
                </div>
                <div class="card-body">
                    <form action="../controllers/c_user.php?aksi=update" class="p-2" method="post">
                    <?php 
                        include_once '../controllers/conn.php';
                        $conn = new database;
                        $id = $_SESSION['data']['UserId'];
                        $sql = "SELECT * FROM user WHERE UserId = '$id'";
                        $result = mysqli_query($conn->koneksi, $sql);
                        $data = mysqli_fetch_assoc($result);        
                        ?>
                    <input type="hidden" name="UserId" value="<?= $data['UserId'] ?>">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input class="form-control" type="text" name="Username" value="<?= $data['Username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="Email" value="<?= $data['Email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input class="form-control" type="text" name="NamaLengkap" value="<?= $data['NamaLengkap'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input class="form-control" type="text" name="Alamat" value="<?= $data['Alamat'] ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-outline-info mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>