function hitung_diskon() {
   let total_pembelian = document.getElementById("total_pembelian").value;
   let diskon = document.getElementById("diskon");

   if (total_pembelian > 50000) {
      diskon.value = 1000;
    } else if (total_pembelian > 75000) {
      diskon.value = 1500;
    } else if (total_pembelian > 100000) {
      diskon.value = 2000;
    } else if (total_pembelian > 150000) {
      diskon.value = 3000;
    } else {
      diskon.value = 0;
    }
}
$("#pembelian").keyup(function () {
  // parseInt untuk mengkonversi sebuah string menjadi angka(integer)
  let total_pembelian = parseInt($("#total_pembelian").val());
  let uang_bayar = parseInt($("#uang_bayar").val());
  let diskon = parseInt($("#diskon").val());

  uang_kembalian = uang_bayar - (total_pembelian - diskon);

  $("#uang_kembalian").val(uang_kembalian);
});