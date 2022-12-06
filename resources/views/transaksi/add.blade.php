@extends('transaksi.layout')
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
      <h5 class="card-title fw-bolder mb-3">Tambah Transaksi</h5>
      <form method="post" action="{{route('transaksi.store') }}">
         @csrf
         <div class="mb-3">
            <label for="id_transaksi" class="form-label">ID Transaksi</label>
            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi">
         </div>
         <div class="mb-3">
            <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi">
         </div>
         <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar</label>
            <input type="text" class="form-control" id="total_bayar" name="total_bayar">
         </div>
         <div class="mb-3">
            <label for="total_bayar" class="form-label">Id Kasir</label>
            <input type="text" class="form-control" id="id_kasir" name="id_kasir">
         </div>
         <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Tambah" />
         </div>
      </form>
   </div>
</div>
@stop
