<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_telkomsel yang dikirim lewat URL
$id_telkomsel = $_GET['id_telkomsel'];
$query = "DELETE FROM tb_telkomsel WHERE id_telkomsel = $id_telkomsel";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/telkomsel/data_paket");
} else {
   header("Location: ../../views/telkomsel/data_paket");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>