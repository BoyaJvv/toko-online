<?php
 if(isset ($_GET['id'])) {
        // ambil data dari formulir
        $id = $_GET['id'];

        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $kategori = $_POST['kategori'];
        $deskripsi = $_POST['deskripsi'];

        if (!empty($foto = $_FILES['foto']['name'])) {
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp, '../img/' . $foto);

            $edit = mysqli_query($koneksi, "UPDATE product SET nama='$nama', harga='$harga', stok='$stok', kategori='$kategori', foto='$foto', deskripsi='$deskripsi' WHERE id='$id'");
        } else {
            $edit = mysqli_query($koneksi, "UPDATE product SET nama='$nama', harga='$harga', stok='$stok', kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'");
        }
        // buat query update


        {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    }


        ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Boyhobbyshopss</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
      .crop {
        object-fit: cover;
      }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" >
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
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
      <a class="navbar-brand" href="#">boyhobbyshop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" >Home</a>
          </li>
          <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" href="keranjang.php">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
          </svg>
          </li>
   
          <form class="d-flex" role="search">
          
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
           
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="profil.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            </a>

            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="keranjang.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
            </svg>
            </a>

        </form>
         
          
        </ul>        
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
     
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/bg2.jpg" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></img>
        <div class="container">
          <div class="carousel-caption ">
            <h1>Welcome To Boyhobbyshop</h1>
            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="row mt-5">
    <hr class="featurette-divider">
    <div class="container marketing">
  
      <!-- Three columns of text below the carousel -->
      <div class="container-fluid py-2">
      <div class="container text-center">
          <h3>Kategori Terlaris</h3>
          
          

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">Action Figure<span class="text-body-secondary"> </span></h2>
    <p class="lead">Actio Figure atau boneka aksi adalah figur berukuran kecil yang digunakan sebagai mainan atau barang koleksi.
       Figur karakter umumnya dirancang dalam pose tertentu. Figur karakter bisa terbuat dari plastik atau material lainnya. Karakternya sering diambil berdasarkan film, komik, permainan video atau acara televisi.</p>
  </div>
  <div class="col-md-5">
    <img src ="../img/yae.jpg"class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></img>
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading fw-normal lh-1">Manga<span class="text-body-secondary"></span></h2>
    <p class="lead">Manga adalah komik atau novel grafik yang dibuat di Jepang atau menggunakan bahasa Jepang, sesuai dengan gaya yang dikembangkan di sana pada akhir abad ke-19.
       Manga memiliki sejarah awal yang panjang dan kompleks dalam seni Jepang terdahulu.</p>
  </div>
  <div class="col-md-5 order-md-1">
    <img src="../img/komik.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></img>
  </div>
</div>


<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">Nendoroid<span class="text-body-secondary"> </span></h2>
    <p class="lead">Figur karakter atau boneka aksi adalah figur berukuran kecil yang digunakan sebagai mainan atau barang koleksi. Figur karakter umumnya dirancang dalam pose tertentu. Figur karakter bisa terbuat dari plastik atau material lainnya.
       Karakternya sering diambil berdasarkan film, komik, permainan video atau acara televisi.</p>
  </div>
  <div class="col-md-5">
    <img src ="../img/nendo2.jpg"class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></img>
  </div>
</div>

<hr class="featurette-divider">

    </div>
    </div>


    <!-- START THE FEATURETTES -->

    
    <div class="container-fluid py-2">
    <div class="container text-center">
    <div class="row mt-5">

    </div><!-- /.row -->
    <!-- baru -->

   <!-- daftar action figure-->
    <div class="action figure mt-3" id="action-figure">
      <div class="desk-cards mt-5 mb-1 text-center">
        <h2>Action Figure</h2>
        <p></p>
      </div>
      <div class="cards gap-5 mt-1 mb-5 d-flex align-items-center justify-content flex-wrap">
        <?php
        include("koneksi.php");

        $result = mysqli_query(
          $koneksi,
          "SELECT * from product WHERE kategori='Action Figure'"
        );
        while ($product = mysqli_fetch_array($result)){
          ?>
            <div class="card border-0" style="display: flex; align-items: center; width: 18rem; margin: 0 1rem; ">
            <div class="login-box p-4 shadow">
              <img src="../img/<?=$product['foto']?>" class=" card-img-top rounded float-start" style="width: 250px; height: auto" alt="">
               <!-- Product details-->
               <div class="card-body p-4">
                <p class="text-center"><b><?=  $product['nama'] ?></b></p>
                <p><?=  $product['harga'] ?> </p>
                <p><?=  $product['deskripsi'] ?> </p>
                <p>stok <?=  $product['stok'] ?> </p>

                <a class="nav-link active" aria-current="page" href="detail.php?aksi=edit&id=<?= $product['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                </div>
               </div>
            </div>
       
          <?php
          }
          ?>
          </div>
        </div>
        </div>

        <!-- Nendoroid -->
        <div class="container-fluid py-2">
    <div class="container text-center">
    <div class="row mt-5">

    </div>

    <div class="Nendoroid mt-3" id="Nendoroid">
      <div class="desk-cards mt-5 mb-1 text-center">
        <h2>Nendoroid</h2>
        <p></p>
      </div>
      <div class="cards gap-5 mt-1 mb-5 d-flex align-items-center justify-content flex-wrap">
        <?php
        include("koneksi.php");

        $result = mysqli_query(
          $koneksi,
          "SELECT * from product WHERE kategori='nendoroid'"
        );
        while ($product = mysqli_fetch_array($result)){
          ?>
            <div class="card border-0" style="display: flex; align-items: center; width: 20rem; margin: 2rem;">
            <div class="login-box p-4 shadow">
              <img src="../img/<?=$product['foto']?>" class="h-25% w-25px card-img-top  rounded float-start"  style="width: 250px; height: auto" alt="">
               <!-- Product details-->
               <div class="card-body p-4">
                <p class="text-center"><b><?=  $product['nama'] ?></b></p>
                <p><?=  $product['harga'] ?> </p>
                <p><?=  $product['deskripsi'] ?> </p>
                <p>stok <?=  $product['stok'] ?> </p>
                <a class="nav-link active" aria-current="page" href="detail.php?aksi=edit&id=<?= $product['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
              </div>
            </div>
        </div>
       
          <?php
          }
          ?>
          </div>
        </div>
        </div>

        <!-- manga -->
        <div class="container-fluid py-2">
    <div class="container text-center">
    <div class="row mt-5">

    </div>
    <div class="manga mt-3" id="manga">
      <div class="desk-cards mt-5 mb-1 text-center">
        <h2>Manga</h2>
        <p></p>
      </div>
      <div class="cards gap-5 mt-1 mb-5 d-flex align-items-center justify-content flex-wrap">
        <?php
        include("koneksi.php");

        $result = mysqli_query(
          $koneksi,
          "SELECT * from product WHERE kategori='manga'"
        );
        while ($product = mysqli_fetch_array($result)){
          ?>
            <div class="card border-0" style="display: flex; align-items: center; width: 20rem; margin: 2rem;">
            <div class="login-box p-4 shadow">
              <img src="../img/<?=$product['foto']?>" class="card-img-top rounded float-start"  style="width: 250px; height: auto" alt="">
               <!-- Product details-->
               <div class="card-body p-4">
                <p class="text-center"><b><?=  $product['nama'] ?></b></p>
                <p><?=  $product['harga'] ?> </p>
                <p><?=  $product['deskripsi'] ?> </p>
                <p>stok <?=  $product['stok'] ?> </p>
                <a class="nav-link active" aria-current="page" href="detail.php?aksi=edit&id=<?= $product['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                </div>
            </div>
        </div>

          <?php
          }
          ?>
          </div>
        </div>
        </div>
        
        <!-- daftar keychain-->
        <div class="container-fluid py-2">
    <div class="container text-center">
    <div class="row mt-5">

    </div>
    <div class="Keychain mt-3" id="Keychain">
      <div class="desk-cards mt-5 mb-1 text-center">
        <h2>Keychain</h2>
        <p></p>
      </div>
      <div class="cards gap-5 mt-1 mb-5 d-flex align-items-center justify-content flex-wrap">
        <?php
        include("koneksi.php");

        $result = mysqli_query(
          $koneksi,
          "SELECT * from product WHERE kategori='Keychain'"
        );
        while ($product = mysqli_fetch_array($result)){
          ?>
            <div class="card border-0" style="display: flex; align-items: center; width: 20rem; margin: 2rem;">
            <div class="login-box p-4 shadow">
              <img src="../img/<?=$product['foto']?>" class="card-img-top rounded float-start"  style="width: 250px; height: auto" alt="">
               <!-- Product details-->
               <div class="card-body p-4">
                <p class="text-center"><b><?=  $product['nama'] ?></b></p>
                <p><?=  $product['harga'] ?> </p>
                <p><?=  $product['deskripsi'] ?> </p>
                <p>stok <?=  $product['stok'] ?> </p>
                <a class="nav-link active" aria-current="page"href="detail.php?aksi=edit&id=<?= $product['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                </div>
        </div>

            </div>
       
          <?php
          }
          ?>
          </div>
        </div>
        </div>
     
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2024 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
        </main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>


    </body>
</html>
