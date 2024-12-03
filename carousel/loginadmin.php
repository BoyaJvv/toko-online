<?php
 $koneksi = mysqli_connect("localhost","root","","db_toko");
    include 'koneksi.php';

    session_start();

 if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = mysqli_query(
    $koneksi,"SELECT * FROM user WHERE username='$username' and password='$password'");
   

    if($data = mysqli_fetch_array($login)) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        header('location:dasbord.php');
     }
     else{
        header('location : loginadmin.php');
    }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    .main{
        height: 100vh;
    }
    .login-box{
        width:500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }
    .no-decoration{
        text-decoration:none;
    }
 </style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-4 shadow">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="login" value="login" >Log in</button>
                    <p></p>
                    <p>Anda Belum Mempunyai Akun?<a href="sigin.php" class="text-blue no-decoration">Masuk</a></p>
                </div>
            </form>
        </div>
        <div class="mt-3" style="width: 500px">
         
            
           
        </div>
    </div>
</body>
</html>