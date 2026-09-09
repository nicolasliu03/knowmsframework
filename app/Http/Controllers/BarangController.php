<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function tampil()
    {
        $barangs = Barang::with('kategori')->get();

        return view('barang.daftar', compact('barangs'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        $kategoris = Kategori::all();

        return view('barang.create', compact('kategoris'));
    }

    // Menyimpan barang baru
    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        try {
            Barang::create([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori_id' => $request->kategori_id,
            ]);

            return redirect('/daftar-barang')
                ->with('success', 'Barang berhasil ditambahkan.');
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Barang gagal ditambahkan.');
        }
    }

    // Menampilkan form ubah barang
    public function ubah(Barang $barang)
    {
        $kategoris = Kategori::all();

        return view('barang.ubah', compact('barang', 'kategoris'));
    }

    // Menyimpan perubahan barang
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:barangs,id',
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        try {
            $barang = Barang::findOrFail($request->id);

            $barang->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori_id' => $request->kategori_id,
            ]);

            return redirect('/daftar-barang')
                ->with('success', 'Barang berhasil diubah.');
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Barang gagal diubah.');
        }
    }

    // Menghapus barang
    public function hapus(Barang $barang)
    {
        try {
            $barang->delete();

            return redirect('/daftar-barang')
                ->with('success', 'Barang berhasil dihapus.');
        } catch (\Throwable $e) {
            return redirect('/daftar-barang')
                ->with('error', 'Barang gagal dihapus. Barang mungkin masih digunakan pada nota.');
        }
    }
}
