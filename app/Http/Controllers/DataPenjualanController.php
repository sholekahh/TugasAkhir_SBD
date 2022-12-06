<?php

namespace App\Http\Controllers;
use App\Models\Kasir;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DataPenjualanController extends Controller
{
    public function index() {
        $datas = DB::select('select transaksi.tgl_transaksi, transaksi.total_bayar, produk.nama_produk, produk.harga, kasir.nama_kasir FROM ((transaksi JOIN produk ON transaksi.id_transaksi = produk.id_transaksi) JOIN kasir ON transaksi.id_kasir = kasir.id_kasir);');
        return view('datapenjualan.index') ->with('datas', $datas);
    }
    public function create() {
        return view('kasir.add');
    }
    public function search(Request $request)
	{
		// menangkap data
		$search = $request->search;
		$datas = DB::table('datapenjualan')->where('nama_produk','like',"%".$search."%")->get();
		return view('datapenjualan.index')->with('datas', $datas);
	}
}
