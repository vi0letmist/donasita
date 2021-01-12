<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Galadana;
use App\Kategori;
use App\User;
use App\Donate;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KelolaController extends Controller
{
    public function index{
        $galadana = Galadana::where('user_id', Auth::user()->id)->get();
        return view('campaign.kelola', compact('galadana'));
    }
    
    public function kelola()
    {
        $galadana = Galadana::where('user_id', Auth::user()->id)->get();
        return view('campaign.kelola', compact('galadana'));
    }
}
