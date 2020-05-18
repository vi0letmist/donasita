<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return view('campaign.create-1');
    }
    public function create2()
    {
        return view('campaign.create-2');
    }
}
