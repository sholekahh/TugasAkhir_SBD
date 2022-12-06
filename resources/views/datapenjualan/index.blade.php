@extends('datapenjualan.layout')
@section('content')
<h4 class="mt-5">Aktivitas Kasir</h4>
<div class="p-2 bg-white rounded-2">
    <h6 > Cari Data :</h6>
	<form action="datapenjualan/search" method="get" >
		<input class="p-1 rounded-3"type="text" name="search" placeholder="Nama produk..." value="{{ old('search') }}">
		<input class="btn btn-primary rounded-3" type="submit" value="Search">
	</form>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">{{ $message }}</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Tanggal Transaksi</th>
            <th>Total Bayar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Nama Kasir</th>
        </tr>
    </thead>
    <tbody>
 @foreach ($datas as $data)
 <tr>
    <td>{{ $data->tgl_transaksi }}</td>
    <td>{{ $data->total_bayar }}</td>
    <td>{{ $data->nama_produk}}</td>
    <td>{{ $data->harga }}</td>
    <td>{{ $data->nama_kasir }}</td>    
</tr>
@endforeach
 </tbody>
</table>
@stop
