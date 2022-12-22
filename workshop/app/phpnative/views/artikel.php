<?php 
  require_once('templates/header.php');
?>
<div class="card">
  <div class="card-header">
    Daftar Artikel
  </div>

  <div class="card-body">
    <?php
      // Message for success from register
      if (isset($_SESSION['deleted'])) {
        echo '<div class="alert alert-warning" role="alert"><b>Berhasil: </b> Artikel dengan id '.$_SESSION['deleted'].' telah dihapus!</div>';
        unset($_SESSION['deleted']);
      }
    ?>

    <ul class="list-group list-group-flush">

      <?php  
        $sql          = "SELECT * FROM artikel ORDER BY tgl_diubah DESC";
        $runSql       = mysqli_query($link, $sql);

        if(mysqli_num_rows($runSql) > 0){
          while ($row = mysqli_fetch_assoc($runSql)) {
            // Readmore isi artikel
            if (strlen($row['isi_artikel']) > 270){
              $row['isi_artikel'] =  substr($row['isi_artikel'], 0, 270)." ...";
            }
      ?>
      <li class="list-group-item p-3">
        <a href="<?= BASE_URL.'views/artikel/detail/?id='.$row['id'] ?>" class="text-decoration-none h5 text-primary"><?= $row['judul'] ?></a>  
        <p class="text-muted"><?= $row['isi_artikel'] ?></p>
        <small class="text-muted">- <?= $row['pengguna_id'] ?> | <?= $row['tgl_diubah'] ?></small>
      </li>
      <?php
          }
        } else {
           echo '<div class="alert alert-info" role="alert"><b>Maaf: </b>saat ini website belum memiliki artikel :(</div>';
        }

      ?>
    </ul>
  </div>
</div>

<?php 
  require_once('templates/footer.php');
?>