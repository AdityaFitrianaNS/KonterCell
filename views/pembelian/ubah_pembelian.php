<?php

session_start();

// Jika tidak ada login, kembalikan kehalaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login");
    exit;
}

// require untuk menyertakan/memanggil file php lain ke dalam program/source code ubah_pembelian.php
require "../../controllers/koneksi.php";
require "../../controllers/fungsi_query.php";

// Mengambil id_pembelian pada url yang dikirimkan dari button ubah yang ada pada data_pembelian.php
$id_pembelian = $_GET['id_pembelian'];
$data = query("SELECT * FROM tb_pembelian WHERE id_pembelian = $id_pembelian")[0];

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
   <title>Ubah Pembeli</title>
</head>

<body>
   <!-- Navbar (Navigasi Bar) -->
   <nav class="shadow">
      <a href="../home" class="logo">KonterCell</a>
      <div class="bx bx-menu" id="menu-icon"></div>
      <ul class="navbar">
         <li><a href="../../index.php">Home</a></li>
         <li><a href="data_paket">Axis</a></li>
         <li><a href="../indosat/data_paket">Indosat</a></li>
         <li><a href="../smartfren/data_paket">Smartfren</a></li>
         <li><a href="../telkomsel/data_paket">Telkomsel</a></li>
         <li><a href="../tri/data_paket">Tri</a></li>
         <li><a href="../xl/data_paket">XL</a></li>
         <li><a href="../aksesoris/data_aksesoris_hp">Aksesoris</a></li>
         <li><a href="data_pembelian">Pembelian</a></li>
         <li><a href="../keuangan/data_keuangan">Keuangan</a></li>
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
      <div class="card">
         <!-- Form ubah -->
         <form action="../../controllers/pembelian/proses_ubah" method="post" id="pembelian">
            <h4 class="mb-4 mt-4 text-center">Form Ubah Pembeli</h4>
            <div class="row ms-5 me-0">
               <label for="nama_pembelian" class="col-sm-5 col-form-label">Nama Pembelian</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-info-circle"></i>
                     </span>
                     <input type="hidden" name="id_pembelian" value="<?= $data['id_pembelian']; ?>">
                     <!-- input nama pembelian -->
                     <input type="text" class="form-control" name="nama_pembelian" placeholder="Masukkan nama pembelian"
                     maxlength="50" value="<?= $data['id_pembelian']; ?>">
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="total_pembelian" class="col-sm-5 col-form-label">Total Pembelian</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input total pembelian -->
                     <input type="number" class="form-control" name="total_pembelian" id="total_pembelian" placeholder="Masukkan total pembelian"
                     value="<?= $data['total_pembelian']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" onchange="hitung_diskon()" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="diskon" class="col-sm-5 col-form-label">Diskon</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input potongan (diskon) -->
                     <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Potongan yang didapat"
                     value="<?= $data['diskon']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" readonly required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="uang_bayar" class="col-sm-5 col-form-label">Uang Bayar</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input uang bayar -->
                     <input type="number" class="form-control" name="uang_bayar" id="uang_bayar" placeholder="Masukkan uang yang dibayar"
                     value="<?= $data['uang_bayar']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-3">
               <label for="uang_kembalian" class="col-sm-5 col-form-label">Uang Kembalian</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input uang kembalian -->
                     <input type="number" class="form-control" name="uang_kembalian" id="uang_kembalian" placeholder="Uang kembalian"
                     value="<?= $data['uang_kembalian']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" readonly required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-2">
               <div class="btn-inline">
                  <a href="data_pembelian" class="btn btn-md btn-secondary me-1">Batal</a>
                  <button type="submit" name="simpan" class="btn btn-md btn-primary btn-outline-info text-light">
                     Ubah Pembelian
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
   <script src="../../public/js/hitung/pembelian.js"></script>
</body>
</html>