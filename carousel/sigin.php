<?php
    include 'koneksi.php';


    if(isset($_POST['masuk'])) {
        $nama = $_POST ['nama'];
        $email = $_POST  ['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hp = $_POST  ['hp'];
        $alamat = $_POST  ['alamat'];

        if ($nama && $email && $username && $password ){
     
     $masuk = mysqli_query(
     $koneksi,  "INSERT INTO user (nama, email, username, password, hp, alamat,role) 
     values('$nama', '$email', '$username', '$password', '$hp', '$alamat','pelanggan')"
     );
     
     if ($masuk) {
         header("location: login.php");
     }
    }else{
        
    }
 }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
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
        <div class="login-box w-70% p-3 h-75 shadow">
            <form action="" method="post">
                <div>
                    <label for="nama">nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div>
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <label for="hp">No Handphone</label>
                    <input type="text" class="form-control" name="hp" id="hp">
                </div>
                <div>
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="masuk" value="login" >Daftar</button>
                </div>
            </form>
        </div>
        <div class="mt-3" style="width: 700px">
         
            
           
        </div>
    </div>
</body>
</html>