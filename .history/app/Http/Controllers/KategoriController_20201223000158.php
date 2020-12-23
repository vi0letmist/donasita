<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'judul' => 'required',
            'target_capaian' => 'required',
            'gambar' => 'required',
            'status'=> 'nullable'
        ]);
        $galadana = new Galadana();
        $galadana->judul = $request->judul;
        $galadana->slug = Str::slug($request->judul);
        if ($request->gambar != null) {
            $cover = Str::random(30) . Auth::user()->id . '.' . $request->file('gambar')->getClientOriginalExtension();
            $galadana->gambar = $cover;
        } else {
            $galadana->gambar = 'default.jpg';
        }
        $galadana->cerita = $request->cerita;
        $galadana->target_capaian = $request->target_capaian;
        $galadana->progres_capaian = 0;
        $galadana->status = 0;
        $galadana->user_id = Auth::user()->id;
        $galadana->save();

        if ($request->gambar != null) {
            $target = base_path('public/images');
            $request->file('gambar')->move($target, $cover);
        }

        return redirect()->route('campaign.index')->withStatus(__('Penggalangan dana berhasil dibuat.'));
    }
}
