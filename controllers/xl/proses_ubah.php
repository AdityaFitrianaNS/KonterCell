<?php

require "../koneksi.php";

$id_xl = $_POST['id_xl'];
$nama_paket = htmlspecialchars(stripslashes($_POST['nama_paket']));
$jenis_paket = htmlspecialchars(stripslashes($_POST['jenis_paket']));
$masa_aktif = htmlspecialchars(stripslashes($_POST['masa_aktif']));
$harga_asli = htmlspecialchars(stripslashes($_POST['harga_asli']));
$harga_jual = htmlspecialchars(stripslashes($_POST['harga_jual']));

// Variabel untuk melakukan perubahan/perbarui data pada tabel di database (MySQL)
$query = "UPDATE tb_xl SET
         nama_paket = '$nama_paket',
         jenis_paket = '$jenis_paket',
         masa_aktif = '$masa_aktif',
         harga_asli = '$harga_asli',
         harga_jual = '$harga_jual'
         WHERE id_xl = $id_xl
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
         text: 'Paket internet berhasil diubah!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/xl/data_paket';
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
         text: 'Paket internet gagal diubah!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/xl/data_paket';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh UPDATE sebelumnya
return mysqli_affected_rows($conn);

?>