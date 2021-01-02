<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galadana;

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
        $galadana= Galadana::all();
        $galadana = galadana::join('users', 'users.id','=', 'galadana.user_id')
            ->select('users.*', 'galadana.*')
            ->orderBy('galadana.created_at','desc')
            ->paginate(9);
        return view ('admin.post.approval', compact('galadana'));
    }
    public function approve($id)
    {
        $galadana = Galadana::findOrFail($id);
        $galadana->status = 1;
        $galadana->save();
        return redirect()->back()->withStatus('approve');
    }
    public function test()
    {
        return view ('admin.test');
    }
}
