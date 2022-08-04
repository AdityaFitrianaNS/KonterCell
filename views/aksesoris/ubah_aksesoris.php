<?php

session_start();

// Jika tidak ada login, kembalikan kehalaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login");
    exit;
}

// require untuk menyertakan/memanggil file php lain ke dalam program/source code ubah_aksesoris.php
require "../../controllers/koneksi.php";
require "../../controllers/fungsi_query.php";

// Mengambil id_aksesoris pada url yang dikirimkan dari button ubah yang ada pada data_aksesoris.php
$id_aksesoris = $_GET['id_aksesoris'];
$data = query("SELECT * FROM tb_aksesoris WHERE id_aksesoris = $id_aksesoris")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CDN CSS Select2-->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
   <title>Ubah Paket</title>
</head>

<body>
   <!-- Navbar (Navigasi Bar) -->
   <nav class="shadow">
      <a href="../home.php" class="logo">KonterCell</a>
      <div class="bx bx-menu" id="menu-icon"></div>
      <ul class="navbar">
         <li><a href="../../index.php">Home</a></li>
         <li><a href="data_paket">Axis</a></li>
         <li><a href="../indosat/data_paket">Indosat</a></li>
         <li><a href="../smartfren/data_paket">Smartfren</a></li>
         <li><a href="../telkomsel/data_paket">Telkomsel</a></li>
         <li><a href="../tri/data_paket">Tri</a></li>
         <li><a href="../xl/data_paket">XL</a></li>
         <li><a href="data_aksesoris">Aksesoris</a></li>
         <li><a href="../pembelian/data_pembelian">Pembelian</a></li>
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
         <form action="../../controllers/aksesoris/proses_ubah.php" method="post">
            <h4 class="mb-4 mt-4 text-center ">Form Ubah Aksesoris HP</h4>
            <div class="row ms-5 me-0">
               <label for="nama_aksesoris" class="col-sm-5 col-form-label">Nama Paket</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-info-circle"></i>
                     </span>
                     <!-- input hidden -->
                     <input type="hidden" name="id_aksesoris" value="<?= $data['id_aksesoris']; ?>">
                     <!-- input nama aksesoris-->
                     <select class="form-select" name="nama_aksesoris">
                        <option selected value="<?= $data['nama_aksesoris']; ?>"><?= $data['nama_aksesoris']; ?></option>
                        <option disabled>Pilih nama aksesoris</option>
                        <option value="Earphone">Earphone</option>
                        <option value="USB Card SD">USB Card SD</option>
                        <option value="Micro SD">Micro SD</option>
                        <option value="Card SD">Card SD</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="jenis_aksesoris" class="col-sm-5 col-form-label">Jenis Aksesoris</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-card-checklist"></i>
                     </span>
                     <!-- input jenis aksesoris -->
                     <select class="form-select" name="jenis_aksesoris" required>
                        <option selected value="<?= $data['jenis_aksesoris']; ?>"><?= $data['jenis_aksesoris']; ?></option>
                        <option disabled>Pilih Jenis Aksesoris</option>
                        <option value="Earphone">Earphone</option>
                        <option value="USB">USB</option>
                        <option value="Stand HP">Stand HP</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="stok" class="col-sm-5 col-form-label">Stok</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-box-seam"></i>
                     </span>
                     <!-- input stok aksesoris -->
                     <input type="number" class="form-control" name="stok" placeholder="Masukkan jumlah stok aksesoris"
                     value="<?= $data['stok']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="harga_asli" class="col-sm-5 col-form-label">Harga Asli</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input harga asli -->
                     <input type="number" class="form-control" name="harga_asli" placeholder="Masukkan harga asli"
                     value="<?= $data['harga_asli']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-3">
               <label for="harga_jual" class="col-sm-5 col-form-label">Harga Jual</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                     </span>
                     <!-- input harga jual -->
                     <input type="number" class="form-control" name="harga_jual" placeholder="Masukkan harga jual"
                     value="<?= $data['harga_jual']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-2">
               <div class="btn-inline">
                  <a href="data_paket" class="btn btn-md btn-secondary me-1">Batal</a>
                  <button type="submit" name="simpan" class="btn btn-md btn-primary btn-outline-info text-light">
                     Ubah Paket
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
   <!-- CDN Select2 -->
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#nama_paket').select2();
      });
   </script>
</body>
</html>