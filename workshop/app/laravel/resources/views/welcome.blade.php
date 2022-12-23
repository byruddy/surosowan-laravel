
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Ayoo Menulis Artikel!</h1>
    <p class="col-md-10 fs-4">Dengan menulis anda bisa mengingat hal-hal yang penting dalam hidup, yeah!.</p>
    <a href="#" class="btn btn-primary btn-lg">Buat Sekarang</a>
    <a href="{{ url('/articles') }}" class="btn btn-warning border btn-lg">Lihat Artikel</a>
  </div>
</div>

<div class="row align-items-md-stretch">
  <div class="col-md-6">
    <div class="h-100 p-5 text-bg-dark rounded-3">
      <h2>Masuk untuk menulis</h2>
      <p>Dibutuhkan akun (username dan password) untuk dapat menulis pada panel dashboard.</p>
      <a href="{{ url('/signin') }}" class="btn btn-outline-light" type="button">Masuk</a>
    </div>
  </div>
  <div class="col-md-6">
    <div class="h-100 p-5 bg-light border rounded-3">
      <h2>Belum memiliki akun ?</h2>
      <p>Anda bisa membuat akun baru disini untuk dapat login dan menulis pada halaman dashboard.</p>
      <a href="{{ url('/signup') }}" class="btn btn-success">Buat Akun</a>
    </div>
  </div>
</div>
