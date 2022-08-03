$("#keuangan").keyup(function () {
  // parseInt untuk mengkonversi sebuah string menjadi angka(integer)
  let pemasukan = parseInt($("#pemasukan").val());
  let pengeluaran = parseInt($("#pengeluaran").val());

  keuntungan = pemasukan - pengeluaran;

  $("#keuntungan").val(keuntungan);
});