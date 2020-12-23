<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\Kategori;
use App\User;
use App\Donate;
use Illuminate\Support\Facades\DB;

class GaladanaController extends Controller
{
    public function index()
    {
        return view('campaign.index');
    }
    public function post($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        $author = User::join('galadana', 'galadana.user_id', '=', 'users.id')
                ->where('users.id','=', $galadana->user_id)
                ->select('users.*')
                ->getQuery()
                ->first();
        $donate = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where('donates.galadana_id','=', $galadana->id)
                ->select('donates.*')
                ->getQuery()
                ->get();
        $sideDonate = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where('donates.galadana_id','=', $galadana->id)
                ->select('donates.*')
                ->getQuery()
                ->latest()
                ->take(3)
                ->get();
                
        return view('campaign.post', compact('galadana','author','donate', 'sideDonate'));
    }
    public function kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        $galadana = Kategori::join('galadana', 'galadana.kategori_id', '=', 'kategori.id')
                ->where('kategori.id','=', $kategori->kategori_id)
                ->select('kategori.*', 'galadana.*')
                ->getQuery()
                ->first();
                
        return view('campaign.kategori', compact('galadana','kategori'));
    }
    function load_komen(Request $request, $id)
    {
        $galadana = Galadana::findOrFail($id);
        if($request->ajax())
        {
            if($request->id){
                $data = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where('donates.id','<',$request->id)
                ->select('donates.*')
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
            }
            else{
                $data = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where('donates.galadana_id', '=', $galadana->id)
                ->select('donates.*')->orderBy('id', 'DESC')->limit(5)->get();
            }
        }
        return view('get-donation-komen', compact('data'));
    }
    public function create()
    {
        return view('campaign.create-1');
    }
    public function edit($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        return view('campaign.edit', compact('galadana'));
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
