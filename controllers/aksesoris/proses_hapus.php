<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_aksesoris yang dikirim lewat URL
$id_aksesoris = $_GET['id_aksesoris'];
$query = "DELETE FROM tb_aksesoris WHERE id_aksesoris = $id_aksesoris";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/aksesoris/data_aksesoris");
} else {
   header("Location: ../../views/aksesoris/data_aksesoris");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>