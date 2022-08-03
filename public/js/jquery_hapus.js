// Hapus waifu
$(document).on("click", "#btn-hapus", function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  Swal.fire({
    icon: "warning",
    title: "Apakah kamu yakin?",
    text: "Data pada baris yang dipilih akan dihapus!",
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        icon: "success",
        title: "Berhasil!",
        text: "Data pada baris yang dipilih berhasil dihapus!",
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = link;
        }
      });
    }
  });
});