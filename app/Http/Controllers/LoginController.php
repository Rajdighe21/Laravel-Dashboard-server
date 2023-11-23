<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response([
                'error'=>['Password Or email Must Be Wrong']
           ]); 
           
        }        
        return $user;
      
    }
}
