<?php

require "../koneksi.php";

$id_aksesoris = $_POST['id_aksesoris'];
$nama_aksesoris = htmlspecialchars(stripslashes($_POST['nama_aksesoris']));
$jenis_aksesoris = htmlspecialchars(stripslashes($_POST['jenis_aksesoris']));
$stok = htmlspecialchars(stripslashes($_POST['stok']));
$harga_asli = htmlspecialchars(stripslashes($_POST['harga_asli']));
$harga_jual = htmlspecialchars(stripslashes($_POST['harga_jual']));

// Variabel untuk melakukan perubahan/perbarui data pada tabel di database (MySQL)
$query = "UPDATE tb_aksesoris SET
         nama_aksesoris = '$nama_aksesoris',
         jenis_aksesoris = '$jenis_aksesoris',
         stok = '$stok',
         harga_asli = '$harga_asli',
         harga_jual = '$harga_jual'
         WHERE id_aksesoris = $id_aksesoris
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
         text: 'Data aksesoris berhasil diubah!'
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
         text: 'Data aksesoris gagal diubah!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/aksesoris/data_aksesoris';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh UPDATE sebelumnya
return mysqli_affected_rows($conn);

?>

