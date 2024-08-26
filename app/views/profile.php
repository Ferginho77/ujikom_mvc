<?php require_once'../../assets/layouts/navbar.php';
require_once '../controllers/conn.php';
?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mt-5 pt-5">
            <div class="row z-depth-3">
                <div class="col-sm-4 bg-info rounded-left position-relative">
                    <div class="card-block text-center text-white">
                    
                    <h4><?= $_SESSION['data']['NamaLengkap']?></h4>
                    <i class="far fa-user mt-5 fs-1 position-absolute top-50 start-50 translate-middle"></i>
                    </div>
                    <a class="btn text-white bg-warning position-absolute top-100 start-50 translate-middle" href="edit_prof.php?id=<?= $_SESSION['data']['UserId']?>">Edit Profile</a>
                </div>
                <div class="col-sm-8 bg-white rounded-right">
                    <h3 class="mt-3 text-center"> Profil Anda</h3>
                    <div class="row">
                        <?php 
                        include_once '../controllers/conn.php';
                        $conn = new database;
                        $id = $_SESSION['data']['UserId'];
                        $sql = "SELECT * FROM user WHERE UserId = '$id'";
                        $result = mysqli_query($conn->koneksi, $sql);
                        $data = mysqli_fetch_assoc($result);
                        // var_dump($data);
                        
                        ?>
                        <div class="mt-3">
                            <p class="font-weight-bold">Username:</p>
                            <h6 class="text-muted"><?= $data['Username'] ?></h6>
                        </div>
                        <div class="mt-3">
                            <p class="font-weight-bold">Email:</p>
                            <h6 class="text-muted"><?= $data['Email'] ?></h6>
                        </div>
                        <div class="mt-3">
                            <p class="font-weight-bold">Nama Lengkap:</p>
                            <h6 class="text-muted"><?= $data['NamaLengkap'] ?></h6>
                        </div>
                        <div class="mt-3">
                            <p class="font-weight-bold">Alamat:</p>
                            <h6 class="text-muted"><?= $data['Alamat'] ?></h6>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>

    </div>
</div>