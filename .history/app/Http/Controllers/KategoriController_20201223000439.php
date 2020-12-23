<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.index');
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
