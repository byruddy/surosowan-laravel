<?php 
  require_once('../../templates/header.php');

  $id = $_GET['id'];

  $sql          = "SELECT * FROM artikel WHERE id = '".$id."' AND pengguna_id = '".$_SESSION['username']."'";
  $runSql       = mysqli_query($link, $sql);

  // Validate for id
  if(mysqli_num_rows($runSql) > 0) {
    $dataArtikel  = mysqli_fetch_assoc($runSql);

    // echo '<pre>';
    // print_r($dataArtikel);
    // echo '</pre>';

  } else {
    // Redirect to list of articles
    header("Location: ".BASE_URL.'views/artikel.php');
    exit;
  }
?>

<div class="card">
  <div class="card-header">
    Ubah Artikel : <?= $_GET['id']; ?>
  </div>
  <div class="card-body">
      <?php
        $judul = $isi_artikel = NULL;
        if (isset($_SESSION['failUpdate'])) {
            // Data form last input
            $judul = $_SESSION['dataForm']['judul'];
            $isi_artikel    = $_SESSION['dataForm']['isi_artikel'];
            // Message errors
            $msgErr = array_filter(explode('#', $_SESSION['failUpdate']));

            echo '<div class="alert alert-danger" role="alert"><b>Gagal: </b>';
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
            unset($_SESSION['failUpdate']);
            unset($_SESSION['dataForm']);
        }
     ?>
    <form action="<?= BASE_URL.'config/functions/update_article.php' ?>" method="POST">
      <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
      <div class="mb-3">
        <label for="inputTitle" class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" id="inputTitle" value="<?= $dataArtikel['judul'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="inputArticle" class="form-label">Isi Artikel</label>
        <textarea class="form-control" name="isi_artikel" id="inputArticle" rows="3" required><?= $dataArtikel['isi_artikel'] ?></textarea>
      </div>
      <div class="d-grid mt-3">
        <button type="submit" class="btn btn-warning">Ubah Artikel</button>
      </div>
    </form>
  </div>
</div>

<?php 
  require_once('../../templates/footer.php');
?>