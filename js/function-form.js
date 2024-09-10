// Menunggu dokumen HTML selesai dimuat sebelum menjalankan script
$(document).ready(function () {
  // Menambahkan event listener untuk perubahan pada input email

  $("#inputEmail").change(function () {
    // Mengambil nilai email yang dimasukkan
    var email = $("#inputEmail").val();

    // Memeriksa email dan mengisi data sesuai dengan email yang dimasukkan
    if (email == "ramshalhussein15@gmail.com") {
      $("#inputNama").val("Ramshal Hussein");
      $("#inputIpk").val("3.8");
      $("#tombolDaftar").prop("disabled", false);
    } else if (email == "dico09@gmail.com") {
      $("#inputNama").val("Dico Jati");
      $("#inputIpk").val("3.5");
      $("#tombolDaftar").prop("disabled", false);
    } else if (email == "nobita@gmail.com") {
      $("#inputNama").val("Nobi Nobita");
      $("#inputIpk").val("2.7");
      $("#tombolDaftar").prop("disabled", true); // Menonaktifkan tombol daftar karena IPK < 3.0
    } else if (email == "doraemon@gmail.com") {
      $("#inputNama").val("Doraemon");
      $("#inputIpk").val("4.0");
      $("#tombolDaftar").prop("disabled", false);
    } else if (email == "shizuka@gmail.com") {
      $("#inputNama").val("Shizuka Minamoto");
      $("#inputIpk").val("3.9");
      $("#tombolDaftar").prop("disabled", false);
    } else if (email == "giant@gmail.com") {
      $("#inputNama").val("Takeshi Goda");
      $("#inputIpk").val("2.9");
      $("#tombolDaftar").prop("disabled", true);
    } else if (email == "suneo@gmail.com") {
      $("#inputNama").val("Suneo Honekawa");
      $("#inputIpk").val("3.2");
      $("#tombolDaftar").prop("disabled", false);
    } else if (email == "dekisugi@gmail.com") {
      $("#inputNama").val("Hidetoshi Dekisugi");
      $("#inputIpk").val("4.0");
      $("#tombolDaftar").prop("disabled", false);
    } else {
      // Jika email tidak dikenali, tampilkan modal peringatan
      $("#WarningModal").modal("show");
      $("#tombolDaftar").prop("disabled", true); // Menonaktifkan tombol daftar
    }
  });
});
