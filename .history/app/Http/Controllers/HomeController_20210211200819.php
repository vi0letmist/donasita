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
        $donasi = Galadana::latest()->take(6)->get();
        $galadana = Galadana::join('donates','donates.galadana_id','=','galadana.id')
                    ->select('galadana.*','donates.created_at')
                    ->latest('galadana.created_at')->take(6)->get();
        return view('home', compact('latest', 'galadana','donasi'));
    }
}
