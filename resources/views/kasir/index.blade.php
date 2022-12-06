@extends('kasir.layout')
@section('content')
<h4 class="mt-5">Data Kasir</h4>
<a href="{{ route('kasir.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a> 
<a href="{{ route('kasir.trash') }}" type="button" class="mt-1 btn btn-secondary p-2 rounded-3">Kotak Sampah</a>


<div class="p-2 bg-white rounded-2">
    <h6 > Cari Data :</h6>
	<form action="kasir/search" method="get" >
		<input class="p-1 rounded-3"type="text" name="search" placeholder="Nama ..." value="{{ old('search') }}">
		<input class="btn btn-primary rounded-3" type="submit" value="Search">
	</form>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">{{ $message }}</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Kasir</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
 @foreach ($datas as $data)
 <tr>
    <td>{{ $data->id_kasir}}</td>
    <td>{{ $data->nama_kasir }}</td>
    <td>{{ $data->no_tlp }}</td>
    <td>
        <a href="{{ route('kasir.edit', $data->id_kasir) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
        <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
        <!-- Button trigger modal -->
        <a href ="kasir/softDeleted/{{ $data->id_kasir}}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_kasir }}"> <i class="fa fa-trash"></i>
        Buang
    </a>
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="hapusModal{{ $data->id_kasir }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="kasir/softDeleted/">
                    @csrf
                    <div class="modal-body"> Apakah Anda yakin ingin membuang data ini?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</td>
</tr>
@endforeach
 </tbody>
</table>
@stop
