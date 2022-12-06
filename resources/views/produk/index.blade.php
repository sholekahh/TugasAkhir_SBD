@extends('produk.layout')
@section('content')
<h4 class="mt-5">Data Produk</h4>
<a href="{{ route('produk.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a> 

<a href="{{ route('produk.trash') }}" type="button" class="mt-1 btn btn-secondary p-2 rounded-3">Kotak Sampah</a>

<div class="p-2 bg-white rounded-2">
    <h6 > Cari Data :</h6>
	<form action="produk/search" method="get" >
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
            <th>No.</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
 @foreach ($datas as $data)
 <tr>
    <td>{{ $data->id_produk}}</td>
    <td>{{ $data->nama_produk }}</td>
    <td>{{ $data->stok }}</td>
    <td>{{ $data->harga }}</td>
    <td>
                    <a href="{{ route('produk.edit', $data->id_produk) }}" type="button" class="btn btn-warning rounded-3"><i class="fa fa-pencil"></i>Ubah</a>

                    <!-- Button trigger modal -->
                    <a href ="produk/softDeleted/{{ $data->id_produk}}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_produk}}"> <i class="fa fa-trash"></i>
                        Buang
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_produk }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="admin/softDeleted/">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin membuang data ini?
                                    </div>
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
