<div class="row my-5">
  <div class="col-md-6 offset-md-3">

    <div class="card">
      <div class="card-header">
        Buat akun baru
      </div>
      <div class="card-body">
        <div class="alert alert-danger" role="alert"><b>Failed: </b>Lorem ipsum dolor sit.</div>

        <form action="#" method="POST">
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="inputUsername" value="" required>
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword" required>
          </div>
          <div class="mb-3">
            <label for="inputName" class="form-label">Nama</label>
            <input type="text" class="form-control" value="" name="nama" id="inputName" required>
          </div>
          <div class="mb-3">
            <label for="selectGender" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select"id="selectGender">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Wanita">>Wanita</option>
            </select>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Buat Akun</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
