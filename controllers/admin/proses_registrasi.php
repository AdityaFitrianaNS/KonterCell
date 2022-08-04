<?php

require "../koneksi.php";

$nama = htmlspecialchars(stripslashes($_POST['nama']));
$email = htmlspecialchars(stripslashes($_POST['email']));
$username = htmlspecialchars(stripslashes($_POST['username']));
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);

// Konfirm password
if ($password !== $password2) {
    echo "<script>
        alert('Password dengan Konfirmasi Password tidak sesuai!');
    </script>";

    // Tidak melanjutkan ekseskusi
    return false;
}
// Username tidak boleh duplikat
$ResultUsername = mysqli_query($conn, "SELECT username from admin_web WHERE username = '$username'");

if (mysqli_fetch_assoc($ResultUsername)) {
    echo "<script>
    alert('Akun yang dibuat sudah terdaftar');
</script>";

    // Tidak melanjutkan eksekusi
    return false;
}

// Encrypt password
$password = password_hash($password, PASSWORD_DEFAULT);

$registrasi = "INSERT INTO admin_web VALUES('','$nama','$email','$username','$password', now())";
mysqli_query($conn, $registrasi);

?>

<!-- Script CDN Sweetalert 2 -->
<script src="../../public/js/library/sweetalert2.all.min.js"></script>
<body style="font-family: poppins;"></body>

<?php
// Cek apakah data berhasil diubah, 
// jika $registrasi lebih dari 0 artinya data berhasil diubah
if ($registrasi > 0) {
?>
   <!-- alert berhasil -->
   <script>
      Swal.fire({
         icon: 'success',
         title: 'Berhasil!',
         text: 'Registrasi berhasil, Silahkan login!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/admin/login';
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
         text: 'Registrasi Gagal, Silahkan periksa kembali!'
      }).then((result) => {
         if (result.isConfirmed) {
            document.location.href = '../../views/admin/registrasi';
         }
      })
   </script>
<?php
}

// Kembalikan jumlah baris yang terpengaruh INSERT sebelumnya
return mysqli_affected_rows($conn);

?>