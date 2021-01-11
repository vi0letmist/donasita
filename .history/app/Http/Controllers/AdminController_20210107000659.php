<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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
        DB::statement(DB::raw('set @rownum=0'));
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->where('galadana.status', '=', 1)
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
            ->addColumn('action', function($galadana){
                $editUrl = route('manajemen-post.edit', $galadana->slug);
                $btn = '<a href="'.$editUrl.'">
                <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
                </a>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info"><i class="pe-7s-info btn-icon-wrapper"> </i></button>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger deleteGaladana"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>';
                return $btn;
            })
            ->rawColumns(['cerita', 'status', 'action'])
            ->make(true);
        }
        return view ('admin.post.index');
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
            ->get();
        return view ('admin.post.approval', compact('galadana'));
    }
    public function declinepost()
    {
        $galadana= Galadana::all();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->get();
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
        if(request()->ajax()) {
            return DataTables::of(Galadana::select([
                'id','judul','slug','created_at'
            ]))
            ->addIndexColumn()
            ->addColumn('action', function($data){
                   
                   $editUrl = url('edit-todo/'.$data->id);
                   $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';

                   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';

                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view ('admin.test');
    }
}