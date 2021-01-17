<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(){
        $user = User::where('id', Auth::user()->id)->get();
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'komen' => 'nullable'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
       
        $user->update();

        return redirect()->back()->withStatus(__('Informasi Kamu berhasil diupdate'));
    }
}
