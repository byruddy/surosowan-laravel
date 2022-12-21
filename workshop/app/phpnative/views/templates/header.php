<?php 
  $checkURL = $_SERVER['REQUEST_URI'];

  if(strpos($checkURL, "buat") == true || strpos($checkURL, "detail") == true || strpos($checkURL, "ubah") == true){
    require_once('../../../config/helper.php');
  } else {
    require_once('../config/helper.php');
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

  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <div class="row">
        <div class="col">
          <a href="<?= BASE_URL ?>" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4"><?= NAME_APP ?></span>
          </a>
        </div>
        <div class="col text-end">
          <a href="<?= BASE_URL.'views/akun.php' ?>" class="btn btn-primary">RUDI HIKMATULLAH</a>
        </div>
      </div>
    </header>