<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller {

    //
    public function addCountry(Request $request) {
        $country_name = $request->country_name; 
        $flag_path = "hhh";
        $currency_symbol = $request->currency_symbol;
        if ($country_name && $currency_symbol) {
            $country = Country::where("country_name", $country_name)->first();
            if ($country) {
                return "Country has already been added!";
            } else {
                $country = new Country;
                $country->country_name = $country_name;
                $country->flag_path = $flag_path;
                $country->currency_symbol = $currency_symbol;
                $country->save();
                $id = $country->id;
            $response = array("Success" => true, "id" => $id);
                return response()->json($response, 200);
            }
        }
        $response = array("Success" => false, "message" => 'Please Input a Country Name!');
        return response()->json($response, 200);
    }
    
    public function getCountries() {
        $countries = Country::all();
        $response = array("Success" => true, "data" => $countries);
        return response()->json($response, 200);
    }
    
     public function getCountry($id) {
        $country = Country::findorfail($id);
        $response = array("success" => true, "country" => $country);
        return response()->json($response, 200);
    }

}
