@extends('produk.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul> @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
<div class="card mt-4">
   <div class="card-body">
      <h5 class="card-title fw-bolder mb-3">Tambah Produk</h5>
      <form method="post" action="{{route('produk.store') }}">
         @csrf
         <div class="mb-3">
            <label for="id" class="form-label">ID Produk</label>
            <input type="text" class="form-control" id="id_produk" name="id_produk">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
         </div>
         <div class="mb-3">
            <label for="no_tlp" class="form-label">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok">
         </div>
         <div class="mb-3">
            <label for="alamat" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga">
         </div>
         <div class="mb-3">
            <label for="alamat" class="form-label">Id Transaksi</label>
            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi">
         </div>
         <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Tambah" />
         </div>
      </form>
   </div>
</div>
@stop
