<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
