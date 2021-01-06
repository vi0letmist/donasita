<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
    public function managepost()
    {
        $galadana= Galadana::all();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->paginate(12);
        return view ('admin.post.index', compact('galadana'));
    }
    public function edit($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        return view('admin.post.edit', compact('galadana'));
    }
    public function approvalpost()
    {
        $galadana= Galadana::all();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->paginate(9);
        return view ('admin.post.approval', compact('galadana'));
    }
    public function declinepost()
    {
        $galadana= DataTables::collect(Galadana::all())->get();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->paginate(9);
        return view('admin.post.declines', compact('galadana'));
    }
    public function approve($id)
    {
        $galadana = Galadana::findOrFail($id);
        $galadana->status = 1;
        $galadana->save();
        return redirect()->back()->withStatus(__('approve'));
    }
    public function decline($id)
    {
        $galadana = Galadana::findOrFail($id);
        $galadana->status = 0;
        $galadana->save();
        return redirect()->back()->withStatus(__('decline'));
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
    public function test()
    {
        return view ('admin.test');
    }
}
