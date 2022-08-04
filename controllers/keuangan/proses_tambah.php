<?php

require "../koneksi.php";

$nama_pengisi = htmlspecialchars(stripslashes($_POST['nama_pengisi']));
$pemasukan = htmlspecialchars(stripslashes($_POST['pemasukan']));
$pengeluaran = htmlspecialchars(stripslashes($_POST['pengeluaran']));
$keuntungan = htmlspecialchars(stripslashes($_POST['keuntungan']));

// Variabel untuk melakukan insert/memasukkan data ke tabel di database (MySQL)
$query = "INSERT INTO tb_keuangan VALUES('',now(),'$nama_pengisi','$pemasukan','$pengeluaran','$keuntungan')";
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
         text: 'Data keuangan berhasil ditambahkan!'
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
         text: 'Data keuangan gagal ditambahkan!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/keuangan/tambah_keuangan';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh query INSERT sebelumnya
return mysqli_affected_rows($conn);

?>