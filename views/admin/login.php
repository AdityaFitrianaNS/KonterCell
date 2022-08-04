<?php

session_start();

require '../../controllers/koneksi.php';

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admin_web WHERE username = '$username'");
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION["login"] = true;
        ?>
            <!-- Script SweetAlert2 -->
            <script src="../../public/js/library/sweetalert2.all.min.js"></script>
            <body style="font-family: poppins;"></body>
            <!-- alert berhasil login-->
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Login berhasil sebagai admin!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = '../home';
                    }
                })
            </script>
        <?php
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap-->
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <!-- CSS Bootstrap Icons -->
    <link rel="stylesheet" href="../../public/css/bootstrap-icons.css">
    <!-- Custom Styles Navbar -->
    <link rel="stylesheet" href="../../public/css/login.css">
    <!-- Icon -->
    <link rel="shortcun icon" href="../../public/img/icon.png">
    <!-- Tittle Page -->
    <title>Login KonterCell</title>
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="../../public/img/icon.png" alt="backgroundForm" class="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2 class="mt-4">Login</h2>
                <?php if (isset($error)) : ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Username atau Password salah!'
                        });
                    </script>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="inputBx">
                        <label for="username" class="label">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="inputBx">
                        <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name="">Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" class="tombol" name="login" id="login" value="Login">
                    </div>
                    <div class="inputBx">
                        <p>Tidak memiliki akun? <a href="registrasi.php" data-bs-toggle="modal" data-bs-target="#registrasi_modal"> Registrasi</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>