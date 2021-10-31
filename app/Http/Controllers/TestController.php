<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use DB;

class TestController extends Controller
{
    public function StateCityRecord()
    {
        $stateRecord = DB::table('state')->get();
        $cityRecode = DB::table('city')->get();
        return view('city',compact('stateRecord','cityRecode'));
    }
    
    public function index()
    {
        $state = DB::table('state')->get();
        return view('welcome', compact('state'));
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = DB::table('city')->where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
