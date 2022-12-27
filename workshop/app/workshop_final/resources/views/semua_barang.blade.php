@extends('templates/master')

@section('main')
<a href="{{ url('barang/tambah') }}" class="btn btn-primary btn-md mb-3">Tambah Barang</a>

<div class="card">

  <div class="card-header">
    Daftar Barang
  </div>


  <div class="card-body">

    @if (session()->has('added'))
    <div class="alert alert-warning mb-0 mx-3" role="alert"><b>Berhasil: </b> Barang baru telah ditambahkan!</div>
    @endif

    <ul class="list-group list-group-flush">
      @foreach($barangs as $barang)
      <li class="list-group-item p-3">
        <div class="row">
          <div class="col-md-8">
            <h4>{{ $barang->nama_barang }}</h4>
          </div>
          <div class="col-md-4 text-end">
            <h4 class="text-danger">Rp. {{ number_format($barang->harga) }}</h4>
          </div>
          <small class="d-block mt-3 text-muted">Dibuat pada : {{ $barang->created_at }}</small>
        </div>
      </li>
      @endforeach
    </ul>

    @if ($barangs->count() == 0)
    <div class="alert alert-info mx-3" role="alert"><b>Maaf: </b>saat ini belum ada barang di database</div>
    @endif

  </div>
</div>
@endsection