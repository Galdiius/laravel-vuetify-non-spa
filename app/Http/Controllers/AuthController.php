<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function _login(){
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where('email',$validated['email'])->first();
        if($user){
            if(password_verify($validated['password'],$user['password'])){
                Session::put([
                    'login' => true,
                    "user" => $user
                    ]);
                Session::save();
                return redirect('/');
            }else{
                return redirect('login')->with('error',"Incorrect username or password");
            }
        }else{
            return redirect('login')->with('error',"Incorrect username or password");
        }
    }
    public function register(){
        return view('auth/register');
    }
    public function _register(){
        $validated = request()->validate([
            "username" => "required|min:3",
            "email" => "required|unique:users,email|email",
            "password" => "required|min:8",
            "confirmPassword" => "required|same:password"
        ]);
        User::create([
            "username" => $validated['username'],
            "email" => $validated['email'],
            "password" => password_hash($validated['password'],PASSWORD_DEFAULT),
            "level" => "User"
        ]);

        return redirect('login')->with('status',"Account successfully registered");

    }
    public function logout(){
        Session::remove('login','id');
        return redirect('/login');
    }
}
