<?php

require "../koneksi.php";

$nama_paket = htmlspecialchars(stripslashes($_POST['nama_paket']));
$jenis_paket = htmlspecialchars(stripslashes($_POST['jenis_paket']));
$masa_aktif = htmlspecialchars(stripslashes($_POST['masa_aktif']));
$harga_asli = htmlspecialchars(stripslashes($_POST['harga_asli']));
$harga_jual = htmlspecialchars(stripslashes($_POST['harga_jual']));

// Variabel untuk melakukan insert/memasukkan data ke tabel di database (MySQL)
$query = "INSERT INTO tb_indosat VALUES('','$nama_paket','$jenis_paket','$masa_aktif','$harga_asli','$harga_jual', now())";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

?>

<!-- Script SweetAlert2 -->
<script src="../../public/js/library/sweetalert2.all.min.js"></script>
<body style="font-family: poppins;"></body>

<?php
// Cek apakah data berhasil disimpan, 
// jika $query lebih dari 0 artinya data berhasil disimpan
if ($query > 0) {
?>
   <!-- alert berhasil -->
   <script>
      Swal.fire({
         icon: 'success',
         title: 'Berhasil!',
         text: 'Paket internet berhasil ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/indosat/data_paket';
         }
      })
   </script>
<?php
} else {
?>
   <!-- alert gagal -->
   <script>
      Swal.fire({
         icon: 'error',
         title: 'Gagal',
         text: 'Paket internet gagal ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/indosat/tambah_paket';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh query INSERT sebelumnya
return mysqli_affected_rows($conn);

?>