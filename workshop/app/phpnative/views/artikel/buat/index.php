<?php 
  require_once('../../templates/header.php');

  // Check if the user is not yet logged, redirect to login page
  if(!isset($_SESSION["loggedin"])){
    header("Location: ".BASE_URL."login.php");
    exit;
  }
?>

<div class="card">
  <div class="card-header">
    Buat Artikel Baru
  </div>
  <div class="card-body">
      <?php
        $judul = $isi_artikel = NULL;
        if (isset($_SESSION['failCreate'])) {
            // Data form last input
            $judul = $_SESSION['dataForm']['judul'];
            $isi_artikel    = $_SESSION['dataForm']['isi_artikel'];
            // Message errors
            $msgErr = array_filter(explode('#', $_SESSION['failCreate']));

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
            unset($_SESSION['failCreate']);
            unset($_SESSION['dataForm']);
        }
     ?>
    <form action="<?= BASE_URL.'config/functions/create_article.php' ?>" method="POST">
      <div class="mb-3">
        <label for="inputTitle" class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" id="inputTitle" value="<?= $judul; ?>" required>
      </div>
      <div class="mb-3">
        <label for="inputArticle" class="form-label">Isi Artikel</label>
        <textarea name="isi_artikel" class="form-control" id="inputArticle" rows="3" required><?= $isi_artikel ?></textarea>
      </div>
      <div class="d-grid mt-3">
        <button type="submit" class="btn btn-success">Buat Artikel</button>
      </div>
    </form>
  </div>
</div>

<?php 
  require_once('../../templates/footer.php');
?>