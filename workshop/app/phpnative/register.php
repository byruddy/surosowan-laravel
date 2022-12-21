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

        <div class="row my-5">
          <div class="col-md-6 offset-md-3">

            <div class="card">
              <div class="card-header">
                Buat akun baru
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsername" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputUsername" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputUsername" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputUsername" class="form-label">Nama</label>
                    <select class="form-select" aria-label="Default select example">
                      <option value="2">Laki-laki</option>
                      <option value="3">Wanita</option>
                    </select>
                  </div>
                  <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-success">Buat Akun</button>
                  </div>
                </form>
              </div>
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