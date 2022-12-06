@extends('transaksi.layout')

@php
    $title = 'Data Transaksi';
    $preTitle = 'Edit Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.update', $data->id_transaksi) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id" class="form-label">ID Transaksi</label>
                    <input type="text" class="form-control" id_transaksi="id_transaksi" name="id_transaksi" value="{{$data->id_transaksi}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Tanggal Transaksi</label>
                    <input type="text" class="form-control" tgl_transaksi="tgl_transaksi" name="tgl_transaksi" value="{{$data->tgl_transaksi}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Total Bayar</label>
                    <input type="text" class="form-control" total_bayar="total_bayar" name="total_bayar" value="{{$data->total_bayar}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Id Kasir</label>
                    <input type="text" class="form-control" id_admin="id_kasir" name="id_kasir" value="{{$data->id_kasir}}">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection