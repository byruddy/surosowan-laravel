<?php 
  require_once('../../templates/header.php');

  $id = $_GET['id'];

  $sql          = "SELECT * FROM artikel WHERE id = '".$id."'";
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
    Detail Artikel : <?= $_GET['id'] ?>
  </div>
  <div class="card-body">
    <?php
      // Message for success from register
      if (isset($_SESSION['updated'])) {
        echo '<div class="alert alert-warning" role="alert"><b>Berhasil: </b> Perubahan telah disimpan!</div>';
        unset($_SESSION['updated']);
      }
    ?>
    <h3><?= $dataArtikel['judul'] ?></h3>
    <small class="text-muted d-block mb-3">- <?= $dataArtikel['pengguna_id'] ?> | <?= $dataArtikel['tgl_diubah'] ?></small>
    <p><?= $dataArtikel['isi_artikel'] ?></p>
    <?php
    if (isset($_SESSION['loggedin'])){
      if($dataArtikel['pengguna_id'] == $_SESSION['username']){ 
    ?>
    <hr>
    <div class="text-end">
      <a href="<?= BASE_URL.'views/artikel/ubah/?id='.$_GET['id'] ?>" class="btn btn-warning">Ubah</a>
      <a href="<?= BASE_URL.'config/functions/delete_article.php?id='.$_GET['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">Hapus</a>
    </div>
    <?php 
      }
    }
    ?>
  </div>
</div>

<?php 
  require_once('../../templates/footer.php');
?>