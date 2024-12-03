<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['pelanggan'])) {
    header('Location: login.php');
    exit();
}

// Get customer details from session
$user = $_SESSION['pelanggan'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .navbar {
            border-bottom: 1px solid #eaeaea;
        }
        .profile-card {
            margin-top: 40px;
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card .card-header {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .profile-card .card-body {
            padding: 30px;
        }
        .profile-card .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid #343a40;
        }
        .profile-card .form-control-plaintext {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-outline-dark {
            border-color: #343a40;
            color: #343a40;
        }
        .btn-outline-dark:hover {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Boyhobbyshop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="keranjang.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                            </a>
                               
                        </ul>
                        <form class="d-flex">
                            <a href="profil.php" class="btn btn-outline-dark me-2">
                                <i class="fa-solid fa-user"></i> 
                            </a>
                            <button class="btn btn-outline-dark" type="submit" formaction="keranjang.php">
                                <i class="bi-cart-fill me-1"></i>
                                
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </form>
                    </div>
            </div>
        </nav>

        <div class="container">
            <div class="profile-card mx-auto" style="max-width: 600px;">
                <div class="card-header">
                <h2>Halo <?php echo $_SESSION['pelanggan']?> Selamat Datang Di Website Boyhobbyshop.com</h2>
            </div>
            <div class="card-body text-center">
                <h2> Profile Anda </h2>
                <img src="profile.jpg" alt="User Avatar" class="avatar">
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['pelanggan']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number:</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['hp']) ? htmlspecialchars($_SESSION['hp']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['alamat']) ? htmlspecialchars($_SESSION['alamat']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <a href="index.php" class="btn btn-primary">Back to Home</a>
                <a href="edit-profile.php" class="btn btn-primary">edit Profile</a>
                <!-- <a  href='profil.php?aksi=edit&id=" . $tb_user['id']. "' class='btn btn-primary btn-sm'>EDIT PROFIL</a> -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>