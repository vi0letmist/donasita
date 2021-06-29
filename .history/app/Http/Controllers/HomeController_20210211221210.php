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
        $latest = Galadana::latest()->take(3)->get();
        $galadana = Galadana::latest()->take(6)->get();
        $donasi = $donasi = Donate::join('galadana', 'galadana.id','=', 'donates.galadana_id')
                    ->where('donates.galadana_id', '=', 2)
                    ->select('galadana.*','donates.created_at')
                    ->getQuery()->get();
        dd($donasi-);
        return view('home', compact('latest', 'galadana','donasi'));
    }
}
