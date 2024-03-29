<?php

namespace App\Http\Controllers;

use App\Galadana;
use Illuminate\Http\Request;


class CampaignController extends Controller
{
    public function index($slug)
    {
        $galadana = Galadana::where('slug', $slug)->first();
        return view('load_more', compact('galadana'));
    }
    function load_data(Request $request, $id)
    {
        $galadana = Galadana::find($id);
     if($request->ajax())
     {
       $data = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
          ->where('donates.galadana_id', '=', $galadana->id)
          ->select('donates.*')
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
        $output .= '
        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                    <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                        <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 col-sm-8">
                    <p>'.$row->nama.'</p>
                    <div class="row padding-0">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul>
                                <li>
                                    <span class="weight-900">Rp. '.$row->nominal.'<!-- -->&nbsp;</span>
                                </li>
                                <li>
                                    <span class="lastdonate dot">14 jam yang lalu</span>
                                </li>
                            </ul>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        $last_id = $row->id;
       }
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
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
    public function edit()
    {
        return view('campaign.edit');
    }
    
}
