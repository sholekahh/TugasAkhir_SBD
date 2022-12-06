@extends('admin.layout')

@php
    $title = 'Data Admin';
    $preTitle = 'Edit Data';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.update', $data->id_admin) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id_admin" name="id_admin" value="{{$data->id_admin}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Nama</label>
                    <input type="text" class="form-control" nama="nama" name="nama" value="{{$data->nama}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">No Telp</label>
                    <input type="text" class="form-control" no_tlp="no_tlp" name="no_tlp" value="{{$data->no_tlp}}">
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Alamat</label>
                    <input type="text" class="form-control" alamat="alamat" name="alamat" value="{{$data->alamat}}">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection