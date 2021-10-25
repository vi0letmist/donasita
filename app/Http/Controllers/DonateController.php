<?php

namespace App\Http\Controllers;

use App\Donate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Jorenvh\Share\ShareFacade;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        $author = User::join('galadana', 'galadana.user_id', '=', 'users.id')
                ->where('users.id','=', $galadana->user_id)
                ->select('users.*')
                ->getQuery()
                ->first();
        $sumDonasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->where('donates.galadana_id','=',$galadana->id)
                ->select('galadana.*')
                ->getQuery()
                ->count();
        return view('donate.donasi', compact('galadana','author','sumDonasi'));
    }
    public function intruksi($id)
    {
        $donasi = Donate::where('id', $id)->first();
        $galadana = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                    ->where('galadana.id','=',$donasi->galadana_id)
                    ->select('galadana.*')
                    ->getQuery()
                    ->first();
        $author = User::join('galadana', 'galadana.user_id', '=', 'users.id')
                ->where('users.id','=', $galadana->user_id)
                ->select('users.*')
                ->getQuery()
                ->first();
        $sumDonasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->where('galadana.id','=',$donasi->galadana_id)
                ->select('galadana.*')
                ->getQuery()
                ->count();
        $twitter = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->judul)
                ->twitter()
                ->getRawLinks();
        $facebook = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->judul)
                    ->facebook()
                    ->getRawLinks();
        $reddit = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->judul)
                    ->reddit()
                    ->getRawLinks();
        $telegram = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->judul)
                    ->telegram()
                    ->getRawLinks();
        $whatsapp = ShareFacade::page('http://localhost:8000/g/'.$galadana->slug, $galadana->judul)
                    ->whatsapp()
                    ->getRawLinks();
        return view('donate.intruksi', compact('donasi','galadana','author', 'sumDonasi', 'twitter','facebook', 'reddit', 'telegram', 'whatsapp'));
    }
    public function buktiPembayaran($id)
    {
        $donasi = Donate::where('id', $id)->first();
        $galadana = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                    ->where('galadana.id','=',$donasi->galadana_id)
                    ->select('galadana.*')
                    ->getQuery()
                    ->first();
        $author = User::join('galadana', 'galadana.user_id', '=', 'users.id')
                ->where('users.id','=', $galadana->user_id)
                ->select('users.*')
                ->getQuery()
                ->first();
        $sumDonasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->where('galadana.id','=',$donasi->galadana_id)
                ->select('galadana.*')
                ->getQuery()
                ->count();
        return view('donate.bukti-pembayaran', compact('donasi','galadana','author', 'sumDonasi'));
    }
    public function konfirmasiDonasi($id)
    {
        $donasi = Donate::where('id', $id)->first();
        $galadana = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                    ->where('galadana.id','=',$donasi->galadana_id)
                    ->select('galadana.*')
                    ->getQuery()
                    ->first();
        $author = User::join('galadana', 'galadana.user_id', '=', 'users.id')
                ->where('users.id','=', $galadana->user_id)
                ->select('users.*')
                ->getQuery()
                ->first();
        $sumDonasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->where('galadana.id','=',$donasi->galadana_id)
                ->select('galadana.*')
                ->getQuery()
                ->count();
        return view('donate.konfirmasi-donasi', compact('donasi','galadana','author', 'sumDonasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'nominal' => 'required',
            'komen'=> 'nullable',
            'bukti_pembayaran' => 'nullable'
        ]);
        $donasi = new Donate();
        $donasi->nominal = $request->nominal;
        $donasi->nama = $request->nama;
        $donasi->email = $request->email;
        $donasi->komen = $request->komen;
        $donasi->status = 0;
        $donasi->anonim = $request->anonim;
        $donasi->galadana_id = $request->galadana_id;
        $donasi->batas_date = date('Y-m-d H:i:s', strtotime('+3 days'));
        $donasi->save();

        return redirect('donasi/intruksi/'. $donasi->id);
    }
    public function uploadBukti(Request $request, $id)
    {
        $this->validate($request, [
            'bukti_pembayaran' => 'required',
        ]);
        $donasi = Donate::findOrFail($id);
        $donasi->status = 1;
        if ($request->bukti_pembayaran != null) {
            $cover = Str::random(30) . $donasi->id . '.' . $request->file('bukti_pembayaran')->getClientOriginalExtension();
            $donasi->bukti_pembayaran = $cover;
        } else {
            $donasi->bukti_pembayaran = 'default.jpg';
        }

        if ($request->bukti_pembayaran != null) {
            $target = base_path('public/images');

            //code for remove old file
            if($donasi->donasi != ''  && $donasi->bukti_pembayaran != null){
                 $file_old = $target.$donasi->bukti_pembayaran;
                 unlink($file_old);
            }
            $request->file('bukti_pembayaran')->move($target, $cover);
        }

        $donasi->update();

        return redirect('/donasi/konfirmasi-donasi/'. $donasi->id)->withStatus(__('Bukti Pembayaran Berhasil di upload'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function show(Donate $donate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function edit(Donate $donate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donate $donate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donate $donate)
    {
        //
    }
}
