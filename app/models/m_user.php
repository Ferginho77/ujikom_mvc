<?php

include_once '../controllers/conn.php';

class c_login{
    public function register($Username, $Password, $Email, $NamaLengkap,  $Alamat){
        $conn = new database();
        if(isset($_POST['regis'])){
            $cek = mysqli_query($conn->koneksi, "SELECT * FROM user WHERE Email = '$Email' OR Username = '$Username'");
            $data = mysqli_num_rows($cek);
            if($data > 0){
                echo "<script> alert('email / username sudah terdaftar');
                      document.location.href = '../views/register.php';
                     </script>";
            }else{
                $sql = mysqli_query($conn->koneksi, "INSERT INTO user VALUES (NULL, '$Username', '$Password', '$Email', '$NamaLengkap',  '$Alamat')" );
                if ($sql) {
                        echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/login.php'</script>";
                    } else {
                        echo "<script>alert('Data Gagal Ditambah');window.location='../views/register.php'</script>";
                    }
            }
        }  
    }


    public function login($Username=null, $Password=null){
        $conn = new database();
        //untuk mengecek apakah tombol login di tekan, jika di tekan akan menjalankan perintah dibawahnya
        if (isset($_POST['login'])) {
            $sql = "SELECT * FROM user WHERE Username  = '$Username'";
            $result = mysqli_query($conn->koneksi, $sql);
            $data = mysqli_fetch_assoc($result);
            if ($result) {
               if(mysqli_num_rows($result) > 0){
                if(password_verify($Password, $data['Password'])){
                    $_SESSION["data"] = $data;
                    echo"<script>
                    alert('Password Benar');
                    window.location.href='../views/home.php';
                    </script>";
                }else{
                    echo"<script>
                    alert('Password Salah');
                    window.location.href='../views/login.php';
                    </script>";
                }
            }
            }
        }
    }
    public function UpdateProfil($UserId, $Username, $Email, $NamaLengkap,  $Alamat){
        $conn = new database();
        $sql = "UPDATE user SET Username='$Username', Email='$Email', NamaLengkap='$NamaLengkap', Alamat='$Alamat' WHERE UserId = '$UserId'";
       
        $result = mysqli_query($conn->koneksi, $sql);
        
        if ($result) {
            echo "<script>alert('User Berhasil Di edit');window.location='../views/profile.php'</script>";

        } else {

            echo "Foto gagal ditambahkan";
        }
    }

    function tampil_data_id($UserId)
	{
		$conn = new database();
		$sql = mysqli_query($conn->koneksi, "SELECT * FROM user WHERE UserId = $UserId");
		while ($row = mysqli_fetch_object($sql)) {
			$hasil[] = $row;
		}

		return $hasil;
	}

    public function logout(){

        //menghentikan session
        session_destroy();
      

        echo "<script>
        alert('Logout berhasil');
        window.location.href='../views/login.php';
      </script>";
        exit;
    }

    
}

?>