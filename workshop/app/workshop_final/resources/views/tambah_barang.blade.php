@extends('templates/master')

@section('main')
<div class="card">
  <div class="card-header">
    Form Tambah Barang  
  </div>
  <div class="card-body">
    <form action="{{ url('barang') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="text" name="harga" class="form-control" required>
      </div>
      <div class="d-grid mt-3">
        <button type="submit" class="btn btn-primary">Tambah Barang</button>
      </div>
    </form>
  </div>
</div>
@endsection