<?php

session_start();

// Jika tidak ada login, kembalikan kehalaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login");
    exit;
}

// require untuk menyertakan/memanggil file php lain ke dalam program/source code data_paket.php
require "../../controllers/koneksi.php";
require "../../controllers/fungsi_query.php";
require "../../controllers/fungsi_cari.php";

// Konfigurasi untuk Pagination
$jumlah_per_halaman = 5;
$jumlah_data = count(query("SELECT * FROM tb_smartfren"));
$jumlah_halaman = ceil($jumlah_data / $jumlah_per_halaman);
$halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awal_data = ($jumlah_per_halaman * $halaman_aktif) - $jumlah_per_halaman;

// Variabel $query untuk menampilkan semua data dari tabel axis yang ada pada database
// Urutkan berdasarkan huruf(abjad) depan nama paket dari yang terkecil
// Lalu, batasi jumlah data yang ditampilkan maksimal 5.
$query = query("SELECT * FROM tb_smartfren ORDER BY nama_paket ASC LIMIT $awal_data, $jumlah_per_halaman");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    // maka jalankan fungsi cari_smartfren
    $query = cari_smartfren($_POST["keyword"]);
}

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
    <!-- Icon -->
    <link rel="shortcun icon" href="../../public/img/icon.png">
    <!-- Title Page -->
    <title>Paket Smartfren</title>
</head>
<body>
    <!-- Navbar (Navigasi Bar) -->
    <nav class="shadow">
        <a href="../home.php" class="logo">KonterCell</a>
        <div class="bi bi-list" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="../home">Home</a></li>
            <li><a href="../axis/data_paket">Axis</a></li>
            <li><a href="../indosat/data_paket">Indosat</a></li>
            <li><a href="data_paket">Smartfren</a></li>
            <li><a href="../telkomsel/data_paket">Telkomsel</a></li>
            <li><a href="../tri/data_paket">Tri</a></li>
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
    <div class="container-md">
        <h2 class="judul" style="text-align: center;">Data Paket Smartfren</h2>
        <br>
        <!-- Form & button cari -->
        <div class="mt-4 offset-sm-0 col-sm-3">
            <form action="" method="POST" class="d-flex">
                <input class="form-control form-search me-2" type="text" name="keyword" placeholder="Masukkan pencarian" autocomplete="off">
                <button class="btn btn-primary btn-outline-info text-white" type="submit" name="cari">
                    Search
                </button>
            </form>
            <!-- Button tambah paket -->
            <div class="py-2">
                <a href="tambah_paket" class="btn btn-md btn-primary btn-outline-info text-white">
                    <i class="bi bi-plus-circle">
                        Tambah Paket
                    </i>
                </a>
            </div>
        </div>

        <!-- Tabel Paket Internet-->
        <div class="table-responsive">
            <table class="table table-info table-striped table-bordered border-primary" style="text-align: center; vertical-align: middle;">
                <tr>
                    <th>No.</th>
                    <th>Nama Paket</th>
                    <th>Jenis Paket</th>
                    <th>Masa Aktif</th>
                    <th>Harga Asli</th>
                    <th>Harga Jual</th>
                    <th>Tanggal Perbarui</th>
                    <th>Fitur</th>
                </tr>
                <?php $i = $awal_data + 1; ?>
                <?php 
                    foreach ($query as $row) :
                    $tanggal = $row['tanggal_perbarui'];
                    $tanggal_perbarui = new DateTime($tanggal);
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['nama_paket']; ?></td>
                        <td><?= $row['jenis_paket']; ?></td>
                        <td><?= $row['masa_aktif']; ?></td>
                        <td>Rp. <?= $row['harga_asli']; ?></td>
                        <td>Rp. <?= $row['harga_jual']; ?></td>
                        <td><?= $tanggal_perbarui->format('d-m-Y'); ?></td>
                        <td>
                            <a href="ubah_paket?id_smartfren=<?= $row['id_smartfren']; ?>" class="btn btn-sm btn-primary btn-outline-info btn-table">
                                <i class="bi bi-pencil-square text-white"> Ubah</i>
                            </a>
                            <a href="hapus_paket?id_smartfren=<?= $row["id_smartfren"]; ?>" class="btn btn-sm btn-primary btn-outline-info btn-table" id="btn-hapus">
                                <i class="bi bi-lg bi-trash text-white" style="font-style:normal"> Hapus</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- Navigasi Pagination -->
        <div class="pagination">
            <ul class="pagination justify-content-start">
                <?php if ($halaman_aktif > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halaman_aktif - 1 ?>">Kembali</a>
                    </li>
                <?php endif; ?>
                <!--  -->
                <?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
                    <?php if ($i == $halaman_aktif) : ?>
                        <!-- Halaman yang sama tidak perlu di isi hrefnya -->
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $i; ?>" style="font-weight: bold; color: blue;"><?= $i; ?></a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>
                <!--  -->
                <?php if ($halaman_aktif < $jumlah_halaman) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halaman_aktif + 1 ?>">Berikutnya</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="../../public/js/library/bootstrap.js" type="module"></script>
    <!-- Script Navbar -->
    <script src="../../public/js/navbar.js"></script>
    <!-- Script SweetAlert2 -->
    <script src="../../public/js/library/sweetalert2.all.min.js"></script>
    <!-- Script Jquery -->
    <script src="../../public/js/library/jquery-3.6.0.min.js"></script>
    <!-- Script Jquery Hapus -->
    <script src="../../public/js/jquery_hapus.js"></script>
</body>
</html>