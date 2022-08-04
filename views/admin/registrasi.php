<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSS Bootstrap-->
   <link rel="stylesheet" href="../../public/css/bootstrap.css">
   <!-- CSS Bootstrap Icons -->
   <link rel="stylesheet" href="../../public/css/bootstrap-icons.css">
   <!-- Custom Styles Form -->
   <link rel="stylesheet" href="../../public/css/form.css">
   <!-- Icon -->
   <link rel="shortcun icon" href="../../public/img/icon.png">
   <!-- Title Page -->
   <title>Registrasi Admin</title>
</head>
<body>
   <!-- Container -->
   <div class="container-lg">
      <div class="card" style="margin-top: -25px;">
         <!-- Form registrasi -->
         <form action="../../controllers/admin/proses_registrasi.php" method="post">
            <h3 class="mb-4 mt-3 text-center">Form Registrasi Admin</h3>
            <div class="row ms-5 me-0">
               <label for="nama" class="col-sm-5 col-form-label">Nama</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-person-circle"></i>
                     </span>
                     <!-- input nama admin -->
                     <input type="text" class="form-control" name="nama" placeholder="Masukkan nama admin" maxlength="50" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="email" class="col-sm-5 col-form-label">Email</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                     </span>
                     <!-- input email admin -->
                     <input type="email" class="form-control" name="email" placeholder="Masukkan email admin" maxlength="10" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="username" class="col-sm-5 col-form-label">Username</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-person"></i>
                     </span>
                     <!-- input username admin -->
                     <input type="username" class="form-control" name="username" placeholder="Masukkan username admin" maxlength="50" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0">
               <label for="password" class="col-sm-5 col-form-label">Password</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-key"></i>
                     </span>
                     <!-- input password admin -->
                     <input type="password" class="form-control" name="password" placeholder="Masukkan password admin" maxlength="50" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-3">
               <label for="password2" class="col-sm-5 col-form-label">Konfirmasi Password</label>
               <div class="col-md-10">
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">
                        <i class="bi bi-key"></i>
                     </span>
                     <!-- konfirmasi password admin -->
                     <input type="password" class="form-control" name="password2" placeholder="Konfirmasi password admin" maxlength="50" required>
                  </div>
               </div>
            </div>
            <div class="row ms-5 me-0 mb-2">
               <div class="btn-inline">
                  <a href="login" class="btn btn-md btn-secondary me-1">Batal</a>
                  <button type="submit" name="simpan" class="btn btn-md btn-primary btn-outline-info text-light">
                     Submit
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- Script Bootstrap -->
   <script src="../../public/js/library/bootstrap.js" type="module"></script>
</body>
</html>