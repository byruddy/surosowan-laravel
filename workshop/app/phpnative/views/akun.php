<?php 
  require_once('templates/header.php');

  $username = $_SESSION['username'];

  $sql          = "SELECT * FROM pengguna WHERE username = '".$username."'";
  $runSql       = mysqli_query($link, $sql);
  $dataPengguna = mysqli_fetch_assoc($runSql);

  unset($dataPengguna['password']);

  // echo '<pre>';
  // print_r($dataPengguna);
  // echo '</pre>';
?>

  <div class="card">
  <div class="card-header">
    Akun saya
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h5>Ubah Biodata</h5>
        <?php
          // Message for success from register
          if (isset($_SESSION['updated'])) {
            echo '<div class="alert alert-warning" role="alert"><b>Berhasil: </b> Perubahan telah disimpan!</div>';
            unset($_SESSION['updated']);
          }
        ?>
        <hr>
        <form action="<?= BASE_URL.'config/functions/update_akun.php' ?>" method="POST">
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="inputUsername" value="<?= $dataPengguna['nama'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="selectGender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" id="selectGender">
              <option value="Laki-laki" <?= ($dataPengguna['jenis_kelamin'] == 'Laki-laki') ? 'selected' : false; ?>>Laki-laki</option>
              <option value="Wanita" <?= ($dataPengguna['jenis_kelamin'] == 'Wanita') ? 'selected' : false; ?>>Wanita</option>
            </select>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          </div>
        </form>
      </div>
      <div class="col">
        <h5>Ubah Password</h5>
        <?php
          // Message for success from change password
          if (isset($_SESSION['password-updated'])) {
            echo '<div class="alert alert-warning" role="alert"><b>Berhasil: </b> Password baru telah disimpan!</div>';
            unset($_SESSION['password-updated']);
          }

          // Message for failed from change password
          if (isset($_SESSION['password-failed'])) {
            echo '<div class="alert alert-danger" role="alert"><b>Gagal: </b> Password lama anda salah!</div>';
            unset($_SESSION['password-failed']);
          }
        ?>
        <hr>
        <form action="<?= BASE_URL.'config/functions/update_password.php' ?>" method="POST">
          <div class="mb-3">
            <label for="inputPasswordOld" class="form-label">Password Lama</label>
            <input type="password" name="password_lama" class="form-control" id="inputPasswordOld" required>
          </div>
          <div class="mb-3">
            <label for="inputPasswordNew" class="form-label">Password Baru</label>
            <input type="password" name="password_baru" class="form-control" id="inputPasswordNew" required>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-warning">Ubah Password</button>
          </div>
        </form>
      </div>
    </div>

    <small class="fst-italic text-muted mt-2 d-block">Terakhir diperbaharui: <?= $dataPengguna['tgl_diubah'] ?></small>
    
    <hr>

    <div class="d-grid mt-3">
      <a href="<?= BASE_URL.'config/functions/logout.php' ?>" class="btn btn-outline-danger">Logout</a>
    </div>

  </div>
</div>

<?php 
  require_once('templates/footer.php');
?>