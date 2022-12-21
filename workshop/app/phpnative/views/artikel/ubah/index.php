<?php 
  require_once('../../templates/header.php');
?>

<div class="card">
  <div class="card-header">
    Ubah Artikel : <?= $_GET['id']; ?>
  </div>
  <div class="card-body">
    <form>
      <div class="mb-3">
        <label for="inputUsername" class="form-label">Judul</label>
        <input type="text" class="form-control" id="inputUsername" required>
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Isi Artikel</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
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