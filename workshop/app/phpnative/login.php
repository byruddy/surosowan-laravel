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
                Masuk untuk ke dashboard
              </div>
              <div class="card-body">
                 <?php  
                  $username = NULL;
                  // Message for error for sign in
                  if (isset($_SESSION['failSignIn'])) {
                    $username = $_SESSION['failSignIn'][1];
                    echo '<div class="alert alert-danger" role="alert"><b>Failed: </b>'.$_SESSION['failSignIn'][0].'</div>';
                    unset($_SESSION['failSignIn']);
                  }
                  // Message for success from register
                  if (isset($_SESSION['registered'])) {
                    echo '<div class="alert alert-warning" role="alert"><b>Success: </b> Your account has been created, '.$_SESSION['registered'].' please fill your password to Dashboard.</div>';
                    unset($_SESSION['registered']);
                  }
                ?>
                <form action="<?= BASE_URL.'config/functions/login.php' ?>" method="POST">
                  <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $username ?>" id="inputUsername">
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                  </div>
                  <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">Login</button>
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