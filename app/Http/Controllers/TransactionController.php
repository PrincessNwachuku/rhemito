<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller {

    //
    public function createTransaction(Request $request) {
        if ($request->service == 'transfer') {
          return $this->createTransferTransaction($request);  
        }
    }
    
    public function createTransferTransaction($request) {
        $user_id = $request->user_id;
        $recipient_name = $request->recipient_name;
        $recipient_bank = $request->recipient_bank;
        $recipient_phone = $request->recipient_phone;
        $recipient_email = $request->recipient_email;
        $amount = $request->amount;
        $recipient_account_number = $request->recipient_account_number;
        $purpose = $request->purpose;
        $service = $request->service;
        $transfer_fee = $request->transfer_fee;
        $reference = $request->reference;
//        $city = $request->city;
//        $address = $request->address;
//        $dob = $request->dob;
//        $postal_code = $request->postal_code;

        if ($user_id && $recipient_account_number && $amount && $recipient_bank && $recipient_email && $recipient_phone && $purpose && $recipient_name && $service) {
//            $transaction = Transaction::where("account_number", $account_number)->first();
//            if ($transaction) {
//                return "User Account already exists!";
//            } else {
            $transaction = new Transaction;
            $transaction->recipient_name = $recipient_name;
            $transaction->recipient_bank = $recipient_bank;
            $transaction->recipient_email = $recipient_email;
            $transaction->recipient_phone = $recipient_phone;
            $transaction->recipient_account_number = $recipient_account_number;
            $transaction->amount = $amount;
            $transaction->purpose = $purpose;
            $transaction->service = $service;
            $transaction->reference = $reference;
            $transaction->transfer_fee = $transfer_fee;
            $transaction->user_id = $user_id;
            $transaction->status = "pending";
            $transaction->save();
            $id = $transaction->id;
            $response = array("Success" => true, "id" => $id);
            return response()->json($response, 200);
            //}
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }

    public function getTransaction($service, $id) {
//        $transaction = Transaction::findorfail($id);
//        $response = array("success" => true, "transaction" => $transaction);
        //return response()->json($response, 200);
        if ($service == 'transfer') {
        return $this->getTransferTransaction($id);    
        }
    }

    public function getTransactions() {
        $transactions = Transaction::all();
        $response = array("success" => true, "transaction" => $transactions);
        return response()->json($response, 200);
    }

    public function getTransactionsByUserId($user_id) {
        $transactions = Transaction::all()->where('user_id', $user_id);
        $response = array("success" => true, "transactions" => $transactions);
        return response()->json($response, 200);
    }

    public function createAirtimeTransaction(Request $request) {
        $user_id = $request->user_id;
        $recipient_telco = $request->recipient_telco;
        $phone = $request->phone;
        $recipient_msisdn = $request->recipient_msisdn;
        $amount = $request->amount;
        if ($user_id && $recipient_telco && $amount && $phone && $recipient_msisdn) {
            $transaction = new Transaction;
            $transaction->user_id = $user_id;
            $transaction->recipient_telco = $recipient_telco;
            $transaction->amount = $amount;
            $transaction->phone = $phone;
            $transaction->recipient_msisdn = $recipient_msisdn;
            $transaction->save();
            $id = $transaction->id;
            $response = array("Success" => true, "id" => $id);
            return response()->json($response, 200);
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }
    
    public function createBillsTransaction(Request $request) {
        $user_id = $request->user_id;
        $recipient_service = $request->recipient_service;
        $recipient_service_product = $request->recipient_service_product;
        $recipient_customer_id = $request->recipient_customer_id;
        $amount = $request->amount;
        if ($user_id && $recipient_customer_id && $amount && $recipient_service && $recipient_service_product) {
            $transaction = new Transaction;
            $transaction->user_id = $user_id;
            $transaction->recipient_service = $recipient_service;
            $transaction->amount = $amount;
            $transaction->recipient_customer_id = $recipient_customer_id;
            $transaction->recipient_service_product = $recipient_service_product;
            $transaction->save();
            $id = $transaction->id;
            $response = array("Success" => true, "id" => $id);
            return response()->json($response, 200);
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }
    
    public function getTransferTransaction($id) {
        $transaction = Transaction::findorfail($id);
        $transactionData = array();
        $transactionData['recipient_name'] = $transaction->recipient_name;
        $transactionData['recipient_bank'] = $transaction->recipient_bank;
        $transactionData['recipient_email'] = $transaction->recipient_email;
        $transactionData['recipient_phone'] = $transaction->recipient_phone;
        $transactionData['recipient_account_number'] = $transaction->recipient_account_number;
        $transactionData['amount'] = $transaction->amount;
        $transactionData['purpose'] = $transaction->purpose;
        $transactionData['service'] = $transaction->service;
        $transactionData['reference'] = $transaction->reference;
        $transactionData['transfer_fee'] = $transaction->transfer_fee;
        $transactionData['status'] = $transaction->status;
        $transactionData['user'] = $transaction->user->name;
        $response = array("success" => true, "transaction" => $transactionData);
        return response()->json($response, 200);
    }

}
