<?php
include_once("connection.php");

$hasil = mysqli_query($conn, "SELECT * FROM daftar_mahasiswa");

// Inisialisasi statistik
$total_mahasiswa = 0;
$jumlah_akademik = 0;
$jumlah_non_akademik = 0;
$jumlah_per_semester = array_fill(1, 8, 0); // Asumsi 8 semester

// Mengumpulkan data
while ($data_mahasiswa = mysqli_fetch_array($hasil)) {
  $total_mahasiswa++;

  if ($data_mahasiswa['beasiswa'] == 'Akademik') {
    $jumlah_akademik++;
  } else {
    $jumlah_non_akademik++;
  }

  $semester = intval($data_mahasiswa['semester']);
  if ($semester >= 1 && $semester <= 8) {
    $jumlah_per_semester[$semester]++;
  }
}

// Menyiapkan data untuk grafik
$label_semester = json_encode(array_keys($jumlah_per_semester));
$data_semester = json_encode(array_values($jumlah_per_semester));
$label_beasiswa = json_encode(['Akademik', 'Non-Akademik']);
$data_beasiswa = json_encode([$jumlah_akademik, $jumlah_non_akademik]);

// Reset
mysqli_data_seek($hasil, 0);

?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- AdminKit CSS -->
  <link rel="stylesheet" href="https://unpkg.com/@adminkit/core@latest/dist/css/app.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Daftar Pendaftar</title>
</head>

<body>
  <!-- Kontainer untuk navbar -->
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
              <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- Kontainer utama untuk konten -->
  <div class="container mt-3 rounded-4 bg-white p-4">
    <!-- Tab navigasi -->
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link" id="nav-home-tab" href="index.php" role="tab" aria-controls="nav-home" aria-selected="false">Pilihan Beasiswa</a>
        <a class="nav-item nav-link" id="nav-profile-tab" href="form-beasiswa.php" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar</a>
        <a class="nav-item nav-link active" id="nav-contact-tab" href="registration-beasiswa.php" role="tab" aria-controls="nav-contact" aria-selected="true">Hasil</a>
      </div>
    </nav>
    <!-- Bagian statistik -->
    <div class="section-statistics my-4">
      <h4>Statistik Pendaftaran</h4>
      <div class="card">
        <div class="card-body">
          <p><strong>Total Mahasiswa yang Mendaftar:</strong> <?php echo $total_mahasiswa; ?></p>
          <p><strong>Pemilihan Beasiswa:</strong></p>
          <ul>
            <li>Akademik: <?php echo $jumlah_akademik; ?> mahasiswa</li>
            <li>Non-Akademik: <?php echo $jumlah_non_akademik; ?> mahasiswa</li>
          </ul>
          <p><strong>Jumlah Mahasiswa per Semester:</strong></p>
          <ul>
            <?php
            foreach ($jumlah_per_semester as $semester => $jumlah) {
              if ($jumlah > 0) {
                echo "<li>Semester $semester: $jumlah mahasiswa</li>";
              }
            }
            ?>
          </ul>
          <div class="row mt-4">
            <div class="col-md-6">
              <h5>Mahasiswa per Semester</h5>
              <canvas id="grafikPieSemester"></canvas>
            </div>
            <div class="col-md-6">
              <h5>Pilihan Beasiswa</h5>
              <canvas id="grafikPieBeasiswa"></canvas>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Daftar pendaftar -->
    <div class="section-menu my-4">
      <h4>Daftar Pendaftar</h4>
      <?php while ($data_mahasiswa = mysqli_fetch_array($hasil)) { ?>
        <div class="mx-3">
          <div class="row">
            <!-- Gambar berkas -->
            <div class="col-md-3 col-lg-4 py-2" id="gambar">
              <img class="img-fluid img-thumbnail" src="uploads/<?php echo $data_mahasiswa['berkas']; ?>" alt="">
            </div>
            <!-- Informasi pendaftar -->
            <div class="col-sm-6 col-md-3 col-lg-4">
              <h4>Nama:</h4>
              <h5><?php echo $data_mahasiswa['nama']; ?></h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <h4>Email:</h4>
              <h5><?php echo $data_mahasiswa['email']; ?></h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <h4>Handphone:</h4>
              <h5><?php echo $data_mahasiswa['hp']; ?></h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <h4>Semester:</h4>
              <h5><?php echo $data_mahasiswa['semester']; ?></h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <h4>IPK:</h4>
              <h5><?php echo $data_mahasiswa['ipk']; ?></h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <h4>Beasiswa:</h4>
              <h5><?php echo $data_mahasiswa['beasiswa']; ?></h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <h4>Status:</h4>
              <h5><?php echo $data_mahasiswa['status']; ?></h5>
            </div>
            <hr class="my-4" />
          </div>
        </div>
      <?php } ?>
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
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Inisialisasi script Chart -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Grafik Pie Semester
      var ctxSemesterPie = document.getElementById('grafikPieSemester').getContext('2d');
      var grafikPieSemester = new Chart(ctxSemesterPie, {
        type: 'doughnut',
        data: {
          labels: <?php echo $label_semester; ?>,
          datasets: [{
            data: <?php echo $data_semester; ?>,
            backgroundColor: [
              'rgba(255, 99, 132, 0.8)',
              'rgba(54, 162, 235, 0.8)',
              'rgba(255, 206, 86, 0.8)',
              'rgba(75, 192, 192, 0.8)',
              'rgba(153, 102, 255, 0.8)',
              'rgba(255, 159, 64, 0.8)',
              'rgba(199, 199, 199, 0.8)',
              'rgba(83, 102, 255, 0.8)',
            ],
            borderColor: 'rgba(255, 255, 255, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'right',
            },
            title: {
              display: true,
              text: 'Mahasiswa per Semester'
            }
          }
        }
      });

      // Grafik Pie Beasiswa
      var ctxBeasiswaPie = document.getElementById('grafikPieBeasiswa').getContext('2d');
      var grafikPieBeasiswa = new Chart(ctxBeasiswaPie, {
        type: 'doughnut',
        data: {
          labels: <?php echo $label_beasiswa; ?>,
          datasets: [{
            data: <?php echo $data_beasiswa; ?>,
            backgroundColor: [
              'rgba(54, 162, 235, 0.8)',
              'rgba(255, 99, 132, 0.8)',
            ],
            borderColor: 'rgba(255, 255, 255, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'right',
            },
            title: {
              display: true,
              text: 'Pilihan Beasiswa'
            }
          }
        }
      });
    });
  </script>
  <!-- Bootstrap JS, AdminKit JS dan dependencies -->
  <script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Script JavaScript -->
  <script src="js/function-form.js"></script>
</body>

</html>