<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from transaksi WHERE deleted_at is null');
        return view('transaksi.index') ->with('datas', $datas);
    }

    public function search(Request $request)
	{
		// menangkap data
		$search = $request->search;
		$datas = DB::table('transaksi')->where('id_transaksi','like',"%".$search."%")->get();
		return view('transaksi.index')->with('datas', $datas);
	}

    public function create() {
        return view('transaksi.add');
    }
    public function store(Request $request) {
        $request->validate([
        'id_transaksi' => 'required',
        'tgl_transaksi' => 'required',
        'total_bayar' => 'required',
        'id_kasir' => 'required',

        ]);
    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::insert('INSERT INTO transaksi (id_transaksi, tgl_transaksi, total_bayar, id_kasir) VALUES (:id_transaksi, :tgl_transaksi, :total_bayar, :id_kasir)',
    [
        'id_transaksi' => $request->id_transaksi,
        'tgl_transaksi' => $request->tgl_transaksi,
        'total_bayar' => $request ->total_bayar,
        'id_kasir' => $request ->id_kasir,
    ]);
    return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('transaksi')->where('id_transaksi', $id)->first();
        return view('transaksi.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
            'id_transaksi' => 'required',
            'tgl_transaksi' => 'required',
            'total_bayar' => 'required',
            'id_kasir' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE transaksi SET id_transaksi = :id_transaksi, tgl_transaksi = :tgl_transaksi, total_bayar = :total_bayar, id_kasir = :id_kasir WHERE id_transaksi = :id',
            [
            'id' => $id,
            'id_transaksi' => $request->id_transaksi,
            'tgl_transaksi' => $request->tgl_transaksi,
             'total_bayar' => $request ->total_bayar,
             'id_kasir' => $request ->id_kasir,
            ]);
            return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil diubah');
            }

            public function softDeleted($id_transaksi){
                $data=DB :: table ('transaksi')->where('id_transaksi', $id_transaksi)->update(['deleted_at' => now()]);
                return redirect()->route('transaksi.index')->with('success','Data has been Deleted');
            }
        
            public function trash() {
                $datas = DB::select('select * from transaksi WHERE deleted_at is not null ');
        
                return view('transaksi.trash')
                    ->with('datas', $datas);
            }
        
            public function restore($id){
                DB::update('UPDATE transaksi SET deleted_at = null WHERE id_transaksi = :id_transaksi',
                [
                    'id_transaksi' => $id,
                ]);
                return redirect('transaksi')->with('success', 'Data berhasil di restore');
            }
        
            public function delete($id_transaksi) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                $data=DB :: table ('transaksi')->where('id_transaksi', $id_transaksi)->delete();
                return redirect()->route('transaksi.index')->with ('success','Data has been Deleted');
            }
}
