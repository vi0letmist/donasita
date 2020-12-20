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
    function load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = Galadana::where('id', '<', $request->id)
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      else
      {
       $data = Galadana::orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
        $output .= '
        <div class="row">
         <div class="col-md-12">
          <h3 class="text-info"><b>'.$row->judul.'</b></h3>
          <p>'.$row->email.'</p>
          <br />
          <div class="col-md-6">
           <p><b>Publish Date - '.$row->created_at.'</b></p>
          </div>
          <div class="col-md-6" align="right">
           <p><b><i>By - '.$row->progres_capaian.'</i></b></p>
          </div>
          <br />
          <hr />
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
    public function load_more(Request $request, $id)
    {
        $galadana= Galadana::findOrFail($id);
        if($request->ajax())
        {
            if($request->id){
                $data = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where(['donates.galadana_id', '=', $galadana->id],
                ['id','<',$request->id]
                    )
                ->select('donates.*')
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->get();
            }
            else{
                $data = Galadana::join('donates', 'donates.galadana_id', '=', 'galadana.id')
                ->where('donates.galadana_id', '=', $galadana->id)
                ->select('donates.*')->orderBy('id', 'DESC')->limit(4)->get();
            }
        }
        return view('get-data', compact('data'));
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
