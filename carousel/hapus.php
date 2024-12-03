<?php



    $product = $_GET['id'];

    //gunakan fungsi di bawah ini agar session bisa dibuat
    session_start();
    
    //koneksi ke database 
    $koneksi = mysqli_connect("localhost", "root", "", "db_toko");
    
    //hapus data dari tabel kontak
    $delete = mysqli_query($koneksi, "delete from product where id=".$product);
    
    //set session sukses
    $_SESSION["sukses"] = 'Data Berhasil Dihapus';
    
    //redirect ke halaman index.php
    header('Location: dasbord.php');   



?>

