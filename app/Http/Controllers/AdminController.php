<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Galadana;
use App\Donate;
use App\Kategori;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Rules\MatchOldPassword;

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
        $galadana = Galadana::where('status', '=', 1)->count();
        $donasi = Donate::where('status', '=', 2)->sum('donates.nominal');
        $donatur = Donate::where('status', '=', 2)->count();
        $label  = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober",
        "November","Desember"];
        for($bulan=1;$bulan < 13;$bulan++){
            $chartuser     = collect(Galadana::whereMonth('created_at',$bulan)->count())->first();
            $jumlah_galadana[] = $chartuser;
            }
        return view('admin.index', compact('galadana','donasi','donatur','label','jumlah_galadana'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function manageDonasi()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $donasi =  Donate::where('donates.status','=', 2)
                ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'donates.*'
            ])->get();
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
            ->addColumn('status', function($donasi){
                if($donasi->status == 0){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Tertunda</div>';
                    return $status;
                }
                elseif($donasi->status == 1){
                    $status = '<div class="mb-2 mr-2 badge badge-primary">Menunggu Konfirmasi</div>';
                    return $status;
                }
                elseif($donasi->status == 2){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Berhasil</div>';
                    return $status;
                }
                elseif($donasi->status == 3){
                    $status = '<div class="mb-2 mr-2 badge badge-danger">Batal</div>';
                    return $status;
                }
            })
            ->addColumn('komen', function($donasi){
                $komen = (\Illuminate\Support\Str::limit(html_entity_decode($donasi->komen), $limit = 40, $end = "..."));
                return $komen;
            })
            ->addColumn('action', function($donasi){
                $btn = '<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal'.$donasi->id.'">
                <i class="pe-7s-info btn-icon-wrapper"> </i>
                </button>';
                return $btn;
            })
            ->rawColumns(['komen', 'status','action'])
            ->make(true);
        }
        $donate = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->join('users', 'users.id', '=', 'galadana.user_id')
                ->select('donates.*', 'galadana.judul', 'users.name')
                ->get();
        return view ('admin.donasi.index', compact('donate'));
    }
    public function manageDonasi2()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $donasi = Donate::where('donates.status','=',1)
                ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'donates.*'
            ])->get();
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
            ->addColumn('status', function($donasi){
                if($donasi->status == 0){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Tertunda</div>';
                    return $status;
                }
                elseif($donasi->status == 1){
                    $status = '<div class="mb-2 mr-2 badge badge-primary">Menunggu Konfirmasi</div>';
                    return $status;
                }
                elseif($donasi->status == 2){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Berhasil</div>';
                    return $status;
                }
                elseif($donasi->status == 3){
                    $status = '<div class="mb-2 mr-2 badge badge-danger">Batal</div>';
                    return $status;
                }
            })
            ->addColumn('komen', function($donasi){
                $komen = (\Illuminate\Support\Str::limit(html_entity_decode($donasi->komen), $limit = 40, $end = "..."));
                return $komen;
            })
            ->addColumn('action', function($donasi){
                $btn = '<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal'.$donasi->id.'">
                <i class="pe-7s-info btn-icon-wrapper"> </i>
                </button>';
                return $btn;
            })
            ->rawColumns(['komen', 'status','action'])
            ->make(true);
        }
    }
    public function manageDonasi3()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $donasi =   Donate::where('donates.status','=',3)
                ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'donates.*',
            ])->get();
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
            ->addColumn('status', function($donasi){
                if($donasi->status == 0){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Tertunda</div>';
                    return $status;
                }
                elseif($donasi->status == 1){
                    $status = '<div class="mb-2 mr-2 badge badge-primary">Menunggu Konfirmasi</div>';
                    return $status;
                }
                elseif($donasi->status == 2){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Berhasil</div>';
                    return $status;
                }
                elseif($donasi->status == 3){
                    $status = '<div class="mb-2 mr-2 badge badge-danger">Batal</div>';
                    return $status;
                }
            })
            ->addColumn('komen', function($donasi){
                $komen = (\Illuminate\Support\Str::limit(html_entity_decode($donasi->komen), $limit = 40, $end = "..."));
                return $komen;
            })
            ->addColumn('action', function($donasi){
                $btn = '<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal'.$donasi->id.'">
                <i class="pe-7s-info btn-icon-wrapper"> </i>
                </button>';
                return $btn;
            })
            ->rawColumns(['komen', 'status', 'action'])
            ->make(true);
        }
    }
    public function konfirmasiDonasi()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $donasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->join('users', 'users.id', '=', 'galadana.user_id')
                ->where('donates.status','=',1)
                ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'donates.*', 'galadana.judul', 'users.name'
            ])->get();
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
            })->addColumn('status', function($donasi){
                if($donasi->status == 0){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Tertunda</div>';
                    return $status;
                }
                elseif($donasi->status == 1){
                    $status = '<div class="mb-2 mr-2 badge badge-primary">Menunggu Konfirmasi</div>';
                    return $status;
                }
                elseif($donasi->status == 2){
                    $status = '<div class="mb-2 mr-2 badge badge-success">Berhasil</div>';
                    return $status;
                }
                elseif($donasi->status == 3){
                    $status = '<div class="mb-2 mr-2 badge badge-danger">Batal</div>';
                    return $status;
                }
            })
            ->addColumn('action', function($donasi){
                $btn = '<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal'.$donasi->id.'">
                <i class="pe-7s-info btn-icon-wrapper"> </i>
                </button>';
                return $btn;
            })
            ->rawColumns(['komen', 'action', 'status'])
            ->make(true);
        }
        return view ('admin.donasi.konfirmasi-donasi', compact('donasi'));
    }
    public function approveDonasi($id)
    {
        $donasi = Donate::findOrFail($id);
        $donasi->status = 2;
        $donasi->update();
        $galadana = Galadana::findOrFail($donasi->galadana_id);
        $galadana->progres_capaian = ($galadana->progres_capaian + $donasi->nominal);
        $galadana->update();
        return redirect()->back()->withStatus(__('Donasi disetujui'));
    }
    public function declineDonasi($id)
    {
        $donasi = Donate::findOrFail($id);
        $donasi->status = 3;
        $donasi->update();
        return redirect()->back()->withStatus(__('Donasi ditolak'));
    }

    public function managepost()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->where('galadana.status', '=', 1)
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
                $cerita = $input.'<div class="desc-ngitem">'.(\Illuminate\Support\Str::limit(html_entity_decode($galadana->cerita), $limit = 40, $end = "...")).'</div>';
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
        return view ('admin.post.index');
    }
    public function poststatus2()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->where('galadana.status', '=', 2)
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'galadana.*','users.name'
            ]);
        if(request()->ajax()) {
            return DataTables::of($galadana)
            ->filter(function ($query){
                if (request()->has('judul')){
                    $query->where('judul','like',"%" . request('judul') . "%");
                }
            })
            ->addIndexColumn()
            ->editColumn('created_at', function($galadana){
                $date = \Carbon\Carbon::parse($galadana->created_at)->locale('id')->isoFormat('LLL');
                return $date;
            })
            ->addColumn('cerita', function($galadana){
                $input = '<input type="hidden" class="deleteGaladanaId" value="'.$galadana->id.'">';
                $cerita = $input.'<div class="desc-ngitem">'.(\Illuminate\Support\Str::limit(html_entity_decode($galadana->cerita), $limit = 40, $end = "...")).'</div>';
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
    }
    public function edit($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        $kategori = Kategori::all();
        return view('admin.post.edit', compact('galadana','kategori'));
    }
    public function show($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
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
        return view('admin.post.show', compact('galadana'));
    }
    public function approvalpost()
    {
        $galadana= Galadana::all();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->whereNull('galadana.status')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->get();
        return view ('admin.post.approval', compact('galadana'));
    }
    public function declinepost()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->where('galadana.status', '=', 0)
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'galadana.*','users.name'
            ]);
        if(request()->ajax()) {
            return DataTables::of($galadana)
            ->filter(function ($query){
                if (request()->has('judul')){
                    $query->where('judul','like',"%" . request('judul') . "%");
                }
            })
            ->addIndexColumn()
            ->editColumn('created_at', function($galadana){
                $date = \Carbon\Carbon::parse($galadana->created_at)->locale('id')->isoFormat('LLL');
                return $date;
            })
            ->addColumn('cerita', function($galadana){
                $input = '<input type="hidden" class="deleteGaladanaId" value="'.$galadana->id.'">';
                $cerita = $input.'<div class="desc-ngitem">'.(\Illuminate\Support\Str::limit(html_entity_decode($galadana->cerita), $limit = 40, $end = "...")).'</div>';
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
    }
    public function approve($id)
    {
        $galadana = Galadana::findOrFail($id);
        $galadana->status = 1;
        $galadana->save();
        return redirect()->back()->withStatus(__('Galadana disetujui'));
    }
    public function decline($id)
    {
        $galadana = Galadana::findOrFail($id);
        $galadana->status = 0;
        $galadana->save();
        return redirect()->back()->withStatus(__('Galadana ditolak'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cerita' => 'nullable'
        ]);
        $galadana = Galadana::findOrFail($id);
        $galadana->judul = $request->judul;
        $galadana->slug = $request->slug;
        $galadana->cerita = $request->cerita;
        $galadana->target_capaian = $request->target_capaian;
        $galadana->kategori_id = $request->kategori;

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

        return redirect('/manajemen-post')->withStatus(__('Penggalangan dana berhasil diupdate'));
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
    public function userpengguna()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $user = User::where('role', '=', 'pengguna')
                ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'users.*'
            ]);
        if(request()->ajax()) {
            return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function($user){
                $input = '<input type="hidden" class="deleteUserId" value="'.$user->id.'">';
                $editUrl = route('manajemen-user.edit', $user->id);
                $btn = $input.'<a href="'.$editUrl.'">
                <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
                </a>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal'.$user->id.'">
                <i class="pe-7s-info btn-icon-wrapper"> </i>
                </button>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger deleteUser"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
    public function manajemenuser()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $user = User::where('role', '=', 'admin')
                ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'users.*'
            ]);
        if(request()->ajax()) {
            return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function($user){
                $input = '<input type="hidden" class="deleteUserId" value="'.$user->id.'">';
                $editUrl = route('manajemen-user.edit', $user->id);
                $btn = $input.'<a href="'.$editUrl.'">
                <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
                </a>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal'.$user->id.'">
                <i class="pe-7s-info btn-icon-wrapper"> </i>
                </button>';
                $btn = $btn.'<button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger deleteUser"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $userAll = User::all();
        return view ('admin.user.index', compact('userAll'));
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'no_hp' => 'nullable',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->role = $request->role;

        if ($request->foto_profil != null) {
            $target = base_path('public/assets/images/avatars');

            //code for remove old file
            if($user->user != ''  && $user->foto_profil != null){
                 $file_old = $target.$user->foto_profil;
                 unlink($file_old);
            }
            $cover = Str::random(30) . Auth::user()->id . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $user->foto_profil = $cover;
            $request->file('foto_profil')->move($target, $cover);
        }

        $user->update();

        return redirect('/manajemen-user')->withStatus(__('User berhasil diupdate'));
    }
    public function ganSandi(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.ganti-sandi', compact('user'));
    }
    public function changePass(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/profil')->withStatus(__('Kata sandi berhasil diubah'));
    }
}
