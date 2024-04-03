<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('signup');
    }


    public function store(AuthRequest $request){
            User::create([
                'name' => $request->u_name,
                'email' => $request->u_email,
                'password' => Hash::make($request->u_password),
            ]
        );
        return redirect()->route('login_show')->with('sucess', "SignUp Sucssesfully");
    }   


    public function loginShow(){
        return view('login');
    }
    

    public function login(LoginRequest $logidata){
        $input  = $logidata->only('email','password');
        // dd("Hii", $input);
        if(Auth::Attempt($input)) {
            return redirect()->route('thankyou');
        }
        return redirect()->back()->with('error', 'Email or Password is incorrect');

    }

    public function thankyou(){
        return view("thankyou");
    }
}
