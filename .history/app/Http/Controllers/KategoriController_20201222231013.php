<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.index');
    }
    public function create()
    {
        return view('admin.kategori.create');
    }
}
