<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Galadana;

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
        $galadana= Galadana::all();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->paginate(12);
        return view ('admin.post.index', compact('galadana'));
    }
    public function approvalpost()
    {
        return view ('admin.post.approval');
    }
    public function test()
    {
        return view ('admin.test');
    }
}
