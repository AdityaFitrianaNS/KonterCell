<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_keuangan yang dikirim lewat URL
$id_keuangan = $_GET['id_keuangan'];
$query = "DELETE FROM tb_keuangan WHERE id_keuangan = $id_keuangan";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/keuangan/data_keuangan");
} else {
   header("Location: ../../views/keuangan/data_keuangan");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>