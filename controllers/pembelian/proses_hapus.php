<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_pembelian yang dikirim lewat URL
$id_pembelian = $_GET['id_pembelian'];
$query = "DELETE FROM tb_pembelian WHERE id_pembelian = $id_pembelian";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/pembelian/data_pembelian");
} else {
   header("Location: ../../views/pembelian/data_pembelian");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>