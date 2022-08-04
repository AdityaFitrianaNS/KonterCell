<?php

require "../koneksi.php";

$id_pembelian = $_POST['id_pembelian'];
$nama_pembelian = htmlspecialchars(stripslashes($_POST['nama_pembelian']));
$total_pembelian = htmlspecialchars(stripslashes($_POST['total_pembelian']));
$diskon = htmlspecialchars(stripslashes($_POST['diskon']));
$uang_bayar = htmlspecialchars(stripslashes($_POST['uang_bayar']));
$uang_kembalian = htmlspecialchars(stripslashes($_POST['uang_kembalian']));

// Variabel untuk melakukan perubahan/perbarui data pada tabel di database (MySQL)
$query = "UPDATE tb_pembelian SET
         nama_pembelian = '$nama_pembelian',
         total_pembelian = '$total_pembelian',
         diskon = '$diskon',
         uang_bayar = '$uang_bayar',
         uang_kembalian = '$uang_kembalian'
         WHERE id_pembelian = $id_pembelian
         ";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

?>

<!-- Script SweetAlert2 -->
<script src="../../public/js/library/sweetalert2.all.min.js"></script>
<body style="font-family: poppins;"></body>

<?php
// Cek apakah data berhasil diubah, 
// jika $query lebih dari 0 artinya data berhasil diubah
if ($query > 0) {
?>
   <!-- alert berhasil -->
   <script>
      Swal.fire({
         icon: 'success',
         title: 'Berhasil!',
         text: 'Data pembelian berhasil diubah!'
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
         text: 'Data pembelian gagal diubah!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/pembelian/data_pembelian';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh UPDATE sebelumnya
return mysqli_affected_rows($conn);

?>

