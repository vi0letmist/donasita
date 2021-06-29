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
        $latest = Galadana::latest()->where('status', '=', 1)->take(3)->get();
        $galadana = Galadana::latest()->where('status', '=', 1)->take(6)->get();
        // $donasi = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
        //         ->select('galadana.*','donates.created_at')
        //         ->latest('galadana.created_at')
        //         ->take(6)
        //         ->getQuery()
        //         ->get();
        return view('home', compact('latest', 'galadana'));
    }
}
