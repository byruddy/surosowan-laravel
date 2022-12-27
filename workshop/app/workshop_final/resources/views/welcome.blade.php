@extends('templates/master')

@section('main')
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Selamat datang</h1>
    <p class="col-md-10 fs-4">Aplikasi sederhana inventori barang</p>
    <a href="{{ url('barang/tambah') }}" class="btn btn-primary btn-lg">Tambah Barang</a>
    <a href="{{ url('barang') }}" class="btn btn-warning border btn-lg">Lihat Semua Barang</a>
  </div>
</div>
@endsection