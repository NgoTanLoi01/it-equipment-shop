<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function  user_account()
    {
        return view('home.user_account');
    }
}
