<?php

require "../koneksi.php";

$nama_aksesoris = htmlspecialchars(stripslashes($_POST['nama_aksesoris']));
$jenis_aksesoris = htmlspecialchars(stripslashes($_POST['jenis_aksesoris']));
$stok = htmlspecialchars(stripslashes($_POST['stok']));
$harga_asli = htmlspecialchars(stripslashes($_POST['harga_asli']));
$harga_jual = htmlspecialchars(stripslashes($_POST['harga_jual']));

// Variabel untuk melakukan insert/memasukkan data ke tabel di database (MySQL)
$query = "INSERT INTO tb_aksesoris VALUES('','$nama_aksesoris','$jenis_aksesoris','$stok','$harga_asli','$harga_jual', now())";
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
         text: 'Data aksesoris berhasil ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/aksesoris/data_aksesoris';
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
         text: 'Data aksesoris gagal ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/aksesoris/tambah_aksesoris';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh query INSERT sebelumnya
return mysqli_affected_rows($conn);

?>