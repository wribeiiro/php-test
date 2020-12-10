<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthFormController extends Controller
{
    public function viewLogin() {
        return view('auth.login');
    }
}
