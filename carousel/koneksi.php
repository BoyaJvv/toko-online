<?php
    $koneksi = mysqli_connect("localhost","root","","db_toko");
    $select1         = mysqli_query($koneksi, "SELECT * from product");

    
?>