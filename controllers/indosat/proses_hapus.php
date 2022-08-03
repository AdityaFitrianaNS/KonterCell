<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_indosat yang dikirim lewat URL
$id_indosat = $_GET['id_indosat'];
$query = "DELETE FROM tb_indosat WHERE id_indosat = $id_indosat";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/indosat/data_paket");
} else {
   header("Location: ../../views/indosat/data_paket");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>