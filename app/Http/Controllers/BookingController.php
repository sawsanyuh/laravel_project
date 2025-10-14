<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
      public function myBookings(Request $request,$n){
        //return view('welcomeName')->with('requestName',$n);
        return response()->json(["data"=>["name"=>$n]]);
    }
}
