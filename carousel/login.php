<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = mysqli_query($koneksi, "SELECT * from user where username='$username' and password='$password' ");

 if (mysqli_num_rows($login) > 0){
  $data = mysqli_fetch_assoc($login);
  if ($data['role'] == "admin"){
    $_SESSION['admin'] = $username;
    header("Location: dasbord.php");
  }elseif ($data['role'] == "pelanggan"){
    $_SESSION['user'] = $data['username'];
    $_SESSION['pelanggan'] = $data['nama'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['hp'] = $data['hp'];
    $_SESSION['alamat'] = $data['alamat'];
    $_SESSION['id_user'] = $data['id'];
    header("Location: profil.php");  
    // echo "<script>alert('anda berhasil login');</script>";
    // echo "<script>Location='checkout.php';</script>";
  }else{
  echo "<script>alert('username dan password salah');</script>";
  echo "<script>Location='login.php';</script>";
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