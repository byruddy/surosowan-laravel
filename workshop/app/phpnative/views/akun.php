<?php 
  require_once('templates/header.php');
?>

  <div class="card">
  <div class="card-header">
    Akun saya
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h5>Ubah Biodata</h5>
        <hr>
        <form>
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputUsername" required>
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example">
              <option value="2">Laki-laki</option>
              <option value="3">Wanita</option>
            </select>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          </div>
        </form>
      </div>
      <div class="col">
        <h5>Ubah Password</h5>
        <hr>
        <form>
          <div class="mb-3">
            <label for="inputPasswordOld" class="form-label">Password Lama</label>
            <input type="text" class="form-control" id="inputPasswordOld" required>
          </div>
          <div class="mb-3">
            <label for="inputPasswordNew" class="form-label">Password Baru</label>
            <input type="text" class="form-control" id="inputPasswordNew" required>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-warning">Ubah Password</button>
          </div>
        </form>
      </div>
    </div>
    
    <hr>

    <div class="d-grid mt-3">
      <a href="#" class="btn btn-light border">Logout</a>
    </div>

  </div>
</div>

<?php 
  require_once('templates/footer.php');
?>