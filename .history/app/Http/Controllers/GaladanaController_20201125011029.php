<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\User;

class GaladanaController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function post($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        $author = User::join('galadana', 'galadana.user_id', '=', 'users.id')
                ->where('users.id','=', $galadana->user_id)
                ->select('users.*')
                ->getQuery()
                ->first();
        return view('campaign.post', compact('galadana','author'));
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
            'gambar' => 'nullable',
            'cerita' => 'nullable'
        ]);
        $galadana = Galadana::find($id);
        $galadana->judul = $request->judul;
        $galadana->slug = Str::slug($request->judul);
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
        } else {
            $galadana->gambar = $request->gambar;
        }
       
        $galadana->update();

        return redirect()->route('campaign.index')->withStatus(__('Penggalangan dana berhasil diupdate'));
    }
}
