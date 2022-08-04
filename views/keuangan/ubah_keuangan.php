<?php

session_start();

// Jika tidak ada login, kembalikan kehalaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login");
    exit;
}

// require untuk menyertakan/memanggil file php lain ke dalam program/source code ubah_keuangan.php
require "../../controllers/koneksi.php";
require "../../controllers/fungsi_query.php";

// Mengambil id_keuangan pada url yang dikirimkan dari button ubah yang ada pada data_keuangan.php
$id_keuangan = $_GET['id_keuangan'];
$data = query("SELECT * FROM tb_keuangan WHERE id_keuangan = $id_keuangan")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSS Bootstrap-->
   <link rel="stylesheet" href="../../public/css/bootstrap.css">
   <!-- CSS Bootstrap Icons -->
   <link rel="stylesheet" href="../../public/css/bootstrap-icons.css">
   <!-- Custom Styles Navbar -->
   <link rel="stylesheet" href="../../public/css/navbar.css">
   <!-- Custom Styles Form -->
   <link rel="stylesheet" href="../../public/css/form.css">
   <!-- Icon -->
   <link rel="shortcun icon" href="../../public/img/icon.png">
   <!-- Title Page -->
   <title>Ubah Keuangan</title>
</head>
<body>
   <!-- Navbar (Navigasi Bar) -->
   <nav class="shadow">
      <a href="../home.php" class="logo">KonterCell</a>
      <div class="bi bi-list" id="menu-icon"></div>
      <ul class="navbar">
         <li><a href="../../index.php">Home</a></li>
         <li><a href="../axis/data_paket">Axis</a></li>
         <li><a href="../indosat/data_paket">Indosat</a></li>
         <li><a href="../smartfren/data_paket">Smartfren</a></li>
         <li><a href="../telkomsel/data_paket">Telkomsel</a></li>
         <li><a href="../tri/data_paket">Tri</a></li>
         <li><a href="../xl/data_paket">XL</a></li>
         <li><a href="../aksesoris/data_aksesoris">Aksesoris</a></li>
         <li><a href="../pembelian/data_pembelian">Pembelian</a></li>
         <li><a href="data_keuangan">Keuangan</a></li>
      </ul>
      <!-- Logout -->
      <div class="logout">
         <a href="../admin/logout.php">
            <i class="bi-person-circle"></i> <?= $_SESSION['username']; ?>
         </a>
      </div>
   </nav>
   
   <!-- Container -->
   <div class="container-lg">
      <div class="card" style="height: 565px;">
         <!-- Form ubah -->
         <form action="../../controllers/keuangan/proses_ubah" method="post" id="keuangan">
            <h4 class="mb-4 mt-4 text-center">Form Ubah Keuangan</h4>
            <div class="row ms-5 me-0">
               <label for="nama_pengisi" class="col-sm-5 col-form-label">Nama Pengisi</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-card-checklist"></i>
                     </span>
                     <input type="hidden" name="id_keuangan" value="<?= $data['id_keuangan']; ?>">
                     <!-- input nama pengisi -->
                     <input type="text" class="form-control" name="nama_pengisi" value="<?= $_SESSION['username']; ?>" readonly required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="pemasukan" class="col-sm-5 col-form-label">Pemasukan</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input total pemasukan -->
                     <input type="number" class="form-control" name="pemasukan" id="pemasukan" placeholder="Masukkan total pemasukan"
                     value="<?= $data['pemasukan']; ?>" min="0" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10)" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="pengeluaran" class="col-sm-5 col-form-label">Pengeluaran</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input Pengeluaran -->
                     <input type="number" class="form-control" name="pengeluaran" id="pengeluaran" placeholder="Masukkan total pengeluaran"
                     value="<?= $data['pengeluaran']; ?>" min="0" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10)" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-3">
               <label for="keuntungan" class="col-sm-5 col-form-label">Keuntungan</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input keuntungan -->
                     <input type="number" class="form-control" name="keuntungan" id="keuntungan" placeholder="Keuntungan yang didapatkan"
                     value="<?= $data['keuntungan']; ?>" min="0" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10)" readonly required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-2">
               <div class="btn-inline">
                  <a href="data_keuangan" class="btn btn-md btn-secondary me-1">Batal</a>
                  <button type="submit" name="simpan" class="btn btn-md btn-primary btn-outline-info text-light">
                     Ubah Keuangan
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div>
   
   <!-- Script Bootstrap -->
   <script src="../../public/js/library/bootstrap.js" type="module"></script>
   <!-- Script Navbar -->
   <script src="../../public/js/navbar.js"></script>
   <!-- Script limit input pada form-->
   <script src="../../public/js/limit_input.js"></script>
   <!-- Script Jquery -->
   <script src="../../public/js/library/jquery-3.6.0.min.js"></script>
   <!-- Script hitung otomatis -->
   <script src="../../public/js/hitung/pemasukan.js"></script>
</body>
</html>