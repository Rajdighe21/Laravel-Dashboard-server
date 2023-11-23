<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register(Request $request){

        $user = new User();
        $user->name=$request->input("name");
        $user->lastname=$request->input("lastname");
        $user->email=$request->input("email");
        $user->password=Hash::make($request->input("password"));
        $user->save();

        return $user;
    }
}
