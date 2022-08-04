<?php

require "../koneksi.php";

$nama_pembelian = htmlspecialchars(stripslashes($_POST['nama_pembelian']));
$total_pembelian = htmlspecialchars(stripslashes($_POST['total_pembelian']));
$diskon = htmlspecialchars(stripslashes($_POST['diskon']));
$uang_bayar = htmlspecialchars(stripslashes($_POST['uang_bayar']));
$uang_kembalian = htmlspecialchars(stripslashes($_POST['uang_kembalian']));

// Variabel untuk melakukan insert/memasukkan data ke tabel di database (MySQL)
$query = "INSERT INTO tb_pembelian VALUES('','$nama_pembelian','$total_pembelian','$diskon','$uang_bayar','$uang_kembalian', now())";
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
         text: 'Data pembelian berhasil ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/pembelian/data_pembelian';
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
         text: 'Data pembelian gagal ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/pembelian/tambah_pembelian';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh query INSERT sebelumnya
return mysqli_affected_rows($conn);

?>