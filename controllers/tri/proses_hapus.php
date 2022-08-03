<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_tri yang dikirim lewat URL
$id_tri = $_GET['id_tri'];
$query = "DELETE FROM tb_tri WHERE id_tri = $id_tri";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/tri/data_paket");
} else {
   header("Location: ../../views/tri/data_paket");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>