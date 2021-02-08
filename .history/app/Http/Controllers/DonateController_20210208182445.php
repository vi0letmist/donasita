<?php

namespace App\Http\Controllers;

use App\Donate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\User;

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
    public function adminIndex()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $donasi = Donate::select([
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
            ->addColumn('komen', function($donasi){
                $komen = (\Illuminate\Support\Str::limit(html_entity_decode($donasi->komen), $limit = 40, $end = "..."));
                return $komen;
            })
            ->rawColumns(['komen'])
            ->make(true);
        }
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
        return view('donate.intruksi', compact('donasi','galadana','author', 'sumDonasi'));
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
            'komen'=> 'nullable'
        ]);
        $donasi = new Donate();
        $donasi->nominal = $request->nominal;
        $donasi->nama = $request->nama;
        $donasi->email = $request->email;
        $donasi->komen = $request->komen;
        $donasi->anonim = $request->anonim;
        $donasi->galadana_id = $request->galadana_id;
        $donasi->batas_date = date('Y-m-d H:i:s', strtotime('+3 days'));
        $donasi->save();

        $galadana = Galadana::find($donasi->galadana_id);
        $galadana->progres_capaian = ($galadana->progres_capaian + $donasi->nominal);
        $galadana->update();
        return redirect('donasi/intruksi/'. $donasi->id);
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
