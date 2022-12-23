<div class="card">
  <div class="card-header">
    Akun saya
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h5>Ubah Biodata</h5>
        <div class="alert alert-warning" role="alert"><b>Berhasil: </b> Perubahan telah disimpan!</div>
        <hr>
        <form action="#" method="POST">
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="inputUsername" value="" required>
          </div>
          <div class="mb-3">
            <label for="selectGender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" id="selectGender">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          </div>
        </form>
      </div>
      <div class="col">
        <h5>Ubah Password</h5>
        <div class="alert alert-warning" role="alert"><b>Berhasil: </b> Password baru telah disimpan!</div>
        <div class="alert alert-danger" role="alert"><b>Gagal: </b> Password lama salah!</div>
        <hr>
        <form action="#" method="POST">
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

    <small class="fst-italic text-muted mt-2 d-block">Terakhir diperbaharui: #</small>
    
    <hr>
    <div class="d-grid mt-3">
      <a href="#" class="btn btn-outline-danger">Signout</a>
    </div>

  </div>
</div>
