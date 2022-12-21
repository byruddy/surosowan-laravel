<?php 
  require_once('config/helper.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= NAME_APP ?> | phpnative</title>
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/bootstrap.min.css' ?>">
  </head>
  <body>
    <main>
      <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
          <a href="<?= BASE_URL ?>" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4"><?= NAME_APP ?></span>
          </a>
        </header>

        <div class="p-5 mb-4 bg-light rounded-3">
          <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Ayoo Menulis Artikel!</h1>
            <p class="col-md-10 fs-4">Dengan menulis anda bisa mengingat hal-hal yang penting dalam hidup, yeah!.</p>
            <a href="<?= BASE_URL.'views/artikel/buat' ?>" class="btn btn-primary btn-lg">Buat Sekarang</a>
            <a href="<?= BASE_URL.'views/artikel.php' ?>" class="btn btn-warning border btn-lg" type="button">Lihat Artikel</a>
          </div>
        </div>

        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
              <h2>Masuk untuk menulis</h2>
              <p>Dibutuhkan akun (username dan password) untuk dapat menulis pada panel dashboard.</p>
              <a href="<?= BASE_URL.'login.php' ?>" class="btn btn-outline-light" type="button">Login</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Belum memiliki akun ?</h2>
              <p>Anda bisa membuat akun baru disini untuk dapat login dan menulis pada halaman dashboard.</p>
              <a href="<?= BASE_URL.'register.php' ?>" class="btn btn-success">Buat Akun</a>
            </div>
          </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
          Surosowan Cyber feat byruddy &copy; 2022
        </footer>
      </div>
    </main>


    <script src="<?= BASE_URL.'assets/js/bootstrap.bundle.min.js' ?>"></script>
  </body>
</html>