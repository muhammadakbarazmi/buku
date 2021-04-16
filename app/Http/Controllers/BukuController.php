<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $buku = Buku::paginate(5); // Mengambil semua isi tabel
        $posts = Buku::orderBy('id_buku', 'desc')->paginate(6);
        return view('buku.index', compact('buku'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
      return view('buku.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'id_buku' => 'required',
            'Judul' => 'required',
            'Kategori' => 'required',
            'Penerbit' => 'required',
            'Pengarang' => 'required',
            'Jumlah' => 'required',
            'Status' => 'required',
        ]);  
        //fungsi eloquent untuk menambah data
         Buku::create($request->all());
         
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('buku.index')
        ->with('success', 'Buku Berhasil Ditambahkan');
    }

    public function show($id_buku)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Buku = Buku::find($id_buku);
        return view('buku.detail', compact('Buku'));
    }

    public function edit($id_buku)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Buku = Buku::find($id_buku); 
        return view('buku.edit', compact('Buku'));
    }

    public function update(Request $request, $id_buku)
    {
        //melakukan validasi data
        $request->validate([
            'id_buku' => 'required',
            'Judul' => 'required',
            'Kategori' => 'required',
            'Penerbit' => 'required',
            'Pengarang' => 'required',
            'Jumlah' => 'required',
            'Status' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Buku::find($id_buku)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('buku.index')
        ->with('success', 'Buku Berhasil Diupdate'); 
        }

    public function destroy($id_buku)
    {
        //fungsi eloquent untuk menghapus data
        Buku::find($id_buku)->delete(); 
        return redirect()->route('buku.index') 
        -> with('success', 'Buku Berhasil Dihapus');
    }
};