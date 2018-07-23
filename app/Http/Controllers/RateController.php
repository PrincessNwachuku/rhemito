<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use Illuminate\Support\Facades\DB;

class RateController extends Controller {

    //
    public function addRate(Request $request) {
        $from_country = $request->from_country;        
        $to_country = $request->to_country;        
        $rates = $request->rate;
        $transfer_fee = $request->transfer_fee;         
        if ($from_country && $to_country && $rates && $transfer_fee) {
//            $rate = Rate::where("rate_name", $rate_name)->first();
//            if ($rate) {
//                return "Rate has already been added!";
//            } else {
                $rate = new Rate;
                $rate->from_country = $from_country;
                $rate->to_country = $to_country;
                $rate->rate = $rates;
                $rate->transfer_fee = $transfer_fee;
                $rate->save();
                $id = $rate->id;
            $response = array("Success" => true, "id" => $id);
                return response()->json($response, 200);
            //}
        }
        $response = array("Success" => false, "message" => 'Invalid Output!');
        return response()->json($response, 200);
    }
    
//    public function getRates() {
//        $rates = Rate::all();
//        $response = array("Success" => true, "data" => $rates);
//        return response()->json($response, 200);
//    }
    
//     public function getRate($from, $to) {
//        $rate = Rate::where('from_country', $from)->where('to_country', $to)->get();
//        if (!empty($rate)){
//            $response = array("success" => true, "rate"=> print_r($rate), "value" => $rate);
//        return response()->json($response, 200);
//        }
//        $response = array("success" => false);
//        return response()->json($response, 200);
//    }
    
     public function getRate(Request $request) {
        $from_country = $request->from_country;        
        $to_country = $request->to_country;
        
        $rate = Rate::where('from_country', $from_country)->where('to_country', $to_country)->get();
        if (!empty($rate)){
            $response = array("success" => true, "rate"=> print_r($rate), "value" => $rate);
        return response()->json($response, 200);
        }
        $response = array("success" => false);
        return response()->json($response, 200);
    }

}
