<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beneficiary;
use App\User;

class BeneficiaryController extends Controller {

    //

    public function createTransferBeneficiary(Request $request) {
        $user_id = $request->user_id;
        $recipient_name = $request->recipient_name;
        $recipient_bank = $request->recipient_bank;
        $recipient_phone = $request->recipient_phone;
        $recipient_email = $request->recipient_email;
        $recipient_account_number = $request->recipient_account_number;

        if ($user_id && $recipient_account_number && $recipient_bank && $recipient_email && $recipient_phone && $recipient_name) {
            $beneficiary = Beneficiary::where("recipient_account_number", $recipient_account_number)->first();
            if ($beneficiary) {
                return "Beneficiary already exists!";
            } else {
                $beneficiary = new Beneficiary;
                $beneficiary->recipient_name = $recipient_name;
                $beneficiary->recipient_bank = $recipient_bank;
                $beneficiary->recipient_email = $recipient_email;
                $beneficiary->recipient_phone = $recipient_phone;
                $beneficiary->recipient_account_number = $recipient_account_number;
                $beneficiary->user_id = $user_id;
                $beneficiary->save();
                $id = $beneficiary->id;
                $response = array("Success" => true, "id" => $id);
                return response()->json($response, 200);
            }
            $response = array("Success" => false, "message" => 'Invalid Input');
            return response()->json($response, 200);
        }
    }

    public function getBeneficiary($id) {
        $beneficiary = Beneficiary::findorfail($id);
        $response = array("success" => true, "beneficiary" => $beneficiary);
        return response()->json($response, 200);
    }

    public function getBeneficiariesByUserId($user_id) {
        $user = User::where('id', $user_id)->first();
        $beneficiaries = $user->beneficiaries()->get();        
        $response = array("success" => true, "beneficiaries" => $beneficiaries);
        return response()->json($response, 200);
    }
    
    public function createAirtimeBeneficiary(Request $request) {
        $user_id = $request->user_id;
        $recipient_telco = $request->recipient_telco;
        $phone = $request->phone;
        $recipient_msisdn = $request->recipient_msisdn;
        $amount = $request->amount;
        if ($user_id && $recipient_telco && $amount && $phone && $recipient_msisdn) {
            $beneficiary = new Beneficiary;
            $beneficiary->user_id = $user_id;
            $beneficiary->recipient_telco = $recipient_telco;
            $beneficiary->amount = $amount;
            $beneficiary->phone = $phone;
            $beneficiary->recipient_msisdn = $recipient_msisdn;
            $beneficiary->save();
            $id = $beneficiary->id;
            $response = array("Success" => true, "id" => $id);
            return response()->json($response, 200);
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }
    
    public function createBillsBeneficiary(Request $request) {
        $user_id = $request->user_id;
        $recipient_service = $request->recipient_service;
        $recipient_service_product = $request->recipient_service_product;
        $recipient_customer_id = $request->recipient_customer_id;
        $amount = $request->amount;
        if ($user_id && $recipient_customer_id && $amount && $recipient_service && $recipient_service_product) {
            $beneficiary = new Beneficiary;
            $beneficiary->user_id = $user_id;
            $beneficiary->recipient_service = $recipient_service;
            $beneficiary->amount = $amount;
            $beneficiary->recipient_customer_id = $recipient_customer_id;
            $beneficiary->recipient_service_product = $recipient_service_product;
            $beneficiary->save();
            $id = $beneficiary->id;
            $response = array("Success" => true, "id" => $id);
            return response()->json($response, 200);
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }


}
