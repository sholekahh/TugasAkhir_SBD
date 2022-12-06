<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        $datas = DB::select('select * from produk WHERE deleted_at is null');
        return view('produk.index') ->with('datas', $datas);
    }

    public function search(Request $request)
	{
		// menangkap data
		$search = $request->search;
		$datas = DB::table('produk')->where('nama_produk','like',"%".$search."%")->get();
		return view('produk.index')->with('datas', $datas);
	}

    public function create() {
        return view('produk.add');
    }
    public function store(Request $request) {
        $request->validate([
        'id_produk' => 'required',
        'nama_produk' => 'required',
        'stok' => 'required',
        'harga' => 'required',
        'id_transaksi' => 'required',

        ]);
    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::insert('INSERT INTO produk (id_produk, nama_produk, stok, harga, id_transaksi) VALUES (:id_produk, :nama_produk, :stok, :harga, :id_transaksi)',
    [
        'id_produk' => $request->id_produk,
        'nama_produk' => $request->nama_produk,
        'stok' => $request ->stok,
        'harga' => $request ->harga,
        'id_transaksi' => $request ->id_transaksi
    ]);
    return redirect()->route('produk.index')->with('success', 'Data Produk berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('produk')->where('id_produk', $id)->first();
        return view('produk.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'id_transaksi' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE produk SET id_produk = :id_produk, nama_produk = :nama_produk, stok = :stok, harga = :harga, id_transaksi = :id_transaksi WHERE id_produk = :id',
            [
            'id' => $id,
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'stok' => $request ->stok,
            'harga' => $request ->harga,
            'id_transaksi' => $request ->id_transaksi
            ]);
            return redirect()->route('produk.index')->with('success', 'Data Produk berhasil diubah');
            }

            public function softDeleted($id_produk){
                $data=DB :: table ('produk')->where('id_produk', $id_produk)->update(['deleted_at' => now()]);
                return redirect()->route('produk.index')->with('success','Data has been Deleted');
            }
        
            public function trash() {
                $datas = DB::select('select * from produk WHERE deleted_at is not null ');
        
                return view('produk.trash')
                    ->with('datas', $datas);
            }
        
            public function restore($id){
                DB::update('UPDATE produk SET deleted_at = null WHERE id_produk = :id_produk',
                [
                    'id_produk' => $id,
                ]);
                return redirect('produk')->with('success', 'Data berhasil di restore');
            }
        
            public function delete($id_produk) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                $data=DB :: table ('produk')->where('id_produk', $id_produk)->delete();
                return redirect()->route('produk.index')->with ('success','Data has been Deleted');
            }
}
