<?php 
  require_once('config/helper.php');
  
  // Check if the user is logged, redirect to welcome page
  if(isset($_SESSION["loggedin"])){
    header("Location: ".BASE_URL);
    exit;
  }
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
                  <?php
                    $username = $nama = $jenis_kelamin = NULL;
                    if (isset($_SESSION['failSignUp'])) {
                        // Data form last input
                        $username = $_SESSION['dataForm']['username'];
                        $nama    = $_SESSION['dataForm']['nama'];
                        $jenis_kelamin    = $_SESSION['dataForm']['jenis_kelamin'];
                        // Message errors
                        $msgErr = array_filter(explode('#', $_SESSION['failSignUp']));

                        echo '<div class="alert alert-danger" role="alert"><b>Failed: </b>';
                        if (count($msgErr) > 1){
                            echo '<ol class="mb-0">';
                            foreach ($msgErr as $key => $value) {
                                echo '<li>'.$value.'</li>';
                            }
                            echo '</ol>';
                        } else {
                            echo array_values($msgErr)[0];
                        }
                        echo '</div>';
                        
                        // Clear session 
                        unset($_SESSION['failSignUp']);
                        unset($_SESSION['dataForm']);
                    }
                 ?>
                <form action="<?= BASE_URL.'config/functions/register.php' ?>" method="POST">
                  <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="inputUsername" value="<?= $username; ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" required>
                  </div>
                  <div class="mb-3">
                    <label for="inputName" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="<?= $nama; ?>" name="nama" id="inputName" required>
                  </div>
                  <div class="mb-3">
                    <label for="selectGender" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select"id="selectGender">
                      <option value="Laki-laki" <?= ($jenis_kelamin == 'Laki-laki') ? 'selected' : false; ?>>Laki-laki</option>
                      <option value="Wanita" <?= ($jenis_kelamin == 'Wanita') ? 'selected' : false; ?>>Wanita</option>
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