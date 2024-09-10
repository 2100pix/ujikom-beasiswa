<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Beasiswa</title>
</head>

<body>
  <!-- Container untuk navbar -->
  <div class="container mt-3 rounded-4 bg-primary p-4">
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container-fluid">
        <!-- Judul navbar -->
        <a class="navbar-brand" href="#">Pendaftaran Beasiswa</a>
        <!-- Tombol toggle untuk tampilan mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- Container utama untuk konten -->
  <div class="container mt-3 rounded-4 bg-white p-4">
    <!-- Tab navigasi -->
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" href="index.php" role="tab" aria-controls="nav-home" aria-selected="true">Pilihan Beasiswa</a>
        <a class="nav-item nav-link" id="nav-profile-tab" href="form-beasiswa.php" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar</a>
        <a class="nav-item nav-link" id="nav-contact-tab" href="registration-beasiswa.php" role="tab" aria-controls="nav-contact" aria-selected="false">Hasil</a>
      </div>
    </nav>

    <!-- Konten tab -->
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="beasiswa" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="section-menu my-4">
          <h4>Jenis Beasiswa</h4>
          <p>Beasiswa kuliah merupakan bantuan biaya pendidikan yang diberikan kepada mahasiswa berprestasi atau yang membutuhkan, agar mereka dapat melanjutkan studi ke jenjang yang lebih tinggi. Ada berbagai jenis beasiswa dengan persyaratan yang berbeda-beda.
          </p>
          <ul>
            <!-- Beasiswa Akademik -->
            <li>
              <h5>Beasiswa Akademik</h5>
              <p>Beasiswa akademik diberikan kepada mahasiswa yang memiliki prestasi akademik yang sangat baik. Biasanya, persyaratan yang harus dipenuhi adalah:</p>
              <ul>
                <li>
                  <span>Transkrip nilai: Bukti perolehan nilai yang tinggi selama menempuh pendidikan sebelumnya.</span>
                </li>
                <li>
                  <span>Pas foto: Foto terbaru dengan ukuran sesuai ketentuan.</span>
                </li>
                <li>
                  <span>Surat keterangan prestasi akademik: Dokumen resmi yang menyatakan prestasi akademik yang pernah diraih, misalnya peringkat kelas, juara olimpiade, atau publikasi ilmiah.</span>
                </li>
              </ul>
              <a class="btn btn-primary my-large-btn my-2" href="form-beasiswa.php?jenis_beasiswa=akademik">Daftar Sekarang</a>
            </li>
            <hr />
            <!-- Beasiswa Non Akademik -->
            <li>
              <h5>Beasiswa Non Akademik</h5>
              <p>Beasiswa non-akademik diberikan kepada mahasiswa yang memiliki prestasi di bidang di luar akademik, seperti olahraga, seni, atau kegiatan sosial. Persyaratan yang umumnya dibutuhkan adalah: </p>
              <ul>
                <li>
                  <span>Transkrip nilai: Sebagai bukti bahwa calon penerima beasiswa juga memiliki kemampuan akademik yang memadai.</span>
                </li>
                <li>
                  <span>Pas foto: Foto terbaru dengan ukuran sesuai ketentuan.</span>
                </li>
                <li>
                  <span>Bukti prestasi non-akademik: Dokumen yang menunjukkan prestasi di bidang non-akademik, misalnya sertifikat kejuaraan, portofolio karya seni, atau surat rekomendasi dari pembina kegiatan.</span>
                </li>
                <li>
                  <span>Surat Keterangan Tidak Mampu (SKTM): Bagi calon penerima beasiswa yang berasal dari keluarga kurang mampu, SKTM dapat menjadi salah satu persyaratan yang wajib dipenuhi. </span>
                </li>
              </ul>
              <a class="btn btn-primary my-large-btn my-2" href="form-beasiswa.php?jenis_beasiswa=non_akademik">Daftar Sekarang</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="header mt-5 bg-primary p-4">
    <nav class="px-5 text-white row">
      <div class="d-flex justify-content-between">
        <h1 class="fs-5">Ujikom Junior Web Ddeveloper</h1>
        <a class="fs-5 text-white" href="https://ramshal.works/" target="_blank">Ramshal Hussein</a>
      </div>
    </nav>
  </div>
  <!-- Bootstrap JS dan dependencies -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Script JavaScript -->
  <script src="js/function-form.js"></script>

</body>

</html>