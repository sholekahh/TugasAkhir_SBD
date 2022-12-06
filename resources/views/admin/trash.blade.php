@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h2 class="mt-5 p-2 bg-white text-dark rounded-2">Kotak Sampah (Data Admin)</h2>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table text-center table-hover mt-2 bg-light p-2 rounded-2" >
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Admin</th>
        <th>NO Telepon</th>
        <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_admin }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_tlp }}</td>
                <td>{{ $data->alamat }}</td>
                
                <td>
                <a href="{{ route('admin.restore', $data->id_admin) }}" type="button" class="btn btn-warning rounded-3"><i class="fa fa-pencil"></i>Restore</a>

                    <!-- Button trigger modal -->
                    <a href ="{{ route('admin.delete', $data->id_admin) }}"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_admin }}"> <i class="fa fa-trash"></i>
                        Hapus
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_admin }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="/admin/delete/">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
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