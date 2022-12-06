<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $datas = DB::select('select * from admin WHERE deleted_at is null');

        return view('admin.index')
            ->with('datas', $datas);
    }

    public function search(Request $request)
	{
		// menangkap data
		$search = $request->search;
		$datas = DB::table('admin')->where('nama','like',"%".$search."%")->get();
		return view('admin.index')->with('datas', $datas);
	}

    public function create() {
        return view('admin.add');
    }
    public function store(Request $request) {
        $request->validate([
        'id_admin' => 'required',
        'nama' => 'required',
        'no_tlp' => 'required',
        'alamat' => 'required',
        ]);
    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::insert('INSERT INTO admin(id_admin, nama, no_tlp, alamat) VALUES (:id_admin, :nama, :no_tlp, :alamat)',
    [
        'id_admin' => $request->id_admin,
        'nama' => $request->nama,
        'no_tlp' => $request ->no_tlp,
        'alamat' => $request->alamat,
    ]);
    return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('admin')->where('id_admin', $id)->first();
        return view('admin.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
            'id_admin' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE admin SET id_admin = :id_admin, nama = :nama, no_tlp = :no_tlp, alamat = :alamat WHERE id_admin = :id',
            [
            'id' => $id,
            'id_admin' => $request ->id_admin,
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            ]);
            return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
            }

            public function softDeleted($id_admin){
                $data=DB :: table ('admin')->where('id_admin', $id_admin)->update(['deleted_at' => now()]);
                return redirect()->route('admin.index')->with('success','Data has been Deleted');
            }
        
            public function trash() {
                $datas = DB::select('select * from admin WHERE deleted_at is not null ');
        
                return view('admin.trash')
                    ->with('datas', $datas);
            }
        
            public function restore($id){
                DB::update('UPDATE admin SET deleted_at = null WHERE id_admin = :id_admin',
                [
                    'id_admin' => $id,
                ]);
                return redirect('admin')->with('success', 'Data berhasil di restore');
            }
        
            public function delete($id_admin) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                $data=DB :: table ('admin')->where('id_admin', $id_admin)->delete();
                return redirect()->route('admin.index')->with ('success','Data has been Deleted');
            }

}
