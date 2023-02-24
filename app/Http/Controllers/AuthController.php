<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    function login()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function postRegister(StoreUserRequest $request)
    {
        

        // validation 2

       /*  $validator = Validator::make($request->all(), [
            'nom' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:250'
        ]);
 
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } */

        //save in db

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // redirection
        return redirect()->back()->with('status', 'Account created!');
    }
}
