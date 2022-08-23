<p align="center">
   <img width="25%" src="./public/img/icon2.png">
   <h1 align="center"> KonterCell </h1>
</p>

### Deskripsi

Website yang digunakan untuk menambah, mengubah, menghapus, dan mencari data. Seperti, data penjualan, paket data internet, aksesoris, dan keuangan. Tujuan dibuat untuak usaha konter pulsa milik orang tua.

### Fitur

- Login admin
  - Registrasi admin (jika dibutuhkan, jika tidak bisa dihapus)
  
- Keseluruhan
  - Simpan
  - Baca
  - Perbarui
  - Hapus
  - Pencarian
  
- Pembelian
  - Diskon terisi otomatis
  - Kembalian terisi otomatis

- Seluruh Provider
  - Keuntungan terisi otomatis

### Teknologi yang digunakan

- HTML5
- CSS3
- Bootstrap 5.1
- Javascript
- PHP8
- MySQL 
- Sweetalert 2 (Library)
- Select2
  
### Cara penggunaan lewat ZIP

Pastikan sudah terinstall Visual studio code, Xampp, dan PHP versi 8

Jika dari github : 

- Masuk ke repositori github
- Pilih button `code`
- Pada dropdown, pilih `download zip`
- Setelah terdownload, extract file kedalam folder `htdocs` (sesuaikan dengan lokasi di device)
- Setelah di extract, ubah nama folder `3. KonterCell-main` menjadi `KonterCell`
- Buat database pada localhost di phpmyadmin, dengan nama **db_konter_cell**
- Masuk ke database **db_konter_cell**
- Pada bagian atas ada `import`, klik import
- Pada form upload file, `import` file sql yaitu **db_konter_cell** yang ada pada hasil extract di `htdocs`
- Scroll kebawah ada button import, klik `import`
- Tunggu proses import file sql
- Jika berhasil, maka akan ada beberapa tabel yang muncul pada **db_konter_cell**.
- Buka visual studio code
- Buka folder hasil ekstract di `htdocs`
- Buka terminal yang ada pada visual studio code
- Siapkan koneksi internet, lakukan `npm i`
- Tunggu hingga selesai
- Jika muncul `node_modules` maka library berhasil dan website siap digunakan.

### Kegunaan Folder
- Folder public
  Menaruh file yang berkaitan styling/user interface seperti css dan javascript. beserta, resouce foto/gambar.
- Folder controllers
  File fungsi yang menjalankan digunakan sebagai proses pengolahan data/pengiriman data seperti pada saat menggunakan method `POST` atau `GET`.
- Folder views
  Folder yang digunakan untuk menampung file program yang berisikan desain antarmuka website. folder views untuk mempermudah pengelompokan desain antarmuka yang anda buat.

### Tanggal upload
4 Agustus 2022
