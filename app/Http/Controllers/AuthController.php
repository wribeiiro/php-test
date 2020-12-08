<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $auth_service;

    public function __construct(AuthService $authService)
    {
        $this->auth_service = $authService;
    }

    public function login(Request $request)
    {
        $result = $this->auth_service->auth($request);

        return response()->json($result, $result['code']);
    }

    public function logout()
    {
        session()->forget('sessionUser');
        return redirect('/');
    }

    public function viewLogin() {
        return view('auth.login');
    }
}
