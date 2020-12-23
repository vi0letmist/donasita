<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('admin.kategori.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'gambar' => 'required',
        ]);
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->slug = Str::slug($request->nama);
        if ($request->gambar != null) {
            $cover = Str::random(30) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $kategori->gambar = $cover;
        } else {
            $kategori->gambar = 'defaultKategori.jpg';
        }
        
        $kategori->save();

        if ($request->gambar != null) {
            $target = base_path('public/images');
            $request->file('gambar')->move($target, $cover);
        }

        return redirect()->route('admin.kategori.index')->withStatus(__('Kategori berhasil dibuat.'));
    }
}
