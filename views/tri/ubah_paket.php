<?php

session_start();

// Jika tidak ada login, kembalikan kehalaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login");
    exit;
}

// require untuk menyertakan/memanggil file php lain ke dalam program/source code ubah_paket.php
require "../../controllers/koneksi.php";
require "../../controllers/fungsi_query.php";

// Mengambil id_tri pada url yang dikirimkan dari button ubah yang ada pada data_paket.php
$id_tri = $_GET['id_tri'];
$data = query("SELECT * FROM tb_tri WHERE id_tri = $id_tri")[0];

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
   <title>Ubah Paket Tri</title>
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
         <li><a href="data_paket">Tri</a></li>
         <li><a href="../xl/data_paket">XL</a></li>
         <li><a href="../aksesoris/data_aksesoris">Aksesoris</a></li>
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
         <form action="../../controllers/tri/proses_ubah.php" method="post">
            <h4 class="mb-4 mt-4 text-center ">Form Ubah Paket Tri</h4>
            <div class="row ms-5 me-0">
               <label for="nama_paket" class="col-sm-5 col-form-label">Nama Paket</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-info-circle"></i>
                     </span>
                     <!-- input hidden -->
                     <input type="hidden" name="id_tri" value="<?= $data['id_tri'] ;?>">
                     <!-- input nama paket internet -->
                     <select class="form-select" name="nama_paket" id="nama_paket" required >
                        <option selected value="<?= $data['nama_paket']; ?>"><?= $data['nama_paket']; ?></option>
                        <option disabled>Paket Happy</option>
                        <option value="Happy 3 GB">Happy 3 GB</option>
                        <option value="Happy 3.5 GB">Happy 3.5 GB</option>
                        <option value="Happy 6 GB">Happy 6 GB</option>
                        <option value="Happy 9 GB">Happy 9 GB</option>
                        <option value="Happy 12 GB">Happy 12 GB</option>
                        <option value="Happy 18 GB">Happy 18 GB</option>
                        <option disabled>Paket AON</option>
                        <option value="AON 1.5 GB">AON 1.5 GB</option>
                        <option value="AON 1.5 + 1 GB">AON 1.5 + 1 GB</option>
                        <option value="AON 2 GB + 2 GB">AON 2 GB + 2 GB</option>
                        <option value="AON 3 GB + 3 GB">AON 3 GB + 3 GB</option>
                        <option value="AON 6 GB + 6 GB">AON 6 GB + 6 GB</option>
                        <option value="AON 8 GB + 8 GB">AON 8 GB + 8 GB</option>
                        <option value="AON 6 GB + Unlimited">AON 6 GB + Unlimited</option>
                        <option value="AON 10 GB + Unlimited">AON 10 GB + Unlimited</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="jenis_paket" class="col-sm-5 col-form-label">Jenis Paket</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-card-checklist"></i>
                     </span>
                     <!-- input jenis paket internet -->
                     <select class="form-select" name="jenis_paket" id="jenis_paket" required >
                        <option selected value="<?= $data['jenis_paket']; ?>"><?= $data['jenis_paket']; ?></option>
                        <option disabled>Jenis Paket</option>
                        <option value="Voucher">Voucher</option>
                        <option value="Elektrik">Elektrik</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="masa_aktif" class="col-sm-5 col-form-label">Masa Aktif</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-clock-history"></i>
                     </span>
                     <!-- input masa aktif paket internet -->
                     <select class="form-select" name="masa_aktif" required>
                        <option selected>Pilih Masa Aktif</option>
                        <option value="3 Hari">3 Hari</option>
                        <option value="5 Hari">5 Hari</option>
                        <option value="7 Hari">7 Hari</option>
                        <option value="30 Hari">30 Hari</option>
                        <option value="Mengikuti masa aktif kartu">Mengikuti masa aktif kartu</option>
                     </select>
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
                     <input type="number" class="form-control" name="harga_asli" id="harga_asli" placeholder="Masukkan harga asli"
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
                     <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan harga jual"
                     value="<?= $data['harga_jual']; ?>" min="0" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6)" required >
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