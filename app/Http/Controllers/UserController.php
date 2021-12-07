<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('users.edit', compact('user'));
    }
    public function gantiPassword(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('users.reset-password', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'komen' => 'nullable',
            'password' => 'nullable',
            'role' => 'nullable',
            'foto_profil' => 'nullable'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->foto_profil != null) {
            $target = base_path('public/assets/images/avatars');

            //code for remove old file
            if($user->user != ''  && $user->foto_profil != null){
                 $file_old = $target.$user->foto_profil;
                 unlink($file_old);
            }
            $cover = Str::random(30) . Auth::user()->id . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $user->foto_profil = $cover;
            $request->file('foto_profil')->move($target, $cover);
        }
        $user->role = $request->role;
        $user->no_hp = $request->no_hp;

        $user->update();

        return redirect()->back()->withStatus(__('Informasi Kamu berhasil diupdate'));
    }

    public function store(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/kelola/umum')->withStatus(__('Kata sandi berhasil diubah'));
    }
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->back()->withStatus(__('User berhasil dihapus'));
    }
}
