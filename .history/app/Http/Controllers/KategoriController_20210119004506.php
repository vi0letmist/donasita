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
    public function edit($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        return view('admin.kategori.edit', compact('kategori'));
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

        return redirect()->route('manajemen-kategori.index')->withStatus(__('Kategori berhasil dibuat.'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cerita' => 'nullable'
        ]);
        $galadana = Galadana::find($id);
        $galadana->judul = $request->judul;
        $galadana->slug = $request->slug;
        $galadana->cerita = $request->cerita;
        $galadana->target_capaian = $request->target_capaian;

        if ($request->gambar != null) {
            $target = base_path('public/images');

            //code for remove old file
            if($galadana->galadana != ''  && $galadana->gambar != null){
                 $file_old = $target.$galadana->gambar;
                 unlink($file_old);
            }
            $cover = Str::random(30) . Auth::user()->id . '.' . $request->file('gambar')->getClientOriginalExtension();
            $galadana->gambar = $cover;
            $request->file('gambar')->move($target, $cover);
        } 
       
        $galadana->update();

        return redirect()->back()->withStatus(__('Penggalangan dana berhasil diupdate'));
    }
}
