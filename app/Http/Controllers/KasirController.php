<?php

namespace App\Http\Controllers;
use App\Models\Kasir;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index() {
        $datas = DB::select('select * from kasir where deleted_at is null');
        return view('kasir.index') ->with('datas', $datas);
    }

    public function search(Request $request)
	{
		// menangkap data
		$search = $request->search;
		$datas = DB::table('kasir')->where('nama_kasir','like',"%".$search."%")->get();
		return view('kasir.index')->with('datas', $datas);
	}

    public function create() {
        return view('kasir.add');
    }
    public function store(Request $request) {
        $request->validate([
        'id_kasir' => 'required',
        'nama_kasir' => 'required',
        'no_tlp' => 'required',
        'alamat' => 'required',
        ]);
    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::insert('INSERT INTO kasir (id_kasir, nama_kasir, no_tlp, alamat) VALUES (:id_kasir, :nama_kasir, :no_tlp, :alamat)',
    [
        'id_kasir' => $request->id_kasir,
        'nama_kasir' => $request->nama_kasir,
        'no_tlp' => $request ->no_tlp,
        'alamat' => $request->alamat,
    ]);
    return redirect()->route('kasir.index')->with('success', 'Data Kasir berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('kasir')->where('id_kasir', $id)->first();
        return view('kasir.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
            'id_kasir' => 'required',
            'nama_kasir' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kasir SET id_kasir = :id_kasir, nama_kasir = :nama_kasir, no_tlp = :no_tlp, alamat = :alamat, WHERE id_kasir = :id',
            [
            'id' => $id,
            'id_kasir' => $request ->id_kasir,
            'nama_kasir' => $request->nama_kasir,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            ]);
            return redirect()->route('kasir.index')->with('success', 'Data Kasir berhasil diubah');
            }

            public function softDeleted($id_kasir){
                $data=DB :: table ('kasir')->where('id_kasir', $id_kasir)->update(['deleted_at' => now()]);
                return redirect()->route('kasir.index')->with('success','Data has been Deleted');
            }

            public function trash() {
                $datas = DB::select('select * from kasir WHERE deleted_at is not null ');
        
                return view('kasir.trash')
                    ->with('datas', $datas);
            }
        
            public function restore($id){
                DB::update('UPDATE kasir SET deleted_at = null WHERE id_kasir = :id_kasir',
                [
                    'id_kasir' => $id,
                ]);
                return redirect('kasir')->with('success', 'Data berhasil di restore');
            }

            public function delete($id_kasir) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                $data=DB :: table ('kasir')->where('id_kasir', $id_kasir)->delete();
                return redirect()->route('kasir.index')->with ('success','Data has been Deleted');
            }
}
