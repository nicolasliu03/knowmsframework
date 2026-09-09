<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function tampil(){
        // $kategoris = DB::table('kategoris')->get();
        $kategoris = Kategori::all();
        return view('kategori.daftar', ['kategoris' => $kategoris]);
    }

    public function create(){
        return view('kategori.create');
    }

    // public function simpan(Request $request){
    //     // DB::table('kategoris')->insert([
    //     //     'nama_kategori' => $request->get('nama_kategori'),
    //     //     'deskripsi' => $request->get('deskripsi'),
    //     // ]);

    //     $kategori = new Kategori;
    //     $kategori->nama_kategori = $request->get('nama_kategori');
    //     $kategori->deskripsi = $request->get('deskripsi');
    //     $kategori->save();
    //     return redirect('daftar-kategori');
    // }

    public function simpan(Request $request){
    $request->validate([
        'nama_kategori' => [
            'required',
            'regex:/^[a-zA-Z\s]+$/' // ketentuan untuk tidak bisa simpan selain huruf
        ],
        'deskripsi' => 'required'
    ], [
        'nama_kategori.required' => 'Nama kategori wajib diisi.',
        'nama_kategori.regex' => 'Nama kategori tidak boleh mengandung angka.',
        'deskripsi.required' => 'Deskripsi wajib diisi.'
    ]);

    try {
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->get('nama_kategori');
        $kategori->deskripsi = $request->get('deskripsi');
        $kategori->save();

        return redirect('daftar-kategori')
            ->with('success', 'Kategori berhasil disimpan.');
    } catch (\Exception $e) {
        return redirect('daftar-kategori')
            ->with('error', 'Kategori gagal disimpan.');
    }
}

    // public function hapus(Kategori $kategori){
    //     $kategori->delete();
    //     return redirect('daftar-kategori');
    // }

    public function hapus(Kategori $kategori){
    try {
        $kategori->delete();

        return redirect('daftar-kategori')
            ->with('success', 'Kategori berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect('daftar-kategori')
            ->with('error', 'Kategori gagal dihapus.');
    }
}

    public function ubah(Kategori $kategori){
        return view('kategori.ubah', ['kategori' => $kategori]);
    }


    public function update(Request $request)
{
    $request->validate([
        'nama_kategori' => [
            'required',
            'regex:/^[a-zA-Z\s]+$/'
        ],
        'deskripsi' => 'required'
    ], [
        'nama_kategori.required' => 'Nama kategori wajib diisi.',
        'nama_kategori.regex' => 'Nama kategori tidak boleh mengandung angka.',
        'deskripsi.required' => 'Deskripsi wajib diisi.'
    ]);

    try {
        $kategori = Kategori::find($request->get('id'));

        if (!$kategori) {
            return redirect('daftar-kategori')
                ->with('error', 'Kategori gagal diubah.');
        }

        $kategori->nama_kategori = $request->get('nama_kategori');
        $kategori->deskripsi = $request->get('deskripsi');
        $kategori->save();

        return redirect('daftar-kategori')
            ->with('success', 'Kategori berhasil diubah.');

    } catch (\Exception $e) {
        return redirect('daftar-kategori')
            ->with('error', 'Kategori gagal diubah.');
    }
}

    public function informasi()
{
    $informasis = DB::table('informasis')
        ->join('kategoris', 'informasis.kategori_id', '=', 'kategoris.id')
        ->select(
            'informasis.*',
            'kategoris.nama_kategori'
        )
        ->get();

    return view('informasi.index', [
        'informasis' => $informasis
    ]);
}

    public function lihatInformasi($id)
{
    $informasi = DB::table('informasis')
        ->join('kategoris', 'informasis.kategori_id', '=', 'kategoris.id')
        ->select(
            'informasis.*',
            'kategoris.nama_kategori'
        )
        ->where('informasis.id', $id)
        ->first();

    if (!$informasi) {
        return redirect('/informasi')
            ->with('error', 'Informasi tidak ditemukan.');
    }

    return view('informasi.show', [
        'informasi' => $informasi
    ]);
}

    // public function update(Request $request) {
    //     $kategori = Kategori::find($request->get('id'));
    //     $kategori->nama_kategori = $request->get('nama_kategori');
    //     $kategori->deskripsi = $request->get('deskripsi');
    //     $kategori->save();
    //     return redirect('daftar-kategori');
    // }
}
