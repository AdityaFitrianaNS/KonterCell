<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_xl yang dikirim lewat URL
$id_xl = $_GET['id_xl'];
$query = "DELETE FROM tb_xl WHERE id_xl = $id_xl";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/xl/data_paket");
} else {
   header("Location: ../../views/xl/data_paket");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>