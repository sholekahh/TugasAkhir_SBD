@extends('kasir.layout')

@php
    $title = 'Data Kasir';
    $preTitle = 'Edit Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kasir.update', $data->id_kasir) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id_kasir" name="id_kasir" value="{{$data->id_kasir}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Nama</label>
                    <input type="text" class="form-control" nama="nama_kasir" name="nama_kasir" value="{{$data->nama_kasir}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">No Telp</label>
                    <input type="text" class="form-control" no_tlp="no_tlp" name="no_tlp" value="{{$data->no_tlp}}">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection