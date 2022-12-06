@extends('produk.layout')

@php
    $title = 'Data Produk';
    $preTitle = 'Edit Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.update', $data->id_produk) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id_produk" name="id_produk" value="{{$data->id_produk}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Nama</label>
                    <input type="text" class="form-control" nama_produk="nama_produk" name="nama_produk" value="{{$data->nama_produk}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Stok</label>
                    <input type="text" class="form-control" stok="stok" name="stok" value="{{$data->stok}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Harga</label>
                    <input type="text" class="form-control" harga="harga" name="harga" value="{{$data->harga}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">ID Transaksi</label>
                    <input type="text" class="form-control" id_transaksi="id_transaksi" name="id_transaksi" value="{{$data->id_transaksi}}">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection