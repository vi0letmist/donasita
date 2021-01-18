<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Kategori;
use App\Galadana;

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
    public function show($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        DB::statement(DB::raw('set @rownum=0'));
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->where('galadana.status', '=', 1)
            ->where('galadana.kategori_id', '=',$kategori->id)
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'galadana.*','users.name'
            ]);
        if(request()->ajax()) {
            return DataTables::of($galadana)
            ->addIndexColumn()
            ->editColumn('created_at', function($galadana){
                $date = \Carbon\Carbon::parse($galadana->created_at)->locale('id')->isoFormat('LLL');
                return $date;
            })
            ->addColumn('cerita', function($galadana){
                $input = '<input type="hidden" class="deleteGaladanaId" value="'.$galadana->id.'">';
                $cerita = $input.(\Illuminate\Support\Str::limit(html_entity_decode($galadana->cerita), $limit = 40, $end = "..."));
                return $cerita;
            })
            ->addColumn('status', function($galadana){
                if($galadana->status == 1){
                $status = '<div class="mb-2 mr-2 badge badge-success">Berjalan</div>';
                    return $status;    
                }
                elseif($galadana->status == 2){
                    $status = '<div class="mb-2 mr-2 badge badge-primary">Selesai</div>';
                    return $status; 
                }
                elseif($galadana->status == 0){
                $status = '<div class="mb-2 mr-2 badge badge-danger">Tidak Disetujui</div>';
                return $status;
                }
            })
            ->addColumn('action', function($galadana){
                $editUrl = route('manajemen-post.edit', $galadana->slug);
                $showUrl = route('manajemen-post.show', $galadana->slug);
                $btn = '<a href="'.$editUrl.'">
                <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
                </a>';
                $btn = $btn.'<a href="'.$showUrl.'">
                <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info"><i class="pe-7s-info btn-icon-wrapper"> </i></button>
                </a>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger deleteGaladana"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>';
                return $btn;
            })
            ->rawColumns(['cerita', 'status', 'action'])
            ->make(true);
        }
        return view('admin.kategori.show', compact('kategori'));
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
            'nama' => 'required'
        ]);
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->slug = $request->slug;

        if ($request->gambar != null) {
            $target = base_path('public/images');

            //code for remove old file
            if($kategori->kategori != ''  && $kategori->gambar != null){
                 $file_old = $target.$kategori->gambar;
                 unlink($file_old);
            }
            $cover = Str::random(30) . Auth::user()->id . '.' . $request->file('gambar')->getClientOriginalExtension();
            $kategori->gambar = $cover;
            $request->file('gambar')->move($target, $cover);
        } 
       
        $kategori->update();

        return redirect()->route('manajemen-kategori.index')->withStatus(__('Kategori berhasil diupdate'));
    }
}
