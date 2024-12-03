<?php
include 'koneksi.php';
session_start();
if(!isset($_SESSION['user'])){
  header('Location: login-user.php');
}

$id_user = $_SESSION['user'];

if(isset($_POST["Add"])) {
  if(isset($_SESSION["cart"])) {
    $item_array_id = array_column($_SESSION["cart"], "id");
    if (!in_array($_GET["id"], $item_array_id)) {
        $count = count($_SESSION["cart"]);
        $item_array = array(
            'id' => $_GET["id"],
            'nama' => $_POST["hidden_nama"],
            'harga' => $_POST["hidden_harga"],
            'foto' => $_POST["hidden_foto"],
            'jumlah' => $_POST["jumlah"],
            'stok' => $_POST["hidden_stok"]
        );
        $_SESSION["cart"] [$count] = $item_array;

        echo '<script>alert("Produk berhasil dimasukan ke keranjang")</script>';
        echo '<script>window.location="keranjang.php"</script>';
    } else {
        echo '<script>alert("Produk sudah ada di keranjang")</script>';
        echo '<script>window.location="products.php"</script>';
    }
  } else {
    $item_array = array(
        'id' => $_GET["id"],
        'nama' => $_POST["hidden_nama"],
        'harga' => $_POST["hidden_harga"],
        'foto' => $_POST["hidden_foto"],
        'jumlah' => $_POST["jumlah"],
        'stok' => $_POST["hidden_stok"]
    );
    $_SESSION["cart"] [0] = $item_array;

    echo '<script>alert("Produk berhasil dimasukan ke keranjang")</script>';
    echo '<script>window.location="keranjang.php"</script>';
  }


}


if (isset($_GET["aksi"])) {
    if ($_GET["aksi"] == "hapus") {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value["id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$key]);
                echo "<script>alert('Produk berhasil dihapus.');</script>";
                echo "<script>window.location='keranjang.php';</script>";
            }
        }
    } elseif ($_GET["aksi"] == "beli") {
        $total = 0;
        $jumlah_barang = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
            $total += $value["jumlah"] * $value["harga"];
            $jumlah_barang = $jumlah_barang + $value["jumlah"];
        }
        $query = mysqli_query($koneksi, "INSERT INTO transaksi(tanggal,id_pelanggan,total) VALUE ('" . date("Y-m-d") . "','$id_user','$total')");
        $id_transaksi = mysqli_insert_id($koneksi);

        // penyimpanan data produk di tabel detail
        foreach ($_SESSION["cart"] as $key => $value) {
            $id_produk = $value['id'];
            $jumlah = $value['jumlah'];
            $sql = "INSERT INTO view(id_transaksi,id_produk,jumlah) VALUES ('$id_transaksi', '$id_produk', '$jumlah')";
            $res = mysqli_query($koneksi, $sql);
        }

        if ($res > 0) {
            unset($_SESSION["cart"]);
            echo "<script>alert('Terima kasih sudah berbelanja!');</script>";
            echo "<script>window.location='cetak.php?id=" . $id_transaksi . "';</script>";
        }
    }
}



?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Keranjang Anda</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="my-cart.css">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      body {
  font-family: 'Times New Roman', Times, serif;
  padding: 40px;
}
.header {
  width: 100;
  height: 52px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: #000000;
  padding: 10px;
}

.logo {
  display: flex;
  align-items: center;
  font-family: 'Times New Roman', Times, serif;
  font-size: 27px;
  font-weight: bold;
}

.logo img {
  height: 40px;
  margin-right: 10px;
  margin-left: 40px;
  /* border: 1px solid #fff; */
}

.logo p {
  height: 40px;
  margin-top: 20px;
  margin-right: 600px;
  color: #fff;
  /* border: 1px solid #fff; */
}

button {
  background: transparent;
  border: 0;
  padding: 0;
  cursor: pointer;
}

.sidebar {
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  width: 72px;
  height: 71px;
  transition: width 0.4s;
}

body.open .sidebar {
  width: 300px;
  height: 100vh;
}

.sidebar-inner {
  position: absolute;
  top: 0;
  left: 0;
  width: 300px;
  height: inherit;
  display: flex;
  flex-direction: column;
  padding-bottom: 10px;
  height: 102vh;
}

.sidebar-header {
  display: flex;
  align-items: center;
  height: 72px;
  padding: 0 1.25rem 0 0;
}

.sidebar-header button {
  display: flex;
  align-items: center;
  height: 72px;
  width: 72px;
  font-family: "Poppins";
  font-size: 16px;
  font-weight: 200;
  letter-spacing: 2px;
  line-height: 1;
  /* border: 1px solid #ffff; */
}

.sidebar-header button > i {
  align-items: center;
  margin-left: 28px;
}

.sidebar-header button > a {
  color: #ffffff;
  opacity: 0;
  transition: 0.3s;
  text-decoration: none;
}

body.open .sidebar-header button>a {
  opacity: 1;
  animation: appear 0.3s both;
}

/* .sidebar-logo {
  height: 20px;
  opacity: 0;
  transition: 0.3s;
}

body.open .sidebar-logo {
  opacity: 1;
} */

.sidebar-nav {
  padding-top: 10px;
  flex: 1 1 auto;
  background-color: var(--bs-secondary-color);
}

.sidebar-nav button {
  display: flex;
  gap: 25px;
  align-items: center;
  height: 50px;
  width: 72px;
  font-family: "Poppins";
  font-size: 16px;
  font-weight: 200;
  letter-spacing: 2px;
  line-height: 1;
  padding: 0 25px;
  /* border: 1px solid #ffff; */
}

.sidebar-nav button > img {
  width: 24px;
  height: 24px;
}

.sidebar-nav button > a {
  color: #000000;
  opacity: 0;
  transition: 0.3s;
  text-decoration: none;
}

body.open .sidebar-nav button>a {
  opacity: 1;
  animation: appear 0.3s both;
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: flex;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}
.fa-duotome {
  size: 20px;
}

.img-sidebar {
  width: 40px;
  height:auto;
  /* border: 1px solid #fff; */
}

.d-flex > input {
  width: 200px;
  height: 32px;
  margin-top: 5px;
}

.d-flex > button {
  width: 80px;  
  height: 32px;
  margin-top: 5px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.cart {
  background-color: #ffffff;
  padding: 20px;
  margin-top: 50px;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  width: 1120px;
}

.cart h2 {
  margin-top: 0;
  text-align: center;
  font-size: 24px;
  color: #333;
  border-bottom: 1px solid #eeeeee;
  padding-bottom: 15px;
}

.item-price {
  font-size: 16px;
  font-weight: bold;
  color: #ff5722;
  margin-right: 10px;
}

.item-original-price {
  font-size: 14px;
  color: #999;
  text-decoration: line-through;
}

.checkout-section {
  margin-top: 20px;
}

.select-all {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.select-all-checkbox {
  margin-right: 10px;
}

.checkout-details {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.total {
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

.checkout-btn {
  background-color: #ff5722;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.checkout-btn:hover {
  background-color: #e64a19;
  transform: translateY(-2px);
}

.item-count {
  background-color: #ffffff;
  color: #ff5722;
  padding: 5px 10px;
  border-radius: 15px;
  margin-left: 10px;
  font-size: 14px;
  font-weight: 600;
}
    </style>

    
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    <header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Boyhobbyshop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="K-SHOP.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="products.php">Products</a>
          </li>
        </ul>
        <div class="icon">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
           <li class="nav-item">
            <a class="nav-link active" aria-disabled="true" href="my-cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-disabled="true" href="profil-pelanggan.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></a>
          </li>
    </div>
      </div>
    </div>
  </nav>
</header>



<div class="cart">
<h2>Keranjang</h2>
<div class="text-center">

      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
          <tr>
              <th scope="col">Produk</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php
        if (!empty($_SESSION["cart"])){
            $total = 0;
            foreach ($_SESSION["cart"] as $key => $value){
        ?>
        <tr>
             <td>
                <img src="../img/<?= $value["foto"] ?>" height="100px"><?= $value["nama"] ?>
             </td>
             <td><?= $value["jumlah"] ?></td>
             <td>Rp <?php echo number_format($value["harga"]) ?></td>
             <td>Rp <?php echo number_format($value["jumlah"] * $value["harga"], 2); ?> </td>
             <td><a href="keranjang.php?aksi=hapus&id=<?= $value["id"]; ?>"><span class="btn btn-danger">Hapus</span></td>
    
            </tr>

    <?php
   $total = $total + ($value["jumlah"] * $value["harga"]);
            }
            ?>
            <tr>
              <td collspam="3" align="right">Grand Total</td>
              <th align="right">Rp <?php echo number_format($total, 2); ?></th>
              <td>
                <a href="keranjang.php?aksi=beli"><span class="btn btn-outline-dark">Beli</span></a>
          </td>
          </tr>
          <?php
          }
?>
          </tbody>
        </table>
      </div>