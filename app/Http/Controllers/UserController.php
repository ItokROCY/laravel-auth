<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required',
        ],
        [
            'email.required' =>'Email Wajib Diisi',
            'password.required' =>'Password Wajib Diisi',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infoLogin))
        {
            if(Auth::user()->role == 'admin'){
                return redirect('/admin/index');

            }else if(Auth::user()->role == 'user'){
                return redirect('/admin/user');
            }

        }else{
            return redirect('/')->withErrors('username dan password tidak sesuai')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
