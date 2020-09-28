<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return view('campaign.galang-dana');
    }
    public function create1()
    {
        return view('campaign.create-1');
    }
    public function create2()
    {
        return view('campaign.create-2');
    }
    public function create3()
    {
        return view('campaign.create-3');
    }
}
