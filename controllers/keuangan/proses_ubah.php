<?php

require "../koneksi.php";

$id_keuangan = $_POST['id_keuangan'];
$nama_pengisi = htmlspecialchars(stripslashes($_POST['nama_pengisi']));
$pemasukan = htmlspecialchars(stripslashes($_POST['pemasukan']));
$pengeluaran = htmlspecialchars(stripslashes($_POST['pengeluaran']));
$keuntungan = htmlspecialchars(stripslashes($_POST['keuntungan']));

// Variabel untuk melakukan perubahan/perbarui data pada tabel di database (MySQL)
$query = "UPDATE tb_keuangan SET
         nama_pengisi = '$nama_pengisi',     
         pemasukan = '$pemasukan',
         pengeluaran = '$pengeluaran',
         keuntungan = '$keuntungan'
         WHERE id_keuangan = $id_keuangan
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
         text: 'Data keuangan berhasil diubah!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/keuangan/data_keuangan';
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
         text: 'Data keuangan gagal diubah!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/keuangan/data_keuangan';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh UPDATE sebelumnya
return mysqli_affected_rows($conn);

?>

