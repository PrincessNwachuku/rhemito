<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public function register(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;        

        if ($name && $email && $password) {
            $user = User::where("email", $email)->first();
            if ($user) {
                return "User already exists!";
            } else {
                $user = new User;
                $user->name = $name;
                $user->email = $email;                
                $user->phone = $phone;
                $user->password = hash("sha256", $password);
                $user->save();
                $id = $user->id;
                $response = array("Success" => true, "id" => $id);
                return response()->json($response, 200);
            }
        }
        $response = array("Success" => false, "message" => 'Invalid Input');
        return response()->json($response, 200);
    }

    public function login(Request $request) {
        $email = $request->email;
        $password = hash("sha256", $request->password);
        if ($email && $password) {
            $user = User::where('email', $email)->where('password', $password)->first();
            if ($user) {
                $response = array("Success" => true, "user" => $user);
                return response()->json($response, 200);
            }
            $response = array("Success" => false, "message" => 'Invalid Input');
            return response()->json($response, 200);
        }
    }
    
    public function hash(Request $request) {
        $password = hash($request->password, 256);
        return response()->json($password, 200);
    }

    public function getUsers() {
        $users = User::all();
        $response = array("Success" => true, "data" => $users);
        return response()->json($response, 200);
    }
    
    public function getUser($id) {
        $user = User::findorfail($id);
        $response = array("success" => true, "user" => $user);
        return response()->json($response, 200);
    }
}
