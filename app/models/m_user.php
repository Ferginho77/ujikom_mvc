<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//memanggil file koneksi kedalam file c_login
include_once '../controllers/conn.php';

//membuat kelas dari file C_login, harus sama dengan nama file
class c_login{

    //membuat method atau fungsi untuk menampung data dari form register yang di input oleh user kedalam tabel user
    public function register($Username, $Password, $Email, $NamaLengkap,  $Alamat){
        
        // membuat variabel yang bertipe data objek dari kelas c_koneksi
        $conn = new database();

        // perintah untuk memasukan data register kedalam tabel users
        $sql = "INSERT INTO user VALUES (NULL, '$Username', '$Password', '$Email', '$NamaLengkap',  '$Alamat')";

        //harjon menjalankan perintah $sql dengan memiliki 2 parameter, 1. koneksi, 2.perintahnya
        $result = mysqli_query($conn->koneksi, $sql);
		return $result;
        //mengecek kondisi data berhasil atau tidak
        if ($result) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/login.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/register.php'</script>";
        }
        
    }
    public function isUsernameExists($Username) {
        $conn = new database();
        $sql = "SELECT * FROM user WHERE Username = '$Username' LIMIT 1";
        $result = mysqli_query($conn->koneksi, $sql);

        // Jika ada hasil, maka username sudah ada
        return mysqli_num_rows($result) > 0;
    
    }


    //fungsi  mengatur proses identifikasi login
    public function login($Username=null, $Password=null){
        
        $conn = new database();
        //untuk mengecek apakah tombol login di tekan, jika di tekan akan menjalankan perintah dibawahnya
        if (isset($_POST['login'])) {
            
            //menampilkan semua data dari tabel user berdasarkan username dari user
            $sql = "SELECT * FROM user WHERE Username  = '$Username'";

            $result = mysqli_query($conn->koneksi, $sql);
            
            //merubah data menjadi array asosiatif
            $data = mysqli_fetch_assoc($result);
           
            //MEMULAI SESI LOGIN

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
            // echo "data tidak gagal ditambahkan";
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