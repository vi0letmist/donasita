<?php

namespace App\Http\Controllers;

use App\Donate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest = Galadana::where('status', '=', 1)->get();
        $popularity = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->selectRaw('galadana_id, count(*) as gonCount')
                ->where('galadana.status', 1)
                ->where('donates.status', 2)
                ->groupBy('galadana_id')
                ->orderBy('gonCount', 'desc')
                ->pluck('galadana_id');
        $galadana = Galadana::latest()->where('status', '=', 1)->take(6)->get();
        $donasi = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->select('galadana.id','donates.*')
                ->where('donates.status', 2)
                ->latest('donates.updated_at')
                ->getQuery()
                ->get();
        $don = $donasi->countBy(function($item){
            return $item->galadana_id;
        });

        // dd($son);
        $sumDonasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                ->where('donates.status', 2)
                ->select('galadana.*')
                ->getQuery()
                ->count();
        return view('home', compact('latest', 'galadana','donasi', 'sumDonasi','popularity'));
    }
}
