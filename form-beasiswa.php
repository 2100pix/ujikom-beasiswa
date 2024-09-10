<?php
include_once("connection.php");
$result = mysqli_query($conn, "SELECT * FROM daftar_mahasiswa");

// Mengambil jenis beasiswa dari parameter URL, default ke "akademik" jika tidak ada
$jenis_beasiswa = isset($_GET['jenis_beasiswa']) ? $_GET['jenis_beasiswa'] : "akademik";

// Fungsi untuk menghasilkan nilai IPK acak antara dua nilai
function generateRandomFloat(float $minValue, float $maxValue): float
{
  return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
}

// Fungsi untuk menandai opsi beasiswa yang dipilih
function SetBeasiswa($actual_beasiswa, $reference_beasiswa)
{
  return ($actual_beasiswa == $reference_beasiswa) ? "selected" : "";
}

// Menghasilkan IPK acak antara 2.9 dan 3.4
$minValue = 2.9;
$maxValue = 3.4;
$ipk = round(generateRandomFloat($minValue, $maxValue), 1);

// Fungsi untuk menonaktifkan komponen form jika IPK kurang dari 3
function SetDisable($ipk)
{
  return ($ipk < 3) ? "disabled" : "";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Form Pendaftaran Beasiswa</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
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
        <a class="nav-item nav-link" id="nav-home-tab" href="index.php" role="tab" aria-controls="nav-home" aria-selected="false">Pilihan Beasiswa</a>
        <a class="nav-item nav-link active" id="nav-profile-tab" href="form-beasiswa.php" role="tab" aria-controls="nav-profile" aria-selected="true">Daftar</a>
        <a class="nav-item nav-link" id="nav-contact-tab" href="registration-beasiswa.php" role="tab" aria-controls="nav-contact" aria-selected="false">Hasil</a>
      </div>
    </nav>
    <!-- Form pendaftaran beasiswa -->
    <div class="section-menu my-4">
      <h4>Form Pendaftaran Beasiswa</h4>
      <form action="backend/process-registration.php" method="post" enctype="multipart/form-data">
        <!-- Input email -->
        <div class="form-group row py-2">
          <label for="email" class="col-sm-2 col-form-label">Masukkan Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
          </div>
        </div>
        <!-- Input nama -->
        <div class="form-group row py-2">
          <label for="nama" class="col-sm-2 col-form-label">Masukkan Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama" required>
          </div>
        </div>
        <!-- Input nomor HP -->
        <div class="form-group row py-2">
          <label for="hp" class="col-sm-2 col-form-label">Nomor HP</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="hp" name="hp" placeholder="Nomor HP" required>
          </div>
        </div>
        <!-- Pilihan semester -->
        <div class="form-group row py-2">
          <label for="semester" class="col-sm-2 col-form-label">Semester saat ini</label>
          <div class="col-sm-10">
            <select class="form-control" name="semester" id="semester" required>
              <?php for ($i = 1; $i <= 8; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <!-- Input IPK (readonly) -->
        <div class="form-group row py-2">
          <label for="ipk" class="col-sm-2 col-form-label">IPK terakhir</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputIpk" name="ipk" value="<?php echo $ipk ?>" required readonly>
          </div>
        </div>
        <!-- Pilihan jenis beasiswa -->
        <div class="form-group row py-2">
          <label for="beasiswa" class="col-sm-2 col-form-label">Pilihan Beasiswa</label>
          <div class="col-sm-10">
            <select class="form-control" name="beasiswa" id="beasiswa" required <?php echo SetDisable($ipk) ?>>
              <option value="Akademik" <?php echo SetBeasiswa("akademik", $jenis_beasiswa) ?>>Akademik</option>
              <option value="Non Akademik" <?php echo SetBeasiswa("non_akademik", $jenis_beasiswa) ?>>Non Akademik</option>
            </select>
          </div>
        </div>
        <!-- Upload berkas -->
        <div class="form-group row py-2">
          <label class="col-sm-2 col-form-label" for="upload_file">Upload berkas syarat</label>
          <div class="col-sm-10">
            <input type="file" accept="image/*,.pdf/*,.zip/*,.rar" class="form-control" id="customfile" name="berkas" required <?php echo SetDisable($ipk) ?>>
          </div>
        </div>
        <!-- Tombol submit dan batal -->
        <div class="btn-group py-3" role="group" aria-label="Basic mixed styles example">
          <input class="btn btn-success btn-lg" type="submit" id="tombolDaftar" value="Daftar" <?php echo SetDisable($ipk) ?>>
          <a class="btn btn-danger btn-lg" href="index.php">Batal</a>
        </div>
      </form>
    </div>
    <!-- Modal peringatan -->
    <div class="modal fade" id="WarningModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
          </div>
          <div class="modal-body">
            <h3>Email Tidak Teridentifikasi</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
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