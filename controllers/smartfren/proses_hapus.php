<?php

$conn = mysqli_connect("localhost", "root", "", "db_konter_cell");

// Mengambil id_smartfren yang dikirim lewat URL
$id_smartfren = $_GET['id_smartfren'];
$query = "DELETE FROM tb_smartfren WHERE id_smartfren = $id_smartfren";
// Melakukan query atau mengirimkan perintah query ke database (MySQL)
mysqli_query($conn, $query);

// Cek apakah data berhasil dihapus
// jika $query lebih dari 0 artinya data berhasil dihapus
if($query > 0) {
   header("Location: ../../views/smartfren/data_paket");
} else {
   header("Location: ../../views/smartfren/data_paket");
}

// Kembalikan jumlah baris yang terpengaruh query DELETE sebelumnya
return mysqli_affected_rows($conn);

?>