<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAccount;

class UserAccountController extends Controller
{
    //
    public function addUserAccount(Request $request) {
        $bank_name = $request->bank_name;
        //$account_name = $request->account_name;
        $account_number = $request->account_number;
        $user_id = $request->user_id;
        
        if ($bank_name && $account_number) {
            $user_account = UserAccount::where("account_number", $account_number)->first();
            if ($user_account) {
                return "User Account already exists!";
            } else {
                $user_account = new UserAccount;
                $user_account->bank_name = $bank_name;
               // $user_account->account_name = $account_name;
                $user_account->account_number = $account_number;
                $user_account->user_id = $user_id;            
                $user_account->save();
                $id = $user_account->id;
                $response = array("Success" => true, "id" => $id);
                return response()->json($response, 200);
            }
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }
    
    public function getUserAccount($id) {
        $user_account = UserAccount::findorfail($id);
        $response = array("success" => true, "user_account" => $user_account);
        return response()->json($response, 200);
    }
    
    public function getAccountsByUserId($user_id) {
        $user_account = UserAccount::all()->where('user_id', $user_id);
        $response = array("success" => true, "user_account" => $user_account);
        return response()->json($response, 200);
    }
    
    public function getAccountsByAccountNumber($account_number) {
        $user_account = UserAccount::findorfail($account_number);
        //$user_account = UserAccount::findorfail($id);
        $response = array("success" => true, "user_account" => $user_account);
        return response()->json($response, 200);
    }
    
    public function getUserAccounts() {
        $user_accounts = UserAccount::all();
        $response = array("Success" => true, "data" => $user_accounts);
        return response()->json($response, 200);
    }
}
