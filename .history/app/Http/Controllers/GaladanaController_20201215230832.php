<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\User;
use App\Donate;

class GaladanaController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function post(Request $request,$slug)
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
                if($request->ajax())
                {
                 if($request->id > 0)
                 {
                  $data = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                     ->where('donates.galadana_id','=', $galadana->id)
                     ->orderBy('id', 'DESC')
                     ->limit(5)
                     ->get();
                 }
                 else
                 {
                  $data = Galadana::orderBy('id', 'DESC')
                     ->limit(5)
                     ->get();
                 }
                 $output = '';
                 $last_id = '';
                 
                 if(!$data->isEmpty())
                 {
                  foreach($data as $row)
                  {
                   $output .= '
                   <div class="row">
                    <div class="col-md-12">
                     <h3 class="text-info"><b>'.$row->post_title.'</b></h3>
                     <p>'.$row->post_description.'</p>
                     <br />
                     <div class="col-md-6">
                      <p><b>Publish Date - '.$row->date.'</b></p>
                     </div>
                     <div class="col-md-6" align="right">
                      <p><b><i>By - '.$row->author.'</i></b></p>
                     </div>
                     <br />
                     <hr />
                    </div>         
                   </div>
                   ';
                   $last_id = $row->id;
                  }
                  $output .= '
                  <div id="load_more">
                   <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
                  </div>
                  ';
                 }
                 else
                 {
                  $output .= '
                  <div id="load_more">
                   <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
                  </div>
                  ';
                 }
                 echo $output;
                }
        return view('campaign.post', compact('galadana','author','donate', 'sideDonate'));
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