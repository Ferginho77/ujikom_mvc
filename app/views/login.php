
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Login Page</title>
</head>

<body>
    <div class="input">
        <h1>LOGIN</h1>
        <form action="../controllers/c_user.php?aksi=login" method="POST">
            <div class="box-input">
            <i class="far fa-user"></i>
                <input type="text" name="Username" placeholder="Username">
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" id="id_password"  placeholder="Password"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            
                <button type="submit" name="login" class="btn-input">Login</button>
            
            <div class="bottom">
                <p>Belum punya akun?
                    <a href="register.php">Register disini</a>
                </p>
            </div>
        </form>
    </div>
    <script>
      feather.replace();
    </script>
     <script src="../../assets/js/login.js">
    </script>
</body>

</html>