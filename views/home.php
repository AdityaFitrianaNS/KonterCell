<?php

session_start();

// Jika tidak ada login, kembalikan kehalaman login
if (!isset($_SESSION["login"])) {
    header("Location: ./admin/login");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSS Bootstrap-->
   <link rel="stylesheet" href="../public/css/bootstrap.css">
   <!-- CSS Bootstrap Icons -->
   <link rel="stylesheet" href="../public/css/bootstrap-icons.css">
   <!-- Custom Styles Navbar -->
   <link rel="stylesheet" href="../public/css/navbar.css">
   <!-- Custom Styles Home -->
   <link rel="stylesheet" href="../public/css/home.css">
   <!-- Icon -->
   <link rel="shortcun icon" href="../public/img/icon.png">
   <!-- Title Page -->
   <title>Home</title>
</head>
<body>
   <!-- Navbar (Navigasi Bar) -->
   <nav class="shadow">
      <a href="home" class="logo">KonterCell</a>
      <div class="bi bi-list" id="menu-icon"></div>
      <ul class="navbar">
         <li><a href="home">Home</a></li>
         <li><a href="./axis/data_paket">Axis</a></li>
         <li><a href="./indosat/data_paket">Indosat</a></li>
         <li><a href="./smartfren/data_paket">Smartfren</a></li>
         <li><a href="./telkomsel/data_paket">Telkomsel</a></li>
         <li><a href="./tri/data_paket">Tri</a></li>
         <li><a href="./xl/data_paket">XL</a></li>
         <li><a href="./aksesoris/data_aksesoris">Aksesoris</a></li>
         <li><a href="./pembelian/data_pembelian">Pembelian</a></li>
         <li><a href="./keuangan/data_keuangan">Keuangan</a></li>
      </ul>
      <!-- Logout -->
      <div class="logout">
         <a href="./admin/logout.php">
            <i class="bi-person-circle"></i> <?= $_SESSION['username']; ?>
         </a>
      </div>
   </nav>

   <!-- about section starts -->
   <section class="about section-padding" id="about">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-header text-center pb-5">
                  <h2 class="judul">Tentang Website</h2>
                  <p class="text-header">Deskripsi lainnya</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
               <div class="about-img ms-5">
                  <img src="../public/img/icon2.png" alt="img" class="img-fluid rounded-circle">
               </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12">
               <div class="about-text">
                  <h2 class="sub-judul">KonterCell</h2>
                  <p class="description-about" style="text-align: justify;">
                     Website ini digunakan untuk penjualan bagi pemilik usaha konter pulsa. Fitur yang tersedia bisa
                     digunakan untuk
                     menambah, mengubah, menghapus, dan melakukan pencarian di masing-masing halaman. Semua data yang
                     dikirim akan tersimpan pada database.
                     Halaman login untuk admin (pemilik usaha), sehingga pengguna biasa tidak bisa megakses isi website
                     pemilik usaha.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Script Bootstrap -->
   <script src="../../public/js/library/bootstrap.js" type="module"></script>
   <!-- Script navbar -->
   <script src="../public/js/navbar.js"></script>
</body>
</html>