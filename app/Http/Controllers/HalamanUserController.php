<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanUserController extends Controller
{
    public function index(){
        return view('user.index');
    }
}
