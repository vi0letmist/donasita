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
use Yajra\DataTables\DataTables;
use Jorenvh\Share\ShareFacade;

class GaladanaController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('campaign.index', compact('kategori'));
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
                ->latest()
                ->getQuery()
                ->get();
        $sideDonate = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where('donates.galadana_id','=', $galadana->id)
                ->select('donates.*')
                ->getQuery()
                ->latest()
                ->take(3)
                ->get();
        $twitter = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->title)
                ->twitter()
                ->getRawLinks();
        $facebook = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->title)
                    ->facebook()
                    ->getRawLinks();
        $reddit = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->title)
                    ->reddit()
                    ->getRawLinks();
        $telegram = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->title)
                    ->telegram()
                    ->getRawLinks();
        $whatsapp = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->title)
                    ->whatsapp()
                    ->getRawLinks();
        return view('campaign.post', compact('galadana','author','donate', 'sideDonate', 'twitter', 'facebook','reddit','telegram','whatsapp'));
    }
    public function kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();
        $galadana = Galadana::join('kategori', 'kategori.id', '=', 'galadana.kategori_id')
                ->where('galadana.kategori_id','=', $kategori->id)
                ->select('kategori.*', 'galadana.*')
                ->latest('galadana.created_at')
                ->getQuery()
                ->get();
        return view('campaign.kategori', compact('kategori', 'galadana'));
    }
    public function load_galadana(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        if($request->ajax())
        {
            if($request->id){
                $data = Kategori::join('galadana', 'galadana.kategori_id', '=', 'kategori.id')
                ->where('galadana.id','<',$request->id)
                ->select('galadana.*')
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->get();
            }
            else{
                $data = Kategori::join('galadana', 'galadana.kategori_id', '=', 'kategori.id')
                ->where('galadana.kategori_id', '=', $kategori->id)
                ->select('galadana.*')->orderBy('id', 'DESC')->limit(6)->get();
            }
        }
        return view('get-galadana-kategori', compact('data','kategori'));
    }
    public function load_komen(Request $request, $id)
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
        return view('get-donation-komen', compact('data','galadana'));
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('campaign.create', compact('kategori'));
    }
    public function edit($slug)
    {
        $galadana = Galadana::where('slug', $slug)
            ->where('user_id', Auth::user()->id)
            ->first();
        return view('campaign.edit', compact('galadana'));
    }
    public function show($slug)
    {
        $galadana = Galadana::where('slug', $slug)
            ->where('user_id', Auth::user()->id)
            ->first();
            
        DB::statement(DB::raw('set @rownum=0'));
        $donasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
            ->where('donates.galadana_id', '=', $galadana->id)
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'donates.*'
            ]);
        if(request()->ajax()) {
            return DataTables::of($donasi)
            ->addIndexColumn()
            ->editColumn('nominal', function($donasi){
                $rp = 'Rp';
                $nomin = $rp.number_format($donasi->nominal, 0, ',', '.');
                return $nomin;
            })
            ->editColumn('created_at', function($donasi){
                $date = \Carbon\Carbon::parse($donasi->created_at)->locale('id')->isoFormat('LLL');
                return $date;
            })
            ->addColumn('komen', function($donasi){
                $komen = (\Illuminate\Support\Str::limit(html_entity_decode($donasi->komen), $limit = 40, $end = "..."));
                return $komen;
            })
            ->rawColumns(['komen'])
            ->make(true);
        }
        return view('campaign.show', compact('galadana'));
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
        $galadana->kategori_id = $request->kategori;
        $galadana->user_id = Auth::user()->id;
        $galadana->save();

        if ($request->gambar != null) {
            $target = base_path('public/images');
            $request->file('gambar')->move($target, $cover);
        }

        return redirect('g/'.$galadana->slug)->withStatus(__('Penggalangan dana berhasil dibuat.'));
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

    public function tost()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'galadana.judul' , 'galadana.cerita','users.name', 'galadana.created_at', 'galadana.status'
            ]);
        if(request()->ajax()) {
            return DataTables::of($galadana)
            ->addIndexColumn()
            ->addColumn('cerita', function($galadana){
                $cerita = (\Illuminate\Support\Str::limit(html_entity_decode($galadana->cerita), $limit = 40, $end = "..."));
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
            ->addColumn('action', function($data){
                   $editUrl = url('edit-todo/'.$data->id);
                   $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';

                   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';

                    return $btn;
            })
            ->rawColumns(['cerita', 'status', 'action'])
            ->make(true);
        }
        
        return view('test');
    }
    public function delete($id)
    {
        Galadana::destroy($id);
        return redirect()->back()->withStatus(__('Galadana berhasil dihapus'));
    }
}
