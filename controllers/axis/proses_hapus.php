<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_axis yang dikirim lewat URL
$id_axis = $_GET['id_axis'];
$query = "DELETE FROM tb_axis WHERE id_axis = $id_axis";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/axis/data_paket");
} else {
   header("Location: ../../views/axis/data_paket");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>