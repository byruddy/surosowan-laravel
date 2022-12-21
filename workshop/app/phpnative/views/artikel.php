<?php 
  require_once('templates/header.php');
?>

<a href="<?= BASE_URL.'views/artikel/buat' ?>" class="btn btn-success mb-3">Buat Artikel Baru</a>

<div class="card">
  <div class="card-header">
    Daftar Artikel
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item p-3">
      <a href="<?= BASE_URL.'views/artikel/detail/?id=16' ?>" class="text-decoration-none h5 text-primary">Lorem ipsum dolor sit amet.</a>  
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. A ipsum, reiciendis quae neque et iste illum, quis vel nulla asperiores animi voluptates fugit quo veniam similique in non, incidunt fuga.</p>
      <small class="text-muted">- byruddy | <?= date('l, d F Y - H:i:s') ?></small>
    </li>
    <li class="list-group-item p-3">
      <a href="#" class="text-decoration-none h5 text-primary">Lorem ipsum dolor sit amet.</a>  
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. A ipsum, reiciendis quae neque et iste illum, quis vel nulla asperiores animi voluptates fugit quo veniam similique in non, incidunt fuga.</p>
      <small class="text-muted">- byruddy | <?= date('l, d F Y - H:i:s') ?></small>
    </li>
    <li class="list-group-item p-3">
      <a href="#" class="text-decoration-none h5 text-primary">Lorem ipsum dolor sit amet.</a>  
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. A ipsum, reiciendis quae neque et iste illum, quis vel nulla asperiores animi voluptates fugit quo veniam similique in non, incidunt fuga.</p>
      <small class="text-muted">- byruddy | <?= date('l, d F Y - H:i:s') ?></small>
    </li>
  </ul>
</div>

<?php 
  require_once('templates/footer.php');
?>