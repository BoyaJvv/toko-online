<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: dasbord.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM product WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$product = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<form action="dasbord.php" method="post" enctype="multipart/form-data text-align-center">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama_produk" placeholder="nama_produk" value="<?php echo $product['nama'] ?>" />
  </div>
  <div class="mb-3">
    <label for="Harga" class="form-label">Harga</label>
    <input type="text" name="harga" class="form-control" id=""  value="<?php echo $product['harga'] ?>">
  </div>
  <div class="mb-3">
    <label for="stok" class="form-label">Stok</label>
    <input type="text" name="stok" class="form-control" id=""  value="<?php echo $product['stok'] ?>">
  </div>
  <div class="mb-3">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control"  value="<?php echo $produk['poto'] ?>">
    </div>

    <div class="mb-3">
    <label for="kategori" class="col-sm-2 col-form-label" >Kategori</label>
    <?php $kategori = $product['kategori']; ?>
    <select type="option" name="kategori" id="kategori" class="form-control" id="kategori">
            <option selected disabled>Pilih salah satu</option>
            <option <?php echo ($product == 'Action figure') ? "selected": "" ?>>Action Figure</option>
            <option <?php echo ($product == 'Nendoroid') ? "selected": "" ?>>Nendoroid</option>
            <option <?php echo ($product == 'manga') ? "selected": "" ?>>manga</option>
            <option <?php echo ($product == 'Keychain') ? "selected": "" ?>>keychain</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" name="deskripsi" class="form-control"  placeholder="deskripsi" value="<?php echo $product['deskripsi'] ?>">
  </div>
  
  
  <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>
</form>
</body>
</html>